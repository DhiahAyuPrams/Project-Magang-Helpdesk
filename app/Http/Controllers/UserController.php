<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index (){
        $listUser = UserModel::all();
        // dd($listUser);
        return view('userlist', compact('listUser'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Super Admin,Pegawai,Pimpinan,Tim IT',
        ]);
    
        // Buat pengguna baru
        $user = new UserModel();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('userlist')->with('success', 'User berhasil ditambahkan');
    }
    


    public function detail($id)
    {
        $ticket = UserModel::find($id);
        // MessageCreate::dispatch('Masukkan Pesan Disini');
        // dd($ticket);
        return view('userdetail', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:Super Admin,Pegawai,Pimpinan,Tim IT',
        ]);
    
        $user->update([
            'name' => $request->name,
            'role' => $request->role,
        ]);
    
        return redirect()->route('userlist')->with('success', 'Data user berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $user = UserModel::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }


}

