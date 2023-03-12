<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Register',
        ];
        return view('register.index', $data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'max:225'],
            'username' => ['required', 'min:3', 'max:100', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ]);
        $validateData["password"] = Hash::make($validateData["password"]);

        User::create($validateData);
        $request->session()->flash('message', 'Registrasi Berhasil silahkan Login');
        return redirect('/login');
    }
}
