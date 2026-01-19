<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('home.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'Email tidak terdaftar');
        }

        if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Password salah');
        }

        // === SIMPAN SESSION (SESUAI MIDDLEWARE) ===
        Session::put('admin_login', true);
        Session::put('admin_id', $admin->id);     // ⬅️ FIX DI SINI
        Session::put('admin_nama', $admin->nama);

        // === ARAHKAN KE DASHBOARD ===
        return redirect('/dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
