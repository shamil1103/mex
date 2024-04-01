<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data               = [];
        $data['menu']       = "staff";
        $data['child_menu'] = "staff";
        $data['staffs']     = Staff::all();

        return view('pages.staff.staff.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "staff";
        $data['child_menu'] = "staff";

        return view('pages.staff.staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'staff_id'            => $validatedData['staff_id'],
            'staff_name'          => $validatedData['staff_name'],
            'staff_mobile_no'     => $validatedData['staff_mobile_no'],
            'staff_address'       => $validatedData['staff_address'],
            'staff_nid_no'        => $validatedData['staff_nid_no'],
            'staff_email_address' => $validatedData['staff_email_address'],
            'staff_salary_amount' => $validatedData['staff_salary_amount'],
        ];

        $staff = Staff::create($insertData);

        if ($staff) {
            $response = Session::flash('success', "Staff Save Successfully!");
        } else {
            $response = Session::flash('error', "Staff Save Failed!");
        }

        return redirect()->route('staff.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $data               = [];
        $data['menu']       = "staff";
        $data['child_menu'] = "staff";
        $data['staff']      = $staff;

        return view('pages.staff.staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, int $staffId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'staff_id'            => $validatedData['staff_id'],
            'staff_name'          => $validatedData['staff_name'],
            'staff_mobile_no'     => $validatedData['staff_mobile_no'],
            'staff_address'       => $validatedData['staff_address'],
            'staff_nid_no'        => $validatedData['staff_nid_no'],
            'staff_email_address' => $validatedData['staff_email_address'],
            'staff_salary_amount' => $validatedData['staff_salary_amount'],
        ];

        $staff = Staff::where('id', $staffId)->update($updateData);

        if ($staff) {
            $response = Session::flash('success', "Staff Update Successfully!");
        } else {
            $response = Session::flash('error', "Staff Update Failed!");
        }

        return redirect()->route('staff.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
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
                $staff = Staff::find($request->id);
                $staff->delete();

                if ($staff) {
                    $response = ['success' => 'Staff Delete Successfully'];
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
