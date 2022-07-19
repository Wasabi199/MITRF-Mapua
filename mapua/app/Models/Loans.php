<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;
    protected $fillable=[

        'loan_type',    
        'loan_amount',  
        // 'department',
        'interest',
        'approval',
        'duration',
        'loan_status',
        'attachment_path',
        // 'total_contribution',
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contributions(){
        return $this->hasMany(Contributions::class);
    }
    

    // filters
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['approval'] ?? null, function ($query, $approval) {
            $query->where('approval','=', $approval);
        });
    }
}
