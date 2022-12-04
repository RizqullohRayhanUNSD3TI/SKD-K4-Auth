<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //Controller untuk custom auth

    public function index()
    {
        return view('custom.login');
    }

    public function prosesLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if(auth()->user()->is_admin == 1)
            {
                return redirect()->route('admin');
            }
            else if(auth()->user()->jabatan == 'pegawai')
            {
                return redirect()->route('pegawai');
            }
            else
            {
                return redirect()->route('user');
            }
        } else {
            return redirect()->route('customLogin')->with('error', 'Email-Address and Password are wrong');
        }
    }

    public function admin()
    {
        return view('custom.admin');
    }
    
    public function pegawai()
    {
        return view('custom.pegawai');
    }
    
    public function user()
    {
        return view('custom.user');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('customLogin');
    }
}
