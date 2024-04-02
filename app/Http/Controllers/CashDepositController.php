<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashDepositRequest;
use App\Models\CashDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CashDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data                 = [];
        $data['menu']         = "deposit";
        $data['child_menu']   = "cashDeposit";
        $data['cashDeposits'] = CashDeposit::all();

        return view('pages.Deposit.cash.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "deposit";
        $data['child_menu'] = "cashDeposit";

        return view('pages.Deposit.cash.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CashDepositRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'deposit_type'        => $validatedData['deposit_type'],
            'deposit_date'        => $validatedData['deposit_date'],
            'depositor_id'        => $validatedData['depositor_id'],
            'depositor_name'      => $validatedData['depositor_name'],
            'depositor_mobile_no' => $validatedData['depositor_mobile_no'],
            'depositor_address'   => $validatedData['depositor_address'],
            'depositor_nid_no'    => $validatedData['depositor_nid_no'],
            'deposit_amount'      => $validatedData['deposit_amount'],
        ];

        $cashDeposit = CashDeposit::create($insertData);

        if ($cashDeposit) {
            $response = Session::flash('success', "Cash Deposit Save Successfully!");
        } else {
            $response = Session::flash('error', "Cash Deposit Save Failed!");
        }

        return redirect()->route('cash-deposit.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(CashDeposit $cashDeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CashDeposit $cashDeposit)
    {
        $data                = [];
        $data['menu']        = "deposit";
        $data['child_menu']  = "cashDeposit";
        $data['cashDeposit'] = $cashDeposit;

        return view('pages.Deposit.cash.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CashDepositRequest $request, int $cashDepositId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'deposit_type'        => $validatedData['deposit_type'],
            'deposit_date'        => $validatedData['deposit_date'],
            'depositor_id'        => $validatedData['depositor_id'],
            'depositor_name'      => $validatedData['depositor_name'],
            'depositor_mobile_no' => $validatedData['depositor_mobile_no'],
            'depositor_address'   => $validatedData['depositor_address'],
            'depositor_nid_no'    => $validatedData['depositor_nid_no'],
            'deposit_amount'      => $validatedData['deposit_amount'],
        ];

        $cashDeposit = CashDeposit::where('id', $cashDepositId)->update($updateData);

        if ($cashDeposit) {
            $response = Session::flash('success', "Cash Deposit Update Successfully!");
        } else {
            $response = Session::flash('error', "Cash Deposit Update Failed!");
        }

        return redirect()->route('cash-deposit.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashDeposit $cashDeposit)
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
                $cashDeposit = CashDeposit::find($request->id);
                $cashDeposit->delete();

                if ($cashDeposit) {
                    $response = ['success' => 'Cash Deposit Delete Successfully'];
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
