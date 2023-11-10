<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\CreateEmployeeRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('Admin.Panel.users.users-index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Panel.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        try {
            $user = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'password' => bcrypt($request->password),
            ]);

            return successResponse('Employee created successfully', $user, 201);
        } catch (\Throwable $th) {
            return errorResponse('Something went wrong!', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = Admin::find($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return successResponse('Employee updated successfully', $user, 201);
        } catch (\Throwable $th) {
            return errorResponse('Something went wrong!', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::find($id)->delete();
        return successResponse('Employee deleted successfully');
    }

    public function getEmployees()
    {
        $users = Admin::whereNot('type', Constant::ROLE['Admin'])->get();

        return view('Admin.Panel.users.employees', compact('users'));
    }
}
