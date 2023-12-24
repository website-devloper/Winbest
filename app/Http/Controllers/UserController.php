<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{



    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',

         ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'role' => 'required',
    ]);

    $user->update($request->all());

    return redirect()->route('users.index')->with('success', 'User updated successfully');
}



public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}
}


