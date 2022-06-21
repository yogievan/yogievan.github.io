<?php

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
    //mahasiswa
    Route::get('/mahasiswa', 'mahasiswaController@mhs'); //--> read
    Route::get('/mahasiswa/cari', 'mahasiswaController@mhs_cari'); //--> searching
    Route::get('/mahasiswa/formulirMhs', 'mahasiswaController@mhs_viewTambah'); //--> view create new data
    Route::post('/mahasiswa/create', 'mahasiswaController@mhs_tambah'); //--> create new data mahasiswa
    Route::get('/mahasiswa/editMhs/{id}', 'mahasiswaController@mhs_edit'); //--> go to view edit
    Route::put('/mahasiswa/update/{id}', 'mahasiswaController@mhs_update'); //--> Edit or Update mahasiswa
    Route::get('/mahasiswa/deleteMhs/{id}', 'mahasiswaController@mhs_delete'); //--> delete mahasiswa

    //user
    Route::get('/user', 'AuthController@users');
    Route::get('/user/formulirUser', 'AuthController@users_viewtambah'); //--> view create new data User
    Route::post('/user/create', 'AuthController@users_tambah'); //--> create new data user
    Route::get('/user/edituser/{id}', 'AuthController@users_edit'); //--> go to view edit user
    Route::put('/user/update/{id}', 'AuthController@users_update'); //--> Edit or Update user
    Route::get('/user/deleteuser/{id}', 'AuthController@users_delete'); //--> delete user

    Route::get('/home', 'mahasiswaController@home'); //--> view dashboard
    Route::get('/logout', 'AuthController@logout'); //--> logout
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', 'AuthController@login')->name('login'); //--> login
    Route::post('/user/ceklogin', 'AuthController@ceklogin'); //--> login
});

