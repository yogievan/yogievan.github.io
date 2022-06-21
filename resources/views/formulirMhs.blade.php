@extends('layout/main')
@section('title', 'TAMBAH DATA MAHASISWA')
@section('profile')
<div class="col-lg-12 bg-primary py-4 text-white"> <b>72200389-Yogi Evan D. K</b>
    <div class="dropdown float-right">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i> PROFILE USER
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#Profile">{{Auth::user() -> nama_user}}</a>
          <a class="dropdown-item" href="/user">Data User</a>
          <a class="dropdown-item" href="/logout">Log Out</a>
        </div>
    </div>     
</div>
@endsection
@section('isi')
    <div class="container-fluid mt-4 rounded">
        <form action="/mahasiswa/create" method="POST" class="pt-2 pb-2">
            @csrf
            <div class="form-group w-50">
                <label>NIM</label>
                <input type="number" name="nim" class="form-control" placeholder="Masukan Nomor Induk Mahasiswa" required>
            </div>
            <div class="form-group w-50">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Mahasiswa" required>
            </div>
            <div class="form-group w-50">
                <label >Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender"value="1" checked>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="2">
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="form-group w-50">
                <label>Program Studi</label>
                <select class="form-control" name="jurusan">
                    <option selected>Sistem Informasi</option>
                    <option>Teknik Informatika</option>
                    <option>Teknik Industri</option>
                    <option>Teknik Sipil</option>
                    <option>Teknik Mesin</option>
                </select>
            </div>
            <div class="form-group w-50">
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Olahraga">
                    <label class="form-check-label"> Olahraga </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Seni Lukis">
                    <label class="form-check-label"> Seni Lukis </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Seni Musik">
                    <label class="form-check-label"> Seni Musik </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Seni Tari">
                    <label class="form-check-label"> Seni Tari </label>
                </div>
            </div>
            <div>
                <input class="btn btn-outline-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection