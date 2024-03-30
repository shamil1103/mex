<?php

namespace App\Http\Controllers;

use App\Models\BankDeposit;
use App\Models\CashDeposit;
use App\Models\MarketingExpense;
use App\Models\MobileBankingDeposit;
use App\Models\OfficeExpense;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Index
     *
     * @return View
     */
    public function index(): View
    {
        $data               = [];
        $data['menu']       = "dashboard";
        $data['child_menu'] = "";

        return view("pages.home", $data);
    }

    /**
     * Dashboard
     *
     * @return View
     */
    public function dashboard(): View
    {
        $data               = [];
        $data['menu']       = "dashboard";
        $data['child_menu'] = "";

        $cashDeposits          = CashDeposit::select('deposit_date', DB::raw('sum(deposit_amount) as deposit_amount'))->groupBy('deposit_date')->get()->keyBy('deposit_date');
        $bankDeposits          = BankDeposit::select('deposit_date', DB::raw('sum(deposit_amount) as deposit_amount'))->groupBy('deposit_date')->get()->keyBy('deposit_date');
        $mobileBankingDeposits = MobileBankingDeposit::select('deposit_date', DB::raw('sum(deposit_amount) as deposit_amount'))->groupBy('deposit_date')->get()->keyBy('deposit_date');

        $data['revenue_charts'] = [];

        $startingDate = Carbon::now()->subDays(9);

        for ($i = 0; $i < 10; $i++) {
            $currentDate         = $startingDate->toDateString();
            $cashAmount          = 0;
            $bankAmount          = 0;
            $mobileBankingAmount = 0;

            if (isset($cashDeposits[$currentDate])) {
                $cashAmount = $cashDeposits[$currentDate]->deposit_amount;
            }

            if (isset($bankDeposits[$currentDate])) {
                $bankAmount = $bankDeposits[$currentDate]->deposit_amount;
            }

            if (isset($mobileBankingDeposits[$currentDate])) {
                $mobileBankingAmount = $mobileBankingDeposits[$currentDate]->deposit_amount;
            }

            $data['revenue_charts'][] = [
                "date"                => $currentDate,
                'cashAmount'          => $cashAmount,
                'bankAmount'          => $bankAmount,
                'mobileBankingAmount' => $mobileBankingAmount,
            ];
            // Move to the next day
            $startingDate->addDay();
        }

        $data['dashboardData'] = [
            'total_deposit' => CashDeposit::sum('deposit_amount') + BankDeposit::sum('deposit_amount') + MobileBankingDeposit::sum('deposit_amount'),
            'total_expense' => MarketingExpense::sum('marketing_expense_amount') + OfficeExpense::sum('office_expense_amount'),
            'total_staff'   => Staff::count(),
        ];

        return view("pages.home", $data);
    }

}
