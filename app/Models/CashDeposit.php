<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashDeposit extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_type', 'deposit_date', 'depositor_id', 'depositor_name', 'depositor_mobile_no', 'depositor_address', 'depositor_nid_no', 'deposit_amount'];

    // public function uniqueStaffId()
    // {
    //     $randomid = "mex-".mt_rand(000,999);
    //     return $randomid;
    // }
}
