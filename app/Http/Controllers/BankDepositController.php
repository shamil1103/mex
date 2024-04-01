<?php

namespace App\Http\Controllers;

use App\Models\BankDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BankDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankdeposits = Bankdeposit::all();
        return view('pages.deposit.bank', compact('bankdeposits'));
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
            'deposit_type' => ['required', 'string', 'max:30'],
            'deposit_date' => ['required'],
            'depositor_id' => ['required', 'string', 'max:20', 'unique:'.Bankdeposit::class],
            'depositor_name' => ['required', 'string', 'max:100'],
            'depositor_mobile_no' => ['required', 'max:20', 'unique:'.Bankdeposit::class],
            'bank_name' => ['required', 'max:100'],
            'depositor_description' => ['nullable', 'string'],
            'depositor_nid_no' => ['nullable', 'string', 'max:20', 'unique:'.Bankdeposit::class],
            'deposit_amount' => ['required'],
           
        ]);


        $bankdeposit = Bankdeposit::create([
            'deposit_type' => $request->deposit_type,
            'deposit_date' => $request->deposit_date,
            'depositor_id' => $request->depositor_id,
            'depositor_name' => $request->depositor_name,
            'depositor_mobile_no' => $request->depositor_mobile_no,
            'bank_name' => $request->bank_name,
            'depositor_description' => $request->depositor_description,
            'depositor_nid_no' => $request->depositor_nid_no,
            'deposit_amount' => $request->deposit_amount,
        ]);

        if($bankdeposit) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(BankDeposit $bankDeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankDeposit $bankDeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankDeposit $bankDeposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDeposit $bankDeposit)
    {
        //
    }
}
