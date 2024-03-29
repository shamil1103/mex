<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OthersLoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_date',
        'loan_name',
        'loan_address',
        'loan_reference',
        'loan_description',
        'loan_amount',
    ];

    public $timestamps = false;
}
