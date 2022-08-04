<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Medical extends Model
{
    use HasFactory;
    protected $fillable = [

        'reimbursment_type',
        'medical_record1',
        'medical_record2',
        'medical_record3',
        'medical_record4',
        'amount',
        'status',
        'medical_benifit',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status','=', $status);
        })->where('user_id',auth()->id());
    }

}
