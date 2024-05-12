<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.account');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    

    public function activate(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        Session::flash('success', 'User status updated successfully.');
        return back();
    }
    public function deactivate(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        Session::flash('success', 'User status updated successfully.');
        return back();
    }

    public function changeName(User $user)
    {
        request()->validate([
            'name' => 'required|string|max:255',
        ]);
        $user->name = request()->name;
        $user->update();

        return back();
    }
    public function changePassword(Request $request, User $user)
    {
        $request->rules([
            'password'=> 'required|min:8',
            'password_confirm'=> 'required|min:8|same:password',
        ]);

        $user->password = Hash::make(request()->password);
        $user->update();

        return back()->with('PasswordChanged', 'password Changed Successfully');;
    }

    public function changeEmail(Request $request, User $user)
    {
        $request->rules([
            'email' => 'required|email|different:current_email|unique:admins,email',
        ],[],[
            'email.different'=> 'The new email should be different from the current email.',
        ]);

        $user->email = $request->email;
        $user->update();

        return back()->with('EmailChanged', 'Email Changed Successfully');;
    }

}
