<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StaffLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();

        $staffloan = Staffloan::all();
        return view('pages.Loan.staff-loan', compact('staffloan', 'staffs'));
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
            'staff_loan_date' => ['required'],
            'staff_address' => ['nullable'],
            'staff_loan_description' => ['nullable'],
            'staff_leader_name' => ['string', 'max:100'],
            'staff_loan_amount' => ['string', 'max:255'],

            'staff_id' => ['required', 'string'],
           
        ]);


        $staffloan = Staffloan::create([
            'staff_loan_date' => $request->staff_loan_date,
            'staff_address' => $request->staff_address,
            'staff_loan_description' => $request->staff_loan_description,
            'staff_leader_name' => $request->staff_leader_name,
            'staff_loan_amount' => $request->staff_loan_amount,

            'staff_id' => $request->staff_id,
        ]);

        if($staffloan) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffLoan $staffLoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffLoan $staffLoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffLoan $staffLoan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffLoan $staffLoan)
    {
        //
    }
}
