<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankDepositRequest;
use App\Models\BankDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class BankDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $bankdeposits = Bankdeposit::all();
        return view('pages.deposit.bank', compact('bankdeposits'));
=======
        $data                 = [];
        $data['menu']         = "deposit";
        $data['child_menu']   = "bankDeposit";
        $data['bankDeposits'] = BankDeposit::all();

        return view('pages.Deposit.bank.index', $data);
>>>>>>> 6b157e525feb4ea182f357f8348f504f276950cc
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "deposit";
        $data['child_menu'] = "bankDeposit";

        return view('pages.Deposit.bank.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankDepositRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'deposit_type'          => $validatedData['deposit_type'],
            'deposit_date'          => $validatedData['deposit_date'],
            'depositor_id'          => $validatedData['depositor_id'],
            'depositor_name'        => $validatedData['depositor_name'],
            'depositor_mobile_no'   => $validatedData['depositor_mobile_no'],
            'bank_name'             => $validatedData['bank_name'],
            'depositor_description' => $validatedData['depositor_description'],
            'depositor_nid_no'      => $validatedData['depositor_nid_no'],
            'deposit_amount'        => $validatedData['deposit_amount'],
        ];

        $bankDeposit = BankDeposit::create($insertData);

        if ($bankDeposit) {
            $response = Session::flash('success', "Bank Deposit Save Successfully!");
        } else {
            $response = Session::flash('error', "Bank Deposit Save Failed!");
        }

        return redirect()->route('bank-deposit.index')->with($response);
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
        $data                = [];
        $data['menu']        = "deposit";
        $data['child_menu']  = "bankDeposit";
        $data['bankDeposit'] = $bankDeposit;

        return view('pages.Deposit.bank.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankDepositRequest $request, int $bankDepositId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'deposit_type'          => $validatedData['deposit_type'],
            'deposit_date'          => $validatedData['deposit_date'],
            'depositor_id'          => $validatedData['depositor_id'],
            'depositor_name'        => $validatedData['depositor_name'],
            'depositor_mobile_no'   => $validatedData['depositor_mobile_no'],
            'bank_name'             => $validatedData['bank_name'],
            'depositor_description' => $validatedData['depositor_description'],
            'depositor_nid_no'      => $validatedData['depositor_nid_no'],
            'deposit_amount'        => $validatedData['deposit_amount'],
        ];

        $bankDeposit = BankDeposit::where('id', $bankDepositId)->update($updateData);

        if ($bankDeposit) {
            $response = Session::flash('success', "Bank Deposit Update Successfully!");
        } else {
            $response = Session::flash('error', "Bank Deposit Update Failed!");
        }

        return redirect()->route('bank-deposit.index')->with($response);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDeposit $bankDeposit)
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
                $cashDeposit = BankDeposit::find($request->id);
                $cashDeposit->delete();

                if ($cashDeposit) {
                    $response = ['success' => 'Bank Deposit Delete Successfully'];
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
