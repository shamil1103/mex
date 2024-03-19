<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officeexpense extends Model
{
    use HasFactory;
    protected $fillable = ['expense_date', 'expense_name', 'office_expense_description', 'office_expense_amount', 'expense_category_id'];

    // protected $primaryKey = ' ';

    public $timestamps = false;

    public function expense_cats()
    {
        return $this->belongsTo('App\Models\ExpenseCat', 'expense_category_id', 'expense_category_id');
    }



    // public function uniqueOfficeExpenseId()
    // {
    //     $randomid = "mex-".mt_rand(000,999);
    //     return $randomid;
    // }

}
