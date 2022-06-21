@extends('layout/main')
@section('title', 'EDIT DATA USER')
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
    <form action="/user/update/{{ $users -> id}}" method="POST" class="pt-2 pb-2">
        @csrf
        @method('PUT')
        <div class="form-group w-50">
            <label>NIK User</label>
            <input type="number" name="nik_user" class="form-control" value="{{ $users -> nik_user}}" placeholder="Masukan NIK">
        </div>
        <div class="form-group w-50">
            <label>Nama User</label>
            <input type="text" name="nama_user" class="form-control" value="{{ $users -> nama_user}}" placeholder="Masukan Nama User">
        </div>
        <div class="form-group w-50">
            <label>No. Handphone User</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $users -> no_hp}}" placeholder="Masukan No. Handphone">
        </div>
        <div class="form-group w-50">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div>
            <input class="btn btn-outline-primary" type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection