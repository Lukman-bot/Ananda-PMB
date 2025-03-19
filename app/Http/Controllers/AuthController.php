<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class AuthController extends Controller
{
    public function index()
    {
        if (session()->has('id_users')) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $users = Users::where('alamat_email', $request->email)->first();

        if (!$users || !password_verify($request->password, $users->password)) {
            return redirect('/')
                ->withInput()
                ->with('error', 'Alamat email atau password salah!');
        }

        $role = DB::table('role')->where('id_role', $users->id_role)->first();

        $request->session()->put([
            'email' => $users->alamat_email,
            'id_users' => $users->id_users,
            'role' => $role->role,
            'id_role' => $role->id_role,
            'nama_lengkap' => $users->full_name,
        ]);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->invalidate();
        return redirect('/');
    }
}
