<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileBankingDeposit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deposit_type',
        'deposit_date',
        'depositor_id',
        'depositor_name',
        'depositor_mobile_no',
        'txid_no',
        'depositor_address',
        'depositor_nid_no',
        'deposit_amount',
    ];
}
