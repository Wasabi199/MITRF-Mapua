<?php

namespace App\Http\Controllers;

use App\Models\{User, AddressInformation, PersonalInformation};
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Http\Requests\UserDeleteRequest as deleteRequest;

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
        $user_to_delete->adminReg()->delete();
        $user_to_delete->delete();
        return back()->with('Success', 'User Deleted!');

    }
}
