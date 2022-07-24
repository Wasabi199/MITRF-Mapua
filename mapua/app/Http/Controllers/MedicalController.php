<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as QueryRequest;
use App\Models\{ User};

class MedicalController extends Controller
{
    //
    public function index(QueryRequest $query){
        
        $user = User::with('medicals')
        ->orderBy('name')
        ->filter($query::only('search'))
        ->limit(5)
        ->paginate(5)
        ->appends($query::only('search'));
        $filters = $query::all('search');
        return Inertia::render('Medical/Medical_Reimbursment',[
            'users'=>$user,
            'filters'=>$filters
        ]);
    }
}
