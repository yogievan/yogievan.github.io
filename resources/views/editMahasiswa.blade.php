@extends('layout/main')
@section('title', 'EDIT DATA MAHASISWA')
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
        @php
            $minat = explode(', ', $mahasiswa -> bidang_minat);
        @endphp

        <form action="/mahasiswa/update/{{ $mahasiswa -> id}}" method="POST" class="pt-2 pb-2">
            @csrf
            @method('PUT') {{-- digunakan untuk memasukan data yang telah diubah sebelumnya --}}
            <div class="form-group w-50">
                <label>NIM</label>
                <input type="number" name="nim" class="form-control" value="{{ $mahasiswa -> nim}}" readonly>
            </div>
            <div class="form-group w-50">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa -> nama}}">
            </div>
            <div class="form-group w-50">
                <label >Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender"value="1" {{$mahasiswa -> gender == '1' ? 'checked':''}}>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="2" {{$mahasiswa -> gender == '2' ? 'checked':''}}>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
            <div class="form-group w-50">
                <label>Program Studi</label>
                <select class="form-control" name="jurusan">
                    <option value="Sistem Informasi" {{$mahasiswa -> jurusan == 'Sistem Informasi' ? 'selected':''}}>Sistem Informasi</option>
                    <option value="Teknik Informatika" {{$mahasiswa -> jurusan == 'Teknik Informatika' ? 'selected':''}}>Teknik Informatika</option>
                    <option value="Teknik Industri" {{$mahasiswa -> jurusan == 'Teknik Industri' ? 'selected':''}}>Teknik Industri</option>
                    <option value="Teknik Sipil" {{$mahasiswa -> jurusan == 'Teknik Sipil' ? 'selected':''}}>Teknik Sipil</option>
                    <option value="Teknik Mesin" {{$mahasiswa -> jurusan == 'Teknik Mesin' ? 'selected':''}}>Teknik Mesin</option>
                </select>
            </div>
            <div class="form-group w-50">
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Olahraga" {{ in_array('Olahraga', $minat) ? 'checked':''}}>
                    <label class="form-check-label"> Olahraga </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Seni Lukis" {{ in_array('Seni Lukis', $minat) ? 'checked':''}}>
                    <label class="form-check-label"> Seni Lukis </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Seni Musik" {{ in_array('Seni Musik', $minat) ? 'checked':''}}>
                    <label class="form-check-label"> Seni Musik </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="minat[]" type="checkbox" value="Seni Tari" {{ in_array('Seni Tari', $minat) ? 'checked':''}}>
                    <label class="form-check-label"> Seni Tari </label>
                </div>
            </div>
            <div>
                <input class="btn btn-outline-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection