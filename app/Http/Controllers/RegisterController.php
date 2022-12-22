<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request); //* This is a debug function
        //dd($request->get('username'));

        //!update the request to validate the username
        $request->request->add([Str::slug($request->username)]);

        //validation
        $this->validate($request, [
            'username' => 'required|unique:users|min:3|max:20',
            'name' => 'required|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ]);


        //sign the user in
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);   
        //another way to authenticate the user

        auth()->attempt($request->only('email', 'password'));

        //redirect user

        return redirect()->route('posts.index');

    }
}
