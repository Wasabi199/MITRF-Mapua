<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContribution extends Model
{
    use HasFactory;
    protected $fillable=[
        'contribution_amount'
    ];

    public function users(){
        return $this->hasOne(User::class);
    }
}
