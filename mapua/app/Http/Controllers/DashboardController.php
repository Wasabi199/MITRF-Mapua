<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\{Auth};
use Illuminate\Http\Request;
use Inertia\Inertia;



class DashboardController extends Controller
{
    //
    public function index(){
        if(Auth::user()->userType == 1){
            return Inertia::render('Admin/AdminDashboard',[

            ]);
        }
        else if(Auth::user()->userType == 2){
            return Inertia::render('Users/UserDashboard',[

            ]);
        }else if(Auth::user()->userType ==3){
            return Inertia::render('Medical/Dashboard',[
                
            ]);
        }
    }
    
}
