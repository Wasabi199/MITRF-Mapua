<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LoansController extends Controller
{
    //
    public function index(){
        return Inertia::render('Users/UserLoanPage',[

        ]);
    }
}
