<?php

namespace App\Http\Controllers;

use App\Http\Requests\OthersLoanRequest;
use App\Models\OthersLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OthersLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $othersloan = Othersloan::all();
        return view('pages.loan.others-loan', compact('othersloan'));
=======
        $data                = [];
        $data['menu']        = "loan";
        $data['child_menu']  = "othersLoan";
        $data['othersLoans'] = OthersLoan::all();

        return view('pages.Loan.others-loan.index', $data);

>>>>>>> 6b157e525feb4ea182f357f8348f504f276950cc
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "loan";
        $data['child_menu'] = "othersLoan";

        return view('pages.Loan.others-loan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OthersLoanRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'loan_date'        => $validatedData['loan_date'],
            'loan_name'        => $validatedData['loan_name'],
            'loan_address'     => $validatedData['loan_address'],
            'loan_reference'   => $validatedData['loan_reference'],
            'loan_description' => $validatedData['loan_description'],
            'loan_amount'      => $validatedData['loan_amount'],
        ];

        $staffLoan = OthersLoan::create($insertData);

        if ($staffLoan) {
            $response = Session::flash('success', "Others Loan Save Successfully!");
        } else {
            $response = Session::flash('error', "Data Save Failed!");
        }

        return redirect()->route('others-loan.index')->with($response);
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
        $data               = [];
        $data['menu']       = "loan";
        $data['child_menu'] = "othersLoan";
        $data['othersLoan'] = $othersLoan;

        return view('pages.Loan.others-loan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OthersLoanRequest $request, int $othersLoanId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'loan_date'        => $validatedData['loan_date'],
            'loan_name'        => $validatedData['loan_name'],
            'loan_address'     => $validatedData['loan_address'],
            'loan_reference'   => $validatedData['loan_reference'],
            'loan_description' => $validatedData['loan_description'],
            'loan_amount'      => $validatedData['loan_amount'],
        ];

        $othersLoan = OthersLoan::where('id', $othersLoanId)->update($updateData);

        if ($othersLoan) {
            $response = Session::flash('success', "Others Loan Update Successfully!");
        } else {
            $response = Session::flash('error', "Others Loan Update Failed!");
        }

        return redirect()->route('others-loan.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OthersLoan $othersLoan)
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
                $staffLoan = OthersLoan::find($request->id);
                $staffLoan->delete();

                if ($staffLoan) {
                    $response = ['success' => 'Others Loan Delete Successfully'];
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
