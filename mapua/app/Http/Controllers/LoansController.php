<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest as request;
use App\Http\Requests\MedicalReimbursmentRequest as medicalRequest;
use App\Http\Requests\EmergencyLoanRequest as emergencyReqest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\{Loans, Medical, User, Admin, UserNotifications, Contributions};
use Illuminate\Support\Facades\Redirect;
use Tightenco\Ziggy\Output\Script;
use App\Services\Approval;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Request as query;


class LoansController extends Controller
{
    //
    public function index(){
        $id = auth()->id();
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $user = User::with('adminReg')->find($id);
        return Inertia::render('Users/UserLoanPage',[
           'users' =>$user,
           'notification'=>$userNotification,
           'count'=>$notificationCount           
        ]);
    }
// Loans View
    public function loansView(query $query){
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $user = Auth::user();
        $loans = Loans::with('contributions')->filterOwner($user->id)
        ->limit(5)
        ->paginate(5)
        ->appends($query::only(auth()->id()));
        
        return Inertia::render('Users/LoanView',[
            'loans' => $loans,
            'notification'=>$userNotification,
            'count'=>$notificationCount,
           
        ]);
    }
// Total Contribution
    public function totalContribution(query $query){
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $id = auth()->id();
        //$loans = Loans::with('contributions')->find($id);
        $loans = Loans::find($id);
        $contributions = Contributions::where('loans_id','=',$loans->id)
        //->filterOwner($user->id)
        ->limit(5)
        ->paginate(5);
        //->appends($query::only(auth()->id()));
        
        return Inertia::render('Users/TotalContribution',[
            'loans' => $loans,
            'contributions' => $contributions,
            'notification'=>$userNotification,
            'count'=>$notificationCount
        ]);
    }


    public function createLoans(request $request){
        $validate_data = $request->validated();
        $user = User::find(auth()->id());
        
        if($request->hasFile('attachment2') && $request->hasFile('attachment3')){
            
            // $file1 = $request->file('attachment1');
            $file2 = $request->file('attachment2');
            $file3 = $request->file('attachment3');
        
            // $file_name1 = time().'.'.$file1->getClientOriginalName();
            $file_name2 = time().'.'.$file2->getClientOriginalName();
            $file_name3 = time().'.'.$file3->getClientOriginalName();

            // $file1->move(public_path('uploads/loans'),$file_name1);
            $file2->move(public_path('uploads/loans'),$file_name2);
            $file3->move(public_path('uploads/loans'),$file_name3);
            
        
            $user_loans = $user->loans()->create([
            
                'loan_type'=>$validate_data['loan_type'],
                'duration'=>$validate_data['duration'],
                // 'attachment1'=>'../../../uploads/loans/'.$file_name1,
                'attachment2'=>'../../../uploads/loans/'.$file_name2,
                'attachment3'=>'../../../uploads/loans/'.$file_name3,
                'loan_amount'=>$validate_data['loan_amount'],
                'amount'=>$validate_data['amount'],
                'interest'=>$validate_data['interest'],
                'loan_status'=>'Ongoing',
                'approval'=>'Submitted',
            
            ]);
            $user->userNotif()->create([
                'universal_id'=>$user_loans->id,
                'onRead'=>false,
                'value'=>$user->name.' Applying for '.$validate_data['loan_type'],
                'type'=>1,
                'notification_type'=>1
            ]);

            return Redirect::route('userLoanDashboard')->with('message',
                [NotificationService::notificationItem('Sucess', '', 'Sucessfully submitted '.$validate_data['loan_type'])]);
        }
    }

