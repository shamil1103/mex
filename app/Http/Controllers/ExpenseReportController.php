<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\MarketingExpense;
use App\Models\OfficeExpense;
use App\Models\Staff;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data                      = [];
        $data['dateRangerPicker']  = true;
        $data['menu']              = "report";
        $data['child_menu']        = "expense";
        $data['staffs']            = Staff::get();
        $data['expenseCategories'] = ExpenseCategory::get();

        if (!empty($request->input('dateTimeRange'))) {

            $expense_status      = $request->input('expense_status');
            $expense_category_id = $request->input('expense_category_id');
            $staff_id            = $request->input('staff_id');
            $dateTimeRange       = $request->input('dateTimeRange');

            $data['staff_id']            = $staff_id;
            $data['expense_category_id'] = $expense_category_id;
            $data['expense_status']      = $expense_status;
            $data['dateTimeRange']       = $dateTimeRange;
            list($from_date, $to_date)   = dateTimeRangeDateCovert($dateTimeRange);

            if ($expense_status == 1) {
                $data['officeExpenses'] = OfficeExpense::with('expense_category')->where(function ($query) use ($from_date, $to_date, $expense_category_id) {
                    $query->where('expense_date', '>=', $from_date);
                    $query->where('expense_date', '<=', $to_date);

                    if ($expense_category_id) {
                        $query->where('expense_category_id', $expense_category_id);
                    }

                })->get();
            } else {
                $data['marketingExpenses'] = MarketingExpense::with('staff')->where(function ($query) use ($from_date, $to_date, $staff_id) {
                    $query->where('marketing_expense_date', '>=', $from_date);
                    $query->where('marketing_expense_date', '<=', $to_date);

                    if ($staff_id) {
                        $query->where('staff_id', $staff_id);
                    }

                })->get();

            }

        }

        return view('pages.report.expense.index', $data);
    }

}
