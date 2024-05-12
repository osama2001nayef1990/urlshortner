<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminEmailRequest;
use App\Http\Requests\UpdateAdminPassword;
use App\Http\Requests\UpdateAdminPasswordRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.account');
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    public function changeName(Admin $admin)
    {
        request()->validate([
            'name' => 'required|string|max:255',
        ]);
        $admin->name = request()->name;
        $admin->update();

        return back();
    }
    public function changePassword(UpdateAdminPasswordRequest $request, Admin $admin)
    {
        $request->rules();

        $admin->password = Hash::make(request()->password);
        $admin->update();

        return back()->with('PasswordChanged', 'password Changed Successfully');;
    }

    public function changeEmail(UpdateAdminEmailRequest $request, Admin $admin)
    {
        $request->rules();

        $admin->email = $request->email;
        $admin->update();

        return back()->with('EmailChanged', 'Email Changed Successfully');;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function AllUsers(){
        return view('admin.usersList');
    }
    public function AllAdmins(){
        return view('admin.adminsList');
    }

    public function activate(Admin $admin)
    {
      
        $admin->is_active = !$admin->is_active;
        $admin->save();
        Session::flash('success', 'User status updated successfully.');
        return back();
    }
    public function deactivate(Admin $admin)
    {
       
        $admin->is_active = !$admin->is_active;
        $admin->save();
        Session::flash('success', 'User status updated successfully.');
        return back();
    }
}
