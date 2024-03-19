<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDeposit extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_type', 'deposit_date', 'depositor_id', 'depositor_name', 'depositor_mobile_no', 'bank_name', 'depositor_description', 'depositor_nid_no', 'deposit_amount'];

}
