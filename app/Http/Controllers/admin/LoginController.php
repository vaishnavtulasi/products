<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\loginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function checkAdmin(loginRequest $req)
    {
        if (Auth('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {

            return redirect()->route('admin.home');
        }

        session()->flash('error', 'Invalid Credentials!.');
        return back()->withInput($req->all());

    }

    public function getLogout()
    {
        Auth('admin')->logout();
        // dd(Auth::guest('admin'));
        session()->flash('success', 'Logout Suceessfully.');
        return redirect()->route('admin.login');
    }
}
