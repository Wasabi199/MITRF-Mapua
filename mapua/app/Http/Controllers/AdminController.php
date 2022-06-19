<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;

class AdminController extends Controller
{
    //
    public function users(QueryRequest $request){

        return Inertia::render('Admin/Users',[
                'users' => User::all()->map(fn($user) => [
                    'name' => $user->name
                ])

        ]);
    }
}