    public function createEmergencyLoan(emergencyReqest $request){
       $validate_data = $request->validated();
    //    dd($validate_data);
       $user = User::find(auth()->id());

       if($request->hasFile('attachment1')){

        $file1 = $request->file('attachment1');
        $file_name1 = time().'.'.$file1->getClientOriginalName();
        $file1->move(public_path('uploads/loans'),$file_name1);
        $user_loans = $user->loans()->create([
            
            'loan_type'=>$validate_data['loan_type'],
            'duration'=>$validate_data['duration'],
            'attachment1'=>'../../../uploads/loans/'.$file_name1,
            'loan_amount'=>$validate_data['loan_amount'],
            'amount'=>$validate_data['amount'],
            'interest'=>$validate_data['interest'],
            'loan_status'=>'Ongoing',
            'approval'=>'Submitted',
        ]);
        $user->userNotif()->create([
            'universal_id'=>$user_loans->id,
            'onRead'=>false,
            'value'=>$user->name.' Applying for '.$validate_data['loan_type'],
            'type'=>1,
            'notification_type'=>1
        ]);
       }
      

    return Redirect::route('userLoanDashboard')->with('message',
        [NotificationService::notificationItem('Sucess', '', 'Sucessfully submitted '.$validate_data['loan_type'])]);
    }

    public function medicalReimbursment(query $query){
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $filters = $query::only('status');
        isset($filters['status']) ? $filters['status'] = Approval::status($filters['status']) : $filters['status'] = Approval::status($filters['status']='All');
        
        $medical = Medical::with('user')
        ->filter($filters)
        ->limit(5)
        ->paginate(5)
        ->appends($query::only(['status']));
        return Inertia::render('Users/MedicalReimbursment',[
            'medicals'=>$medical,
            'filter'=>$filters,
            'notification'=>$userNotification,
            'count'=>$notificationCount,
        ]);
    }

