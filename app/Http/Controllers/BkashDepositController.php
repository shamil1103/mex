<?php

namespace App\Http\Controllers;

use App\Models\BkashDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BkashDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bkashdeposits = Bkashdeposit::all();
        return view('pages.Deposit.nagod-bkash', compact('bkashdeposits'));
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
            'depositor_id' => ['required', 'string', 'max:20', 'unique:'.Bkashdeposit::class],
            'depositor_name' => ['required', 'string', 'max:100'],
            'deposit_mobile_no' => ['required', 'max:20', 'unique:'.Bkashdeposit::class],
            'txid_no' => ['required', 'max:20', 'unique:'.Bkashdeposit::class],
            'depositor_address' => ['nullable', 'string'],
            'depositor_nid_no' => ['nullable', 'string', 'max:20', 'unique:'.Bkashdeposit::class],
            'deposit_amount' => ['required'],

        ]);


        $bkashdeposit = Bkashdeposit::create([
            'deposit_type' => $request->deposit_type,
            'deposit_date' => $request->deposit_date,
            'depositor_id' => $request->depositor_id,
            'depositor_name' => $request->depositor_name,
            'deposit_mobile_no' => $request->deposit_mobile_no,
            'txid_no' => $request->txid_no,
            'depositor_address' => $request->depositor_address,
            'depositor_nid_no' => $request->depositor_nid_no,
            'deposit_amount' => $request->deposit_amount,
        ]);

        if($bkashdeposit) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(BkashDeposit $bkashDeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BkashDeposit $bkashDeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BkashDeposit $bkashDeposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BkashDeposit $bkashDeposit)
    {
        //
    }
}
