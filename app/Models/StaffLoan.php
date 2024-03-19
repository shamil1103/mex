<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffLoan extends Model
{
    use HasFactory;

    protected $fillable = ['staff_loan_date', 'staff_address', 'staff_loan_description', 'staff_leader_name', 'staff_loan_amount', 'staff_id'];

    // protected $primaryKey = ' ';

    public $timestamps = false;

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff', 'staff_id', 'staff_id');
    }
}
