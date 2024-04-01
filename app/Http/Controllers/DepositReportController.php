<?php

namespace App\Http\Controllers;

use App\Models\BankDeposit;
use App\Models\CashDeposit;
use App\Models\MobileBankingDeposit;
use Illuminate\Http\Request;

class DepositReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data                     = [];
        $data['dateRangerPicker'] = true;
        $data['menu']             = "report";
        $data['child_menu']       = "deposit";

        if (!empty($request->input('dateTimeRange'))) {

            $deposit_status            = $request->input('deposit_status');
            $deposit_type              = $request->input('deposit_type');
            $dateTimeRange             = $request->input('dateTimeRange');
            $data['deposit_type']      = $deposit_type;
            $data['deposit_status']    = $deposit_status;
            $data['dateTimeRange']    = $dateTimeRange;
            list($from_date, $to_date) = dateTimeRangeDateCovert($dateTimeRange);

            if ($deposit_status == 1) {
                $data['cashDeposits'] = CashDeposit::where(function ($query) use ($from_date, $to_date) {
                    $query->where('deposit_date', '>=', $from_date);
                    $query->where('deposit_date', '<=', $to_date);
                })->get();
            } elseif ($deposit_status == 2) {
                $data['bankDeposits'] = BankDeposit::where(function ($query) use ($from_date, $to_date) {
                    $query->where('deposit_date', '>=', $from_date);
                    $query->where('deposit_date', '<=', $to_date);
                })->get();
            } else {
                $data['mobileBankingDeposits'] = MobileBankingDeposit::where(function ($query) use ($from_date, $to_date, $deposit_type) {
                    $query->where('deposit_date', '>=', $from_date);
                    $query->where('deposit_date', '<=', $to_date);

                    if ($deposit_type) {
                        $query->where('deposit_type', $deposit_type);
                    }

                })->get();

            }
        }

        return view('pages.report.deposit.index', $data);
    }

}
