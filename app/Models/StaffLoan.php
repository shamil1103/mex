<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_loan_date',
        'staff_id',
        'staff_address',
        'staff_loan_description',
        'staff_leader_name',
        'staff_loan_amount',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }
}
