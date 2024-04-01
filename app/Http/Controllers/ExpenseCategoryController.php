<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseCategoryRequest;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data                      = [];
        $data['menu']              = "settings";
        $data['child_menu']        = "expenseCategory";
        $data['expenseCategories'] = ExpenseCategory::all();

        return view('pages.setting.expense-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "settings";
        $data['child_menu'] = "expenseCategory";

        return view('pages.setting.expense-category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'name' => $validatedData['name'],
        ];

        $staffLoan = ExpenseCategory::create($insertData);

        if ($staffLoan) {
            $response = Session::flash('success', "Expense Category Save Successfully!");
        } else {
            $response = Session::flash('error', "Data Save Failed!");
        }

        return redirect()->route('expense-category.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        $data               = [];
        $data['menu']       = "settings";
        $data['child_menu'] = "expenseCategory";
        $data['expenseCategory']  = $expenseCategory;

        return view('pages.setting.expense-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseCategoryRequest $request, int $expenseCategoryId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'name' => $validatedData['name'],
        ];

        $staffLoan = ExpenseCategory::where('id', $expenseCategoryId)->update($updateData);

        if ($staffLoan) {
            $response = Session::flash('success', "Expense Category Update Successfully!");
        } else {
            $response = Session::flash('error', "Expense Category Update Failed!");
        }

        return redirect()->route('expense-category.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCat)
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
                $staffLoan = ExpenseCategory::find($request->id);
                $staffLoan->delete();

                if ($staffLoan) {
                    $response = ['success' => 'Expense Category Delete Successfully'];
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
