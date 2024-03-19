<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCat;
use Illuminate\Http\Request;
use App\Models\Officeexpense;
use Illuminate\Support\Facades\Session;

class OfficeexpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $excatObj = new ExpenseCat();

        $expenseCats = ExpenseCat::all();
        
        $officeexpense = Officeexpense::all();
        return view('pages.expense.office-expense', compact('officeexpense', 'expenseCats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'expense_id' => ['required'],
            'expense_date' => ['required'],
            'expense_name' => ['required', 'string', 'max:100'],
            'office_expense_description' => ['nullable'],
            'office_expense_amount' => ['string', 'max:20'],

            'expense_category_id' => ['required'],
           
        ]);


        $officeexpense = Officeexpense::create([
            // 'expense_id' => $request->expense_id,
            'expense_date' => $request->expense_date,
            'expense_name' => $request->expense_name,
            'office_expense_description' => $request->office_expense_description,
            'office_expense_amount' => $request->office_expense_amount,

            'expense_category_id' => $request->expense_category_id,
        ]);

        if($officeexpense) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Officeexpense $officeexpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Officeexpense $officeexpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officeexpense $officeexpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officeexpense $officeexpense)
    {
        //
    }
}
