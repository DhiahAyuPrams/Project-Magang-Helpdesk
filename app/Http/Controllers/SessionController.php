<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);
    
        // Cek apakah username ada di database
        $user = User::where('username', $request->username)->first();
    
        if ($user) {
            // Jika username ditemukan tetapi password salah
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['password' => 'Password yang dimasukkan salah'])->withInput();
            }
    
            // Jika username dan password benar, lakukan login
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                switch (Auth::user()->role) {
                    case 'Super Admin':
                        return redirect('/dashboard-admin');
                    case 'Pegawai':
                        return redirect('/dashboard-user');
                    case 'Tim IT':
                        return redirect('/dashboard-agent');
                    case 'Pimpinan':
                        return redirect('/dashboard-supervisor');
                }
            }
        }
    
        // Jika username tidak ditemukan
        return redirect()->back()->withErrors(['username' => 'Username tidak ditemukan'])->withInput();
    }
    

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}