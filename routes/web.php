<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ROUTING AUTH */
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
});

/* ROUTING HOME */
Route::get('/', function () {
    return view('dashboard.index');
});
Route::get('/banner', function () {
    return view('dashboard.display');
});


/* ROUTING PROFILE */
Route::get('/profile', function () {
    return view('profile.index');
});
Route::get('/profile/settings', function () {
    return view('profile.settings');
});
Route::get('/profile/create', function () {
    return view('profile.create');
});



/* ROUTING SIMULASI */
Route::get('/simulasi/tabungan', function () {
    return view('simulasi.index');
});
Route::get('/simulasi/pinjam', function () {
    return view('simulasi.index_pinjaman');
});
Route::post('simulasi/hitung', 'SimulasiController@hitung');

Route::post('simulasi/hitungPinjaman', 'SimulasiController@hitungPinjaman');


/* ROUTING PRODUK */
Route::get('/produk', function () {
    return view('produk.index');
});

Route::get('/produk/daftar', function () {
    return view('produk.daftar');
});
Route::get('/produk/daftarTabungan', function () {
    return view('produk.daftarTabungan');
});

/* ROUTING LAPORAN */
Route::get('/laporan', function () {
    return view('laporan.index');
});


/* ROUTING CONTACT */
Route::get('/contact', function () {
    return view('contact.index');
});