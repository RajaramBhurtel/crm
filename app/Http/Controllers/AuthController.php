<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as Session;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function registration()
    {
        return view('auth.register');
    }
    function validate_registration(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ]);
        $data = $request->all();
        User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'Registration Completed, now proceed to login');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == '1') {
                return redirect('admin/admin');
            } else {
                return redirect('customers');
            }
        }
        return redirect('login')->with('failed', 'Login details are not valid.');
    }




    function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
