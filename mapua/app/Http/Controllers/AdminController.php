<?php

namespace App\Http\Controllers;

use App\Models\{User, AddressInformation, Contributions, UserNotifications, Loans};
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Http\Requests\UserDeleteRequest as deleteRequest;
use App\Http\Requests\LoanDeleteRequest as deleteloanRequest;
use App\Http\Requests\UserUpdateRequest as updateRequest;
use App\Http\Requests\LoanReviewRequest as reviewloanRequest;
use App\Http\Requests\Admin as RegiterUserRequest;
use App\Imports\UserAdmin;
use Carbon\Carbon;
use Illuminate\Support\Facades\{Auth};

use App\Models\Admin;
use Illuminate\Routing\Route;
use App\Imports\{UsersImport, ContributionImport, UserContribImport};
use App\Services\Approval;
use Illuminate\Support\Facades\{Hash, DB, Redirect };
use Maatwebsite\Excel\Facades\Excel;
use App\Services\NotificationService;


class AdminController extends Controller
{
    //
    
    public function users(QueryRequest $query){
        $notification = UserNotifications::filter(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $notification->where('onRead',false)->count();
        $users = User::with('adminReg','userContribution')
        ->orderBy('name')
        ->filter($query::only('search'))
        ->limit(5)
        ->paginate(5)
        ->appends($query::only('search'))
        // ->get()
        ;
        $filters = $query::all('search');
        return Inertia::render('Admin/Users',[
            'notification'=>$notification,
            'users' => $users,
            'filters' =>$filters,
            'count'=>$notificationCount
        ]);
    }
    public function userRegister(){
        $notification = UserNotifications::filter(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $notification->where('onRead',false)->count();
        return Inertia::render('Admin/RegisterUser',[
            'notification'=>$notification,
            'count'=>$notificationCount

        ]);
    }

    public function userProfile($id){
        $notification = UserNotifications::filter(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $notification->where('onRead',false)->count();
        $userProfile = User::with('AdminReg', 'userContribution')->find($id);
        $userLoan = Loans::where('user_id','=',$id)->where('loan_status','=','Paid')->get();
        // dd($userLoan);
        return Inertia::render('Admin/UserProfile',[
            'notification'=>$notification,
            'users' => $userProfile,
            'loans'=>$userLoan,
            'count'=>$notificationCount

        ]);
    }
    public function userDelete(deleteRequest $request){
        $user_to_delete = User::findOrFail($request->validated()['id']);
        $user_to_delete->delete();
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Deleted')]);

    }

    private function roleToInt(String $role) : int{
        switch($role){
            case 'Admin':
                return 1;
            break;
            case 'User':
                return 2;
            break;
        }
    }

    public function userRegisterSubmit(RegiterUserRequest $request){
        $validated_data = $request->validated();
        $user = null;
        $role = $this->roleToInt($validated_data['account_information']['role']);

        DB::transaction(function () use ($validated_data, $user, $role){

            $name  = $validated_data['first_name'].' '.$validated_data['middle_name'].' '.$validated_data['last_name'];
            $user = User::create([
                'name'=>$name,
                'email'=>$validated_data['account_information']['email'],
                'password'=>Hash::make($validated_data['account_information']['password']),
                'email_verified_at'=>Carbon::now(),
                'userType'=>$role,
            ]);
            $user->adminReg()->create([
                'first_name'=>$validated_data['first_name'],
                'middle_name'=>$validated_data['middle_name'],
                'last_name'=>$validated_data['last_name'],
                'birth_date'=>$validated_data['birth_date'],
                'birth_place'=>$validated_data['birth_place'],
                'civil_status'=>$validated_data['civil_status'],
                'member_type'=>$validated_data['member_type'],
                'employment'=>$validated_data['employment'],
                'membership'=>$validated_data['membership'],
                'mobile_number'=>$validated_data['mobile_number'],
                'department'=>$validated_data['department'],
                'salary'=>$validated_data['salary'],

                // 'region'=>$validated_data['address_information']['region'],
                // 'province'=>$validated_data['address_information']['province'],
                // 'municipality'=>$validated_data['address_information']['municipality'],
                // 'barangay'=>$validated_data['address_information']['barangay'],
                // 'current_address'=>$validated_data['address_information']['current_address'],

            ]);
        });
        return Redirect::route('users')->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Registered')]);;

    }
    public function userUpdate(updateRequest $request){
        // dd($request);
        $admin = Admin::find($request->validated()['id']);
        $user = $admin->user;
        $data = $request->validated();
        $user->update([
            'name' =>$data['first_name'].' '.$data['middle_name'].''.$data['last_name']
        ]);
        $admin->update($data);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }

    public function userUpload(Request $request){
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        Excel::import(new UsersImport, $request->file);
      
        return Redirect::route('dashboard')->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Uploaded')]);;
    }


    
    public function userContributions(Request $request){
        // dd($request);
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        Excel::import(new ContributionImport, $request->file);
      
        return Redirect::route('dashboard')->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Uploaded')]);
    }
       
    public function userContriImport(Request $request){
        // dd($request);
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        Excel::import(new UserContribImport, $request->file);
      
        return Redirect::route('dashboard')->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Uploaded')]);
    }

    
    public function adminLoansView(QueryRequest $query){
        $notification = UserNotifications::filter(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $notification->where('onRead',false)->count();
        
        $filters = $query::only('approval');
        isset($filters['approval']) ? $filters['approval'] = Approval::approval($filters['approval']) : $filters['approval'] = Approval::approval($filters['approval']='All');
        $loans = Loans::with('user')->with('contributions')->orderByRaw('created_at DESC')
        ->filter($filters)
        ->limit(5)
        ->orderByRaw('created_at DESC')
        ->paginate(5)
        ->appends($query::only(['approval']));
        
        return Inertia::render('Admin/LoansView',[
            'notification'=>$notification,
            'filters'=>$filters,
            'loans' => $loans,
            'count'=>$notificationCount
        ]);
    }

    // public function loanDelete(deleteloanRequest $request){
    //     $loan_to_delete = Loans::findOrFail($request->validated()['id']);
    //     $loan_to_delete->delete();
    //     return Redirect::back()->with('message',
    //         [NotificationService::notificationItem('success', '', 'Sucessfully Deleted')]);

    // }

    public function loanApprove(reviewloanRequest $request){
        $loans = loans::find($request->validated()['id']);
        $data = $request->validated();
        $loans->update($data);
        UserNotifications::create([
            'user_id'=>$loans->user_id,
            'universal_id'=>$request->validated()['id'],
            'onRead'=>false,
            'value'=>'Your application has been APPROVED',
            'type'=>2,
            'notification_type'=>3
        ]);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }
    public function loanRelease(reviewloanRequest $request){
        $loans = loans::find($request->validated()['id']);
        $data = $request->validated();
        $loans->update($data);
        UserNotifications::create([
            'user_id'=>$loans->user_id,
            'universal_id'=>$request->validated()['id'],
            'onRead'=>false,
            'value'=>'Your application is Ready to Release',
            'type'=>2,
            'notification_type'=>3
        ]);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }

    public function loanReleased(reviewloanRequest $request){
        $loans = loans::find($request->validated()['id']);
        $data = $request->validated();
        $loans->update($data);
        UserNotifications::create([
            'user_id'=>$loans->user_id,
            'universal_id'=>$request->validated()['id'],
            'onRead'=>false,
            'value'=>'Your application is Released',
            'type'=>2,
            'notification_type'=>3
        ]);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }

    public function loanReject(reviewloanRequest $request){
        $loans = loans::find($request->validated()['id']);
        $data = $request->validated();
        $loans->update($data);
        UserNotifications::create([
            'user_id'=>$loans->user_id,
            'universal_id'=>$request->validated()['id'],
            'onRead'=>false,
            'value'=>'Your application has been REJECTED',
            'type'=>2,
            'notification_type'=>4
        ]);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }


    public function contributions($id){
        $notification = UserNotifications::filter(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $notification->where('onRead',false)->count();
        $loanProfile = Loans::find($id);
        $info = Admin::find($loanProfile->user_id);
        $contribution = Contributions::where('loans_id','=',$loanProfile->id)
        ->limit(5)
        ->paginate(5);
        // dd($contribution);
        return Inertia::render('Admin/Contributions',[
            'notification'=>$notification,
            'loan' => $loanProfile,
            'info'=>$info,
            'contributions'=>$contribution,
            'count'=>$notificationCount
            
        ]);
    }
    public function addContribution(){
        $loans = Loans::all()->where('approval','Processed')->where('loan_status','Ongoing');
        // $loans = User::has('loans')->get();
        // $info = Admin::all()->where($loans->user_id);
        // dd($loans);
        foreach($loans as $loan){
            $info = Admin::find($loan->user_id);
            dd($info->total_contribution + ($info->salary *0.05));
            // dd($info);
            if($loan->loan_amount <= 0){
                // dd($loan->loan_amount - $info->salary * 0.05,);
            $loan->update([
                'loan_amount'=>$loan->loan_amount - $info->salary * 0.05,
            ]);
            $loan->contributions()->create([
                'loans_id' => $loan->id,
                'contribution_amount'=>$info->salary * 0.05,
            ]);

            $info->update([
                'total_contribution'=>$info->total_contribution + ($info->salary *0.05)
            ]);
         }else{
            $loan->update([
                'loan_status'=>'Paid'
            ]);
         }
        }
        
        
    }
    public function loanPrint($id){
       
        $loan = Loans::find($id);
        $info = Admin::where('user_id',$loan->user_id)->get()->first();
        $loan->update([
            'approval'=>'For Processing',
        ]);
        // dd($info);
        return Inertia::render('Admin/Printing',[
            'loan'=>$loan,
            'info'=>$info,
        ]);
    }
 

}
