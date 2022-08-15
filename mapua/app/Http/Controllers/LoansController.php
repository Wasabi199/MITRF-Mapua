<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest as request;
use App\Http\Requests\MedicalReimbursmentRequest as medicalRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\{Loans, Medical, User, Admin};
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
        $user = User::with('adminReg')->find($id);
        return Inertia::render('Users/UserLoanPage',[
           'users' =>$user           
        ]);
    }
// Loans View
    public function loansView(query $query){
        $user = Auth::user();
        $loans = Loans::with('contributions')
        ->filterOwner($user->id)
        ->limit(5)
        ->paginate(5)
        ->appends($query::only(auth()->id()));
        
        return Inertia::render('Users/LoanView',[
            'loans' => $loans,
        ]);
    }

    public function createLoans(request $request){
        // dd($request);
        $validate_data = $request->validated();
      
        if($request->hasFile('attachment1') && $request->hasFile('attachment2') && $request->hasFile('attachment3')){
            $file1 = $request->file('attachment1');
            $file2 = $request->file('attachment2');
            $file3 = $request->file('attachment3');
           
            $file_name1 = time().'.'.$file1->getClientOriginalName();
            $file_name2 = time().'.'.$file2->getClientOriginalName();
            $file_name3 = time().'.'.$file3->getClientOriginalName();

            $file1->move(public_path('uploads/loans'),$file_name1);
            $file2->move(public_path('uploads/loans'),$file_name2);
            $file3->move(public_path('uploads/loans'),$file_name3);
            $user = User::find(auth()->id());
          
            $user->loans()->create([
             
                'loan_type'=>$validate_data['loan_type'],
                'duration'=>$validate_data['duration'],
                'attachment1'=>'../../../uploads/loans/'.$file_name1,
                'attachment2'=>'../../../uploads/loans/'.$file_name2,
                'attachment3'=>'../../../uploads/loans/'.$file_name3,
                'loan_amount'=>$validate_data['loan_amount'],
                'interest'=>$validate_data['interest'],
                'loan_status'=>'Pending',
                'approval'=>'Ongoing',
             
            ]);
            return Redirect::route('dashboard')->with('message',
                [NotificationService::notificationItem('Sucess', '', 'Sucessfully '.$validate_data['loan_type'])]);
        
        }
    }

    public function medicalReimbursment(query $query){
       
        $filters = $query::only('status');
        isset($filters['status']) ? $filters['status'] = Approval::status($filters['status']) : $filters['status'] = Approval::status($filters['status']='All');
        
        $medical = Medical::with('user')
        ->filter($filters)
        ->limit(5)
        ->paginate(5)
        ->appends($query::only(['status']));
        return Inertia::render('Users/MedicalReimbursment',[
            'medicals'=>$medical,
            'filter'=>$filters
        ]);
    }

    public function createReimburstment(){
        $info = Admin::find(auth()->id());
        return Inertia::render('Users/UserReimbursmentView',[
            'info' =>$info
        ]);
    }
    public function submitCreateReimburstment(medicalRequest $request){
        // dd($request);
        $validate_data = $request->validated();
        if($request->hasFile('medical_record1') || $request->hasFile('medical_record2') || $request->hasFile('medical_record3') || $request->hasFile('medical_record4')){
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
            $user->medicals()->create([

                'reimbursment_type'=>$validate_data['reimbursment_type'],
                'amount'=>$validate_data['amount'],
                'medical_benifit'=>$validate_data['medical_benifit'],
                'medical_record1'=>'../../../uploads/reimburstment/'.$file_name1,
                'medical_record2'=>'../../../uploads/reimburstment/'.$file_name2,
                'medical_record3'=>'../../../uploads/reimburstment/'.$file_name3,
                'medical_record4'=>'../../../uploads/reimburstment/'.$file_name4,

            ]);
            return Redirect::route('dashboard')->with('message',
                [NotificationService::notificationItem('Sucess', '', 'Sucessfully Medical Reimburstment'.$validate_data['reimbursment_type'])]);
        }
    }
    public function  UserLoanView($id){
        $user = User::with('AdminReg')->find($id);
        $loan = Loans::with('contributions')->filterOwner($id)->get()->first();
            return Inertia::render('Users/UserLoanView',[
                'users'=>$user,
                'loans'=>$loan
        ]);
    }

}