    public function createReimburstment(){
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $info = Admin::find(auth()->id());
        return Inertia::render('Users/UserReimbursmentView',[
            'info' =>$info,
            'notification'=>$userNotification,
            'count'=>$notificationCount
        ]);
    }
    public function submitCreateReimburstment(medicalRequest $request){
        // dd($request);
        $validate_data = $request->validated();
        // dd($validate_data['reimbursment_type']);
        if($validate_data['reimbursment_type'] == 'Hospital'){
            if($request->hasFile('medical_record1') || $request->hasFile('medical_record2') || $request->hasFile('medical_record3')){
                $file1 = $request->file('medical_record1');
                $file2 = $request->file('medical_record2');
                $file3 = $request->file('medical_record3');
                // $file4 = $request->file('medical_record4');
            
                $file_name1 = time().'.'.$file1->getClientOriginalName();
                $file_name2 = time().'.'.$file2->getClientOriginalName();
                $file_name3 = time().'.'.$file3->getClientOriginalName();
                // $file_name4 = time().'.'.$file4->getClientOriginalName();

                $file1->move(public_path('uploads/reimburstment'),$file_name1);
                $file2->move(public_path('uploads/reimburstment'),$file_name2);
                $file3->move(public_path('uploads/reimburstment'),$file_name3);
                // $file4->move(public_path('uploads/reimburstment'),$file_name4);
            
                $user = User::find(auth()->id());
                // dd($validate_data);
                $userMedical = $user->medicals()->create([

                    'reimbursment_type'=>$validate_data['reimbursment_type'],
                    'amount'=>$validate_data['amount'],
                    'medical_benifit'=>$validate_data['medical_benifit'],
                    'medical_record1'=>'../../../uploads/reimburstment/'.$file_name1,
                    'medical_record2'=>'../../../uploads/reimburstment/'.$file_name2,
                    'medical_record3'=>'../../../uploads/reimburstment/'.$file_name3,
                    // 'medical_record4'=>'../../../uploads/reimburstment/'.$file_name4,

                ]);
        }
        }
        if($validate_data['reimbursment_type'] == 'Health Checkup'){
            if($request->hasFile('medical_record1') || $request->hasFile('medical_record2') || $request->hasFile('medical_record3')||$request->hasFile('medical_record4')){
                $file1 = $request->file('medical_record1');
                $file2 = $request->file('medical_record2');
                $file3 = $request->file('medical_record3');
                $file4 = $request->file('medical_record4');
            
                $file_name1 = time().'.'.$file1->getClientOriginalName();
                $file_name2 = time().'.'.$file2->getClientOriginalName();
                $file_name3 = time().'.'.$file3->getClientOriginalName();
                $file_name4 = time().'.'.$file4->getClientOriginalName();

                $file1->move(public_path('uploads/reimburstment'),$file_name1);
                $file2->move(public_path('uploads/reimburstment'),$file_name2);
                $file3->move(public_path('uploads/reimburstment'),$file_name3);
                $file4->move(public_path('uploads/reimburstment'),$file_name4);
            
                $user = User::find(auth()->id());
                // dd($validate_data);
                $userMedical = $user->medicals()->create([

                    'reimbursment_type'=>$validate_data['reimbursment_type'],
                    'amount'=>$validate_data['amount'],
                    'medical_benifit'=>$validate_data['medical_benifit'],
                    'medical_record1'=>'../../../uploads/reimburstment/'.$file_name1,
                    'medical_record2'=>'../../../uploads/reimburstment/'.$file_name2,
                    'medical_record3'=>'../../../uploads/reimburstment/'.$file_name3,
                    'medical_record4'=>'../../../uploads/reimburstment/'.$file_name4,

                ]);
        }
        }
       
        if($validate_data['reimbursment_type'] == 'Dental Checkup'||$validate_data['reimbursment_type'] == 'Medicines'||$validate_data['reimbursment_type'] == 'Eye Checkup'){
            ;
            if($request->hasFile('medical_record1') || $request->hasFile('medical_record2') ){
                $file1 = $request->file('medical_record1');
                $file2 = $request->file('medical_record2');
                // $file3 = $request->file('medical_record3');
                // $file4 = $request->file('medical_record4');
            
                $file_name1 = time().'.'.$file1->getClientOriginalName();
                $file_name2 = time().'.'.$file2->getClientOriginalName();
                // $file_name3 = time().'.'.$file3->getClientOriginalName();
                // $file_name4 = time().'.'.$file4->getClientOriginalName();

                $file1->move(public_path('uploads/reimburstment'),$file_name1);
                $file2->move(public_path('uploads/reimburstment'),$file_name2);
                // $file3->move(public_path('uploads/reimburstment'),$file_name3);
                // $file4->move(public_path('uploads/reimburstment'),$file_name4);
            
                $user = User::find(auth()->id());
                $userMedical = $user->medicals()->create([

                    'reimbursment_type'=>$validate_data['reimbursment_type'],
                    'amount'=>$validate_data['amount'],
                    'medical_benifit'=>$validate_data['medical_benifit'],
                    'medical_record1'=>'../../../uploads/reimburstment/'.$file_name1,
                    'medical_record2'=>'../../../uploads/reimburstment/'.$file_name2,
                   

                ]);
        }
        }
        $user->userNotif()->create([
            'universal_id'=>$userMedical->id,
            'onRead'=>false,
            'value'=>$user->name.' Applying for Medical Reimburstment',
            'type'=>3,
            'notification_type'=>2
        ]);
        return Redirect::route('medicalView')->with('message',
            [NotificationService::notificationItem('Sucess', '', 'Sucessfully submitted Medical Reimburstment '.$validate_data['reimbursment_type'])]);
    }
    public function  UserLoanView($id){
       
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        
        $loan = Loans::find($id);
        $contribution = Contributions::where('loans_id',$loan->id)->limit(5)->paginate(5);
        $user = User::with('AdminReg')->find($loan->user_id);
        return Inertia::render('Users/UserLoanView',[
            'users'=>$user,
            'loans'=>$loan,
            'notification'=>$userNotification,
            'count'=>$notificationCount,
            'contributions'=>$contribution
        ]);
    }

    public function loanDashboard(){
        $id = auth()->id();
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $user = User::with('adminReg')->find($id);
        return Inertia::render('Users/UserLoanDashboard',[
            'users' =>$user,
            'notification'=>$userNotification,
            'count'=>$notificationCount       
        ]);
    }

   

    public function ReimbursView(){
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        return Inertia::render('Users/medicalreimbursView',[
            'notification'=>$userNotification,
            'count'=>$notificationCount   
        ]);
    }

    public function MedicalBreakdown($id){
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $userNotification->where('onRead',false)->count();
        $medical = Medical::find($id);
        $info = Admin::find($medical->user_id);
  
        return Inertia::render('Users/MedicalBreakdown',[
            'notification'=>$userNotification,
            'count'=>$notificationCount,
            'medical'=>$medical,
            'info'=>$info   
        ]);
    }

   

}
