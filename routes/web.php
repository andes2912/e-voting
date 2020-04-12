<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.welcome');
});

Auth::routes();

// BACKEND
    // CALON
    Route::resource('calon','backend\calonController');
    // PASANGAN
    Route::resource('pasangan','backend\pasanganController');
    Route::get('select-ketua','backend\pasanganController@select_ketua');
    Route::get('select-wakil','backend\pasanganController@select_wakil');
    Route::get('getcalonId/{id}','backend\pasanganController@get_calon_by_id');
    Route::get('visi-store','backend\pasanganController@visi_store');
    // PEMILIH
    Route::get('pemilih-aktif','backend\pemilihController@pemilih');

// FRONTEND
    // Pasangan
    Route::get('voting','frontend\pasanganController@pasangan');
    Route::get('proses-voting','frontend\pasanganController@voting');

Route::get('/home', 'HomeController@index')->name('home');
