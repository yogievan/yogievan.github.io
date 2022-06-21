<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class mahasiswaController extends Controller
{
    public function mhs(){

        $mhs = mahasiswa::orderBy('nim', 'DESC')->paginate(10); //diurutkan secara descending
        return view('mahasiswa', ['cek' => 'mahasiswa'],['mahasiswa' => $mhs]);
        // return view('mahasiswa');
    }
    public function mhs_cari(Request $request){
        $cari = $request-> cari;
        $mhs = mahasiswa::where('nim','like','%'.$cari.'%')-> orWhere('nama','like','%'.$cari.'%')->paginate();
        return view('mahasiswa', ['mahasiswa' => $mhs]);
    }

    public function mhs_viewTambah(){
        return view("/formulirMhs");
    }
    public function mhs_tambah(Request $request){
        mahasiswa::create([
            'nim' => $request -> nim,
            'nama' => $request -> nama,
            'gender' => $request -> gender,
            'jurusan' => $request -> jurusan,
            'bidang_minat' => implode(', ', $request -> input(array('minat')))
        ]);
        return redirect("/mahasiswa")->with('create', 'Berhasil ditambah');
    }

    public function mhs_edit($id){
        $mahasiswa = mahasiswa::find($id);
        return view('editMahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function mhs_update($id, Request $request){
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa -> nim = $request->nim;
        $mahasiswa -> nama = $request->nama;
        $mahasiswa -> gender = $request->gender;
        $mahasiswa -> jurusan = $request->jurusan;
        $mahasiswa -> bidang_minat = implode(', ', $request-> minat);
        $mahasiswa -> save();
        return redirect("/mahasiswa")->with('update', 'Berhasil diubah');
    }
    
    public function mhs_delete($id){
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa -> delete();
        return redirect('/mahasiswa')->with('delete', 'Berhasil dihapus');
    }

    public function home(){
        return view('/home', ['cek' => 'home']);
    }
}
