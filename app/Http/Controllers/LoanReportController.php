<?php

namespace App\Http\Controllers;

use App\Models\OthersLoan;
use App\Models\Staff;
use App\Models\StaffLoan;
use Illuminate\Http\Request;

class LoanReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data                     = [];
        $data['dateRangerPicker'] = true;
        $data['menu']             = "report";
        $data['child_menu']       = "loan";
        $data['staffs']           = Staff::get();

        if (!empty($request->input('dateTimeRange'))) {

            $loan_status      = $request->input('loan_status');
            $loan_category_id = $request->input('loan_category_id');
            $staff_id         = $request->input('staff_id');
            $dateTimeRange    = $request->input('dateTimeRange');

            $data['staff_id']          = $staff_id;
            $data['loan_status']       = $loan_status;
            $data['dateTimeRange']     = $dateTimeRange;
            list($from_date, $to_date) = dateTimeRangeDateCovert($dateTimeRange);

            if ($loan_status == 1) {
                $data['staffLoans'] = StaffLoan::with('staff')->where(function ($query) use ($from_date, $to_date, $staff_id) {
                    $query->where('staff_loan_date', '>=', $from_date);
                    $query->where('staff_loan_date', '<=', $to_date);

                    if ($staff_id) {
                        $query->where('staff_id', $staff_id);
                    }

                })->get();
            } else {
                $data['othersLoans'] = OthersLoan::where(function ($query) use ($from_date, $to_date) {
                    $query->where('loan_date', '>=', $from_date);
                    $query->where('loan_date', '<=', $to_date);

                })->get();

            }

        }

        return view('pages.report.loan.index', $data);
    }

}
