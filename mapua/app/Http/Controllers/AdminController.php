<?php

namespace App\Http\Controllers;

use App\Models\{User, AddressInformation, PersonalInformation};
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;

class AdminController extends Controller
{
    //
    public function users(QueryRequest $request){
        
       
        $user = User::with('adminReg')->orderBy('name')->get();
        return Inertia::render('Admin/Users',[

            'users' => $user
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
}
