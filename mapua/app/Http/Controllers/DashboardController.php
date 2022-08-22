<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\{Auth};
use App\Models\{UserNotifications, User, UserContribution};
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;



class DashboardController extends Controller
{
    //
    public function index(QueryRequest $request){
        $notification = UserNotifications::filter(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $notificationCount = $notification->where('onRead',false)->count();
        $contribution = UserContribution::find(Auth::user()->id);
        $userNotification = UserNotifications::filterOwner(Auth::user()->userType)->orderByRaw('created_at DESC')->get();
        $userNotificationCount = $userNotification->where('onRead',false)->count();
        if(Auth::user()->userType == 1){
            return Inertia::render('Admin/AdminDashboard',[
                'notification'=>$notification,
                'count'=>$notificationCount
            ]);
        }
        else if(Auth::user()->userType == 2){
            return Inertia::render('Users/UserDashboard',[
                'notification'=>$userNotification,
                'count'=>$userNotificationCount,
                'contribution'=>$contribution,
            ]);
        }else if(Auth::user()->userType ==3){
            return Inertia::render('Medical/Dashboard',[
                'notification'=>$notification,
                'count'=>$notificationCount

            ]);
        }
    }
    
}
