<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest as Notif;
use App\Models\UserNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    //
    public function notification(Notif $request){
        // dd($request);
        $validated_data = $request->validated();
        $notification = UserNotifications::find($validated_data['id']);
        // dd($notification);
        $notification->update($validated_data);
        if($notification->notification_type == 1){
            return Redirect::route('contributions',$notification->universal_id);
        }
        if($notification->notification_type == 2){
            return Redirect::route('medicalProfile',$notification->universal_id);
        }
    }
}
