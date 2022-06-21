@extends('layout/main')
@section('title', 'Dashboard')
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
    <div class="card mt-4">
        <div class="card-body">
            <H3>SELAMAT DATANG!</H3>
            <p>Username: {{Auth::user() -> nama_user}}</p>
        </div>
    </div>
@endsection