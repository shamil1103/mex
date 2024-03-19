<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('pages.staff.staff-info', compact('staffs'));
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
            'staff_id' => ['required', 'string', 'max:30'],
            'staff_name' => ['required', 'string', 'max:100'],
            'staff_mobile_no' => ['required', 'string', 'max:16'],
            'staff_address' => ['nullable', 'string', 'max:255'],
            'staff_nid_no' => ['nullable'],
            'staff_email_address' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Staff::class],
            'staff_salary_amount' => ['required', 'string', 'max:100'],
            'staff_picture' => [],
           
        ]);


        $staff = Staff::create([
            'staff_id' => $request->staff_id,
            'staff_name' => $request->staff_name,
            'staff_mobile_no' => $request->staff_mobile_no,
            'staff_address' => $request->staff_address,
            'staff_nid_no' => $request->staff_nid_no,
            'staff_email_address' => $request->staff_email_address,
            'staff_salary_amount' => $request->staff_salary_amount,
            'staff_picture' => $request->staff_picture,
        ]);

        if($staff) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
