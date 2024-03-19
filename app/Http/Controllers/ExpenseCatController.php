<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ExpenseCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseCats = ExpenseCat::all();
        return view('pages.setting.expense-category', compact('expenseCats'));
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
            'expense_category_name' => ['required', 'string', 'max:100'],
           
        ]);


        $expenseCat = ExpenseCat::create([
            'expense_category_name' => $request->expense_category_name,

        ]);

        if($expenseCat) {
            $response = Session::flash('success', "Data Save Successfully!");
        }else{
            $response = Session::flash('error', "Data Save Failed!");
        }
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCat $expenseCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCat $expenseCat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCat $expenseCat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCat $expenseCat)
    {
        //
    }
}
