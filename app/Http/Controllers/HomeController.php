<?php

namespace App\Http\Controllers;

use App\Models\BankDeposit;
use App\Models\CashDeposit;
use App\Models\MarketingExpense;
use App\Models\MobileBankingDeposit;
use App\Models\OfficeExpense;
use App\Models\Staff;
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

        $data['dashboardData'] = [
            'total_deposit' => CashDeposit::sum('deposit_amount') + BankDeposit::sum('deposit_amount') + MobileBankingDeposit::sum('deposit_amount'),
            'total_expense' => MarketingExpense::sum('marketing_expense_amount') + OfficeExpense::sum('office_expense_amount'),
            'total_staff'   => Staff::count(),
        ];

        return view("pages.home", $data);
    }

    /**
     * Dashboard
     *
     * @return View
     */
    public function dashboard(): View
    {
        $data                  = [];
        $data['menu']          = "dashboard";
        $data['child_menu']    = "";

        $data['all_sales']     = $this->M_for_all_crud->select_table_data_multiple_condition(
			'total_amount,sales_time',
			'tbl_sales',
			[
				'delivery_status in (0,2)' => null,
				'order_status !=' => 3,
				'sales_date' => date("Y-m-d"),
			]
		);

		$data['line_chart'] = [];
		$tenDayBefore 	= date('Y-m-d',strtotime("-10 day",strtotime(date('Y-m-d'))));

		for($i = 1; $i <= 10; $i++){
			$current_date 	= date("Y-m-d", strtotime($tenDayBefore . ' + ' . $i . 'day'));
			$amount 		= 0;
			$current_date_sales    = $this->M_for_all_crud->select_single_data_multiple_condition(
				'sum(total_amount) as total_amount',
				'tbl_sales',
				[
					'delivery_status in (0,2)' => null,
					'order_status !=' => 3,
					'sales_date' => $current_date,
				]
			);
			if($current_date_sales && $current_date_sales->total_amount){
				$amount = $current_date_sales->total_amount;
			}
			$data['line_chart'][] = [
				"date" => $current_date,
				"sales_amount" => $amount,
			];
		}


        $data['dashboardData'] = [
            'total_deposit' => CashDeposit::sum('deposit_amount') + BankDeposit::sum('deposit_amount') + MobileBankingDeposit::sum('deposit_amount'),
            'total_expense' => MarketingExpense::sum('marketing_expense_amount') + OfficeExpense::sum('office_expense_amount'),
            'total_staff'   => Staff::count(),
        ];

        return view("pages.home", $data);
    }
}
