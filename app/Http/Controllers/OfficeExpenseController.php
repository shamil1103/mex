<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeExpenseRequest;
use App\Models\ExpenseCategory;
use App\Models\OfficeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OfficeExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data                   = [];
        $data['menu']           = "expense";
        $data['child_menu']     = "officeExpense";
        $data['officeExpenses'] = OfficeExpense::with('expense_category')->get();

        return view('pages.expense.office-expense.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data                      = [];
        $data['menu']              = "expense";
        $data['child_menu']        = "officeExpense";
        $data['expenseCategories'] = ExpenseCategory::all();

        return view('pages.expense.office-expense.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficeExpenseRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'expense_category_id'        => $validatedData['expense_category_id'],
            'expense_date'               => $validatedData['expense_date'],
            'expense_name'               => $validatedData['expense_name'],
            'office_expense_description' => $validatedData['office_expense_description'],
            'office_expense_amount'      => $validatedData['office_expense_amount'],
        ];

        $officeExpense = OfficeExpense::create($insertData);

        if ($officeExpense) {
            $response = Session::flash('success', "Office Expense Save Successfully!");
        } else {
            $response = Session::flash('error', "Office Expense Save Failed!");
        }

        return redirect()->route('office-expense.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeExpense $officeExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeExpense $officeExpense)
    {
        $data                      = [];
        $data['menu']              = "expense";
        $data['child_menu']        = "officeExpense";
        $data['officeExpense']     = $officeExpense;
        $data['expenseCategories'] = ExpenseCategory::all();

        return view('pages.expense.office-expense.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficeExpenseRequest $request, int $officeExpenseId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'expense_category_id'        => $validatedData['expense_category_id'],
            'expense_date'               => $validatedData['expense_date'],
            'expense_name'               => $validatedData['expense_name'],
            'office_expense_description' => $validatedData['office_expense_description'],
            'office_expense_amount'      => $validatedData['office_expense_amount'],
        ];

        $officeExpense = OfficeExpense::where('id', $officeExpenseId)->update($updateData);

        if ($officeExpense) {
            $response = Session::flash('success', "Office Expense Update Successfully!");
        } else {
            $response = Session::flash('error', "Office Expense Update Failed!");
        }

        return redirect()->route('office-expense.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeExpense $officeExpense)
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
                $staff = OfficeExpense::find($request->id);
                $staff->delete();

                if ($staff) {
                    $response = ['success' => 'Office Expense Delete Successfully'];
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
