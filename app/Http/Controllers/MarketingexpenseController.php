<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Marketingexpense;
use Illuminate\Support\Facades\Session;


class MarketingexpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $staffObj = new Staff();

        $staffs = Staff::all();

        $marketingexpense = Marketingexpense::all();
        return view('pages.expense.marketing-expense', compact('marketingexpense', 'staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marketing_expense_date' => ['required'],
            'expense_name' => ['required', 'string', 'max:100'],
            'marketing_expense_description' => ['nullable'],
            'marketing_expense_amount' => ['string', 'max:20'],

            'staff_id' => ['required', 'string'],
           
        ]);


        $marketingexpense = Marketingexpense::create([
            'marketing_expense_date' => $request->marketing_expense_date,
            'expense_name' => $request->expense_name,
            'marketing_expense_description' => $request->marketing_expense_description,
            'marketing_expense_amount' => $request->marketing_expense_amount,

            'staff_id' => $request->staff_id,
        ]);

        if($marketingexpense) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Marketingexpense $marketingexpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marketingexpense $marketingexpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marketingexpense $marketingexpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketingexpense $marketingexpense)
    {
        //
    }
}
