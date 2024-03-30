<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'staff_name',
        'staff_mobile_no',
        'staff_address',
        'staff_nid_no',
        'staff_email_address',
        'staff_salary_amount',
        'staff_picture',
    ];

    // public function uniqueStaffId()
    // {
    //     $randomid = "mex-".mt_rand(000,999);
    //     return $randomid;
    // }

}
