<?php

namespace App\Http\Controllers;

use App\Models\{User, AddressInformation, PersonalInformation};
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Http\Requests\UserDeleteRequest as deleteRequest;
use App\Http\Requests\UserUpdateRequest as updateRequest;
use App\Http\Requests\Admin as RegiterUserRequest;
use App\Imports\UserAdmin;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Routing\Route;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\{Hash, DB, Redirect };
use Maatwebsite\Excel\Facades\Excel;
use App\Services\NotificationService;


class AdminController extends Controller
{
    //
    public function users(QueryRequest $query){
        
        $users = User::with('adminReg')
        ->orderBy('name')
        ->filter($query::only('search'))
        ->limit(5)
        ->paginate(5)
        ->appends($query::only('search'))
        // ->get()
        ;
        $filters = $query::all('search');
        return Inertia::render('Admin/Users',[
            
            'users' => $users,
            'filters' =>$filters,
        ]);
    }
    public function userRegister(){
        return Inertia::render('Admin/RegisterUser',[

        ]);
    }
    public function userProfile($id){
        $userProfile = User::with('AdminReg')->find($id);
        return Inertia::render('Admin/UserProfile',[
            'user' => $userProfile
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
        
        // dd($validated_data);

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
        Excel::import(new UsersImport, $request->file);
      

        return Redirect::route('dashboard')->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Uploaded')]);;
    }
    
    public function adminLoansView(){
        return Inertia::render('Admin/LoansView',[

        ]);
    }
    public function contributions(){
        return Inertia::render('Admin/Contributions',[
            
        ]);
    }

}
