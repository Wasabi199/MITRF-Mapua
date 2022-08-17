<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\{Auth};
use App\Models\{UserNotifications, User};
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;



class DashboardController extends Controller
{
    //
    public function index(QueryRequest $request){
        $notification = UserNotifications::filter(Auth::user()->userType)->get();
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->get();
        // ->limit(5)
        // ->paginate(5);
        // ->get();
        // ->filter(Auth::user()->userType)
        // ->filter(Auth::user()->userType)
        // ->appends($request::only(User::auth()->userType));
        // dd(Auth::user()->userType);
        // dd($userNotification);
        if(Auth::user()->userType == 1){
            return Inertia::render('Admin/AdminDashboard',[
                'notification'=>$notification
            ]);
        }
        else if(Auth::user()->userType == 2){
            return Inertia::render('Users/UserDashboard',[
                'notification'=>$userNotification
            ]);
        }else if(Auth::user()->userType ==3){
            return Inertia::render('Medical/Dashboard',[
                'notification'=>$notification
            ]);
        }
    }
    
}
