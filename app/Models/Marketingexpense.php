<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketingexpense extends Model
{
    use HasFactory;

    protected $fillable = ['marketing_expense_date', 'expense_name', 'marketing_expense_description', 'marketing_expense_amount', 'staff_id'];

    // protected $primaryKey = ' ';

    public $timestamps = false;

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff', 'staff_id', 'staff_id');
    }
}
