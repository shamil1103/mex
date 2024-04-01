<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketingExpenseRequest;
use App\Models\MarketingExpense;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MarketingExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data                      = [];
        $data['menu']              = "expense";
        $data['child_menu']        = "marketingExpense";
        $data['marketingExpenses'] = MarketingExpense::with('staff')->get();

        return view('pages.expense.marketing-expense.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "expense";
        $data['child_menu'] = "marketingExpense";
        $data['staffs']     = Staff::all();

        return view('pages.expense.marketing-expense.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarketingExpenseRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'staff_id'                      => $validatedData['staff_id'],
            'marketing_expense_date'        => $validatedData['marketing_expense_date'],
            'expense_name'                  => $validatedData['expense_name'],
            'marketing_expense_description' => $validatedData['marketing_expense_description'],
            'marketing_expense_amount'      => $validatedData['marketing_expense_amount'],
        ];

        $marketingExpense = MarketingExpense::create($insertData);

        if ($marketingExpense) {
            $response = Session::flash('success', "Marketing Expense Save Successfully!");
        } else {
            $response = Session::flash('error', "Marketing Expense Save Failed!");
        }

        return redirect()->route('marketing-expense.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(MarketingExpense $marketingExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MarketingExpense $marketingExpense)
    {
        $data                     = [];
        $data['menu']             = "expense";
        $data['child_menu']       = "marketingExpense";
        $data['marketingExpense'] = $marketingExpense;
        $data['staffs']           = Staff::all();

        return view('pages.expense.marketing-expense.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarketingExpenseRequest $request, int $marketingExpenseId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'staff_id'                      => $validatedData['staff_id'],
            'marketing_expense_date'        => $validatedData['marketing_expense_date'],
            'expense_name'                  => $validatedData['expense_name'],
            'marketing_expense_description' => $validatedData['marketing_expense_description'],
            'marketing_expense_amount'      => $validatedData['marketing_expense_amount'],
        ];

        $marketingExpense = MarketingExpense::where('id', $marketingExpenseId)->update($updateData);

        if ($marketingExpense) {
            $response = Session::flash('success', "Marketing Expense Update Successfully!");
        } else {
            $response = Session::flash('error', "Marketing Expense Update Failed!");
        }

        return redirect()->route('marketing-expense.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarketingExpense $marketingExpense)
    {
        //
    }

    public function delete(Request $request)
    {
        $response = ['error' => 'Error Found'];

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
            ]);

            if ($validator->fails()) {
                $response = ['error' => 'Error Found'];
            } else {
                $staff = MarketingExpense::find($request->id);
                $staff->delete();

                if ($staff) {
                    $response = ['success' => 'Marketing Expense Delete Successfully'];
                } else {
                    $response = ['error' => 'Database Error Found'];
                }

            }

        } else {
            $response = ['error' => 'You are not authorized'];
        }

        return response()->json($response);
    }

}
