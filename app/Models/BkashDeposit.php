<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkashDeposit extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_type', 'deposit_date', 'depositor_id', 'depositor_name', 'deposit_mobile_no', 'txid_no', 'depositor_address', 'depositor_nid_no', 'deposit_amount'];

}
