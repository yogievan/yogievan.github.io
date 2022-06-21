@extends('layout/main')
@section('title', 'DATA USER')
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
    <div class="container-fluid mt-4">
        @if (session('create'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('create')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
        @endif
                
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('update')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('delete')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
        @endif
    </div>
        <div class="card-header">
            <a name="" id="" class="btn btn-primary" href="/user/formulirUser" role="button"><i class="bi bi-plus-square-dotted"></i> TAMBAH USER</a>
            <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/user/cari">
                <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">NIK User</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Manipulasi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $no => $u)
                    <tr>
                        <th scope="row">{{$users -> firstItem() + $no}}</th>
                        <td>{{$u -> nik_user}}</td>
                        <td>{{$u -> nama_user}}</td>
                        <td>{{$u -> no_hp}}</td>
                        <td>
                            <a href="/user/edituser/{{ $u -> id }}" class="btn btn-outline-success">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="/user/deleteuser/{{ $u -> id }}" class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Menghapus Data?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span class="float-right">{{$users -> links()}}</span>
        </div>   
        </div>
    </div>
@endsection