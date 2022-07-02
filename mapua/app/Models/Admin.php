<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        
        'first_name',
        'middle_name',
        'last_name',
        'mobile_number',
        'birth_date',
        'civil_status',

        'region',
        'province',
        'municipality',
        'barangay',
        'current_address',

        'department',
        'salary',
        'membership',
        'employment',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
