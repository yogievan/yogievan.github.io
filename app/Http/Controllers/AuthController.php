<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\support\Facades\Auth;

class AuthController extends Controller
{
    public function users(){
        $users = User::paginate(10);
        return view('users', ['cek' => 'mahasiswa'], ['users' => $users]);
    }

    public function users_viewtambah(){
        return view('formulirUser', ['cek' => 'mahasiswa']);
    }
    public function users_tambah(Request $request){
        User::create([
            'nik_user' => $request -> nik_user,
            'nama_user' => $request -> nama_user,
            'no_hp' => $request -> no_hp,
            'password' => md5($request -> password)
        ]);
        return redirect('/user')->with('create', 'Berhasil ditambah');
    }
    public function users_edit($id){
        $users = User::find($id);
        return view('editUser', ['cek' => 'mahasiswa'], ['users' => $users]);
    }
    public function users_update($id, Request $request){
        $user = User::find($id);
        $user -> nik_user = $request->nik_user;
        $user -> nama_user = $request->nama_user;
        $user -> no_hp = $request->no_hp;
        $user -> password = $request->password;
        $user -> save();
        return redirect('/users', ['cek' => 'mahasiswa'])->with('update', 'Berhasil diubah');
    }
    public function users_delete($id){
        $user = User::find($id);
        $user -> delete();
        return redirect('/users', ['cek' => 'mahasiswa'])->with('delete', 'Berhasil dihapus');
    }

    public function login(){
        return view('login');
    }
    public function ceklogin(Request $request){
        $user = User::where('no_hp', $request->no_hp)->where('password', md5($request->password))->first();
        $validatedData = $request->validate([
            'no_hp' => ['required'],
            'password' => ['required'],
        ]);
        Auth::login($user);
        return redirect('/home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('logout', 'Anda Berhasil Logout');
    }
}
