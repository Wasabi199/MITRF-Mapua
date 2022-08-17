<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalApprove;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Models\{Admin, Medical, User, UserNotifications};
use Illuminate\Support\Facades\{Hash, DB, Redirect,Auth };
use App\Services\NotificationService;
class MedicalController extends Controller
{
    //
    public function index(QueryRequest $query){
        $notification = UserNotifications::filter(Auth::user()->userType)->get();
        // $user = User::with('medicals')
        $medical = Medical::with('user')
        // ->orderBy('name')
        // ->filter($query::only('search'))
        ->limit(5)
        ->paginate(5);
        // ->appends($query::only('search'));
        // $filters = $query::all('search');
        return Inertia::render('Medical/Medical_Reimbursment',[
            'medical'=>$medical,
            'notification'=>$notification
        ]);
    }
    public function medicalProfile($id){
        $notification = UserNotifications::filter(Auth::user()->userType)->get();
        $medical = Medical::find($id);
        $info = Admin::find($medical->user_id);
        // dd($info);
        // $user_medical = Medical::where('user_id','==',$user_profile->id);
        // dd($user_medical);
        return Inertia::render('Medical/MedicalAppliedView',[
            'userProfile'=> $info,
            'userMedical'=> $medical,
            'notification'=>$notification
        ]);
    }
    public function medicalApprove(MedicalApprove $request){
        // dd($request);
        $loans = Medical::find($request->validated()['id']);
        $data = $request->validated();
        // dd($data);
        $loans->update($data);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }

    public function medicalReject(MedicalApprove $request){
        // dd($request);
        $loans = Medical::find($request->validated()['id']);
        $data = $request->validated();
        // dd($data);
        $loans->update($data);
        return Redirect::back()->with('message',
            [NotificationService::notificationItem('success', '', 'Sucessfully Updated')]);
    }

}
