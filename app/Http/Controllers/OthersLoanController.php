<?php

namespace App\Http\Controllers;

use App\Models\OthersLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OthersLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $othersloan = Othersloan::all();
        return view('pages.Loan.others-loan', compact('othersloan'));
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
            'loan_date' => ['required'],
            'loan_name' => ['required', 'string', 'max:100'],
            'loan_address' => ['nullable'],
            'loan_reference' => ['required', 'string', 'max:100'],
            'loan_description' => ['nullable'],
            'loan_amount' => ['string'],
           
        ]);


        $othersloan = Othersloan::create([
            'loan_date' => $request->loan_date,
            'loan_name' => $request->loan_name,
            'loan_address' => $request->loan_address,
            'loan_reference' => $request->loan_reference,
            'loan_description' => $request->loan_description,
            'loan_amount' => $request->loan_amount,

        ]);

        if($othersloan) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(OthersLoan $othersLoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OthersLoan $othersLoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OthersLoan $othersLoan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OthersLoan $othersLoan)
    {
        //
    }
}
