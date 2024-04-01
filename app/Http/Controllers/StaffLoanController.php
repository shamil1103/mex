<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffLoanRequest;
use App\Models\Staff;
use App\Models\StaffLoan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data               = [];
        $data['menu']       = "loan";
        $data['child_menu'] = "staffLoan";
        $data['staffs']     = Staff::all();
        $data['staffLoans'] = StaffLoan::all();

<<<<<<< HEAD
        $staffloan = Staffloan::all();
        return view('pages.loan.staff-loan', compact('staffloan', 'staffs'));
=======
        return view('pages.Loan.staff-loan.index', $data);
>>>>>>> 6b157e525feb4ea182f357f8348f504f276950cc
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "loan";
        $data['child_menu'] = "staffLoan";
        $data['staffs']     = Staff::all();

        return view('pages.Loan.staff-loan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffLoanRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'staff_loan_date'        => $validatedData['staff_loan_date'],
            'staff_id'               => $validatedData['staff_id'],
            'staff_address'          => $validatedData['staff_address'],
            'staff_loan_description' => $validatedData['staff_loan_description'],
            'staff_leader_name'      => $validatedData['staff_leader_name'],
            'staff_loan_amount'      => $validatedData['staff_loan_amount'],
        ];

        $staffLoan = StaffLoan::create($insertData);

        if ($staffLoan) {
            $response = Session::flash('success', "Staff Loan Save Successfully!");
        } else {
            $response = Session::flash('error', "Data Save Failed!");
        }

        return redirect()->route('staff-loan.index')->with($response);
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
        $data               = [];
        $data['menu']       = "loan";
        $data['child_menu'] = "staffLoan";
        $data['staffs']     = Staff::all();
        $data['staffLoan']  = $staffLoan;

        return view('pages.Loan.staff-loan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffLoanRequest $request, int $staffLoanId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'staff_loan_date'        => $validatedData['staff_loan_date'],
            'staff_id'               => $validatedData['staff_id'],
            'staff_address'          => $validatedData['staff_address'],
            'staff_loan_description' => $validatedData['staff_loan_description'],
            'staff_leader_name'      => $validatedData['staff_leader_name'],
            'staff_loan_amount'      => $validatedData['staff_loan_amount'],
        ];

        $staffLoan = StaffLoan::where('id', $staffLoanId)->update($updateData);

        if ($staffLoan) {
            $response = Session::flash('success', "Staff Loan Update Successfully!");
        } else {
            $response = Session::flash('error', "Staff Loan Update Failed!");
        }

        return redirect()->route('staff-loan.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffLoan $staffLoan)
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
                $staffLoan = StaffLoan::find($request->id);
                $staffLoan->delete();

                if ($staffLoan) {
                    $response = ['success' => 'Staff Loan Delete Successfully'];
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
