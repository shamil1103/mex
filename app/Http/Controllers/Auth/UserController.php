<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data               = [];
        $data['menu']       = "settings";
        $data['child_menu'] = "user";
        $data['users']      = User::all();

        return view('pages.setting.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data               = [];
        $data['menu']       = "settings";
        $data['child_menu'] = "user";

        return view('pages.setting.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();

        $insertData = [
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ];

        $staffLoan = User::create($insertData);

        if ($staffLoan) {
            $response = Session::flash('success', "User Save Successfully!");
        } else {
            $response = Session::flash('error', "User Save Failed!");
        }

        return redirect()->route('user.index')->with($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data               = [];
        $data['menu']       = "settings";
        $data['child_menu'] = "user";
        $data['user']       = $user;

        return view('pages.setting.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, int $userId)
    {
        $validatedData = $request->validated();

        $updateData = [
            'name'  => $validatedData['name'],
            'email' => $validatedData['email'],
        ];

        if ($validatedData['image']) {

            if ($validatedData['old_image']) {
                removeFile($validatedData['old_image']);
            }

            $updateData['image'] = uploadFile($validatedData['image'], 'users/');
        }

        if ($validatedData['password']) {
            $updateData['password'] = bcrypt($validatedData['password']);
        }

        $staffLoan = User::where('id', $userId)->update($updateData);

        if ($staffLoan) {
            $response = Session::flash('success', "User Update Successfully!");
        } else {
            $response = Session::flash('error', "User Update Failed!");
        }

        return redirect()->route('user.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
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
                $staffLoan = User::find($request->id);
                $staffLoan->delete();

                if ($staffLoan) {
                    $response = ['success' => 'User Delete Successfully'];
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
