<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobileBankingDepositRequest;
use App\Models\MobileBankingDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MobileBankingDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data                          = [];
        $data['menu']                  = "deposit";
        $data['child_menu']            = "mobileBankingDeposit";
        $data['mobileBankingDeposits'] = MobileBankingDeposit::all();

        return view('pages.Deposit.mobile-banking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "deposit";
        $data['child_menu'] = "mobileBankingDeposit";

        return view('pages.Deposit.mobile-banking.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobileBankingDepositRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'deposit_type'        => $validatedData['deposit_type'],
            'deposit_date'        => $validatedData['deposit_date'],
            'depositor_id'        => $validatedData['depositor_id'],
            'depositor_name'      => $validatedData['depositor_name'],
            'depositor_mobile_no' => $validatedData['depositor_mobile_no'],
            'txid_no'             => $validatedData['txid_no'],
            'depositor_address'   => $validatedData['depositor_address'],
            'depositor_nid_no'    => $validatedData['depositor_nid_no'],
            'deposit_amount'      => $validatedData['deposit_amount'],
        ];

        $mobileBankingDeposit = MobileBankingDeposit::create($insertData);

        if ($mobileBankingDeposit) {
            $response = Session::flash('success', "Mobile Banking Deposit Save Successfully!");
        } else {
            $response = Session::flash('error', "Mobile Banking Deposit Save Failed!");
        }

        return redirect()->route('mobile-banking-deposit.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(MobileBankingDeposit $mobileBankingDeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MobileBankingDeposit $mobileBankingDeposit)
    {
        $data                         = [];
        $data['menu']                 = "deposit";
        $data['child_menu']           = "mobileBankingDeposit";
        $data['mobileBankingDeposit'] = $mobileBankingDeposit;

        return view('pages.Deposit.mobile-banking.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobileBankingDepositRequest $request, int $mobileBankingDepositId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'deposit_type'        => $validatedData['deposit_type'],
            'deposit_date'        => $validatedData['deposit_date'],
            'depositor_id'        => $validatedData['depositor_id'],
            'depositor_name'      => $validatedData['depositor_name'],
            'depositor_mobile_no' => $validatedData['depositor_mobile_no'],
            'txid_no'             => $validatedData['txid_no'],
            'depositor_address'   => $validatedData['depositor_address'],
            'depositor_nid_no'    => $validatedData['depositor_nid_no'],
            'deposit_amount'      => $validatedData['deposit_amount'],
        ];

        $mobileBankingDeposit = MobileBankingDeposit::where('id', $mobileBankingDepositId)->update($updateData);

        if ($mobileBankingDeposit) {
            $response = Session::flash('success', "Mobile Banking Deposit Update Successfully!");
        } else {
            $response = Session::flash('error', "Mobile Banking Deposit Update Failed!");
        }

        return redirect()->route('mobile-banking-deposit.index')->with($response);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MobileBankingDeposit $mobileBankingDeposit)
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
                $cashDeposit = MobileBankingDeposit::find($request->id);
                $cashDeposit->delete();

                if ($cashDeposit) {
                    $response = ['success' => 'Mobile Banking Deposit Delete Successfully'];
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
