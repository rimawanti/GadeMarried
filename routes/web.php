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
Route::get('/simulasi/nikah', function () {
    return view('simulasi.index_');
});
Route::get('/simulasi/nikah/{nilai}', function () {
    return view('simulasi.index_');
});
Route::get('/simulasi/travel', function () {
    return view('simulasi.travel');
});
Route::get('/simulasi/haji_umroh', function () {
    return view('simulasi.haji_');
});
Route::get('/simulasi/pendidikan', function () {
    return view('simulasi.pendidikan_');
});
Route::get('/simulasi/rumah', function () {
    return view('simulasi.rumah_');
});
Route::get('/simulasi/kendaraan', function () {
    return view('simulasi.kendaraan_');
});
// Route::get('/simulasi/pinjam', function () {
//     return view('simulasi.index_pinjaman');
// });

//Route::get('simulasi/nilai/{nilai}', ['as' => 'simulasi.nilai','uses' => 'SimulasiController@getNilai']);

//ajax function
Route::post('simulasi/nikah/hitung', ['as' => 'sim.nikah','uses' => 'SimulasiController@hitung']);
Route::post('simulasi/pendidikan/hitung', ['as' => 'sim.edu','uses' => 'SimulasiController@hitungPendidikan']);
Route::post('simulasi/haji/hitung', ['as' => 'sim.haji','uses' => 'SimulasiController@hitungHaji']);
Route::post('simulasi/rumah/hitung', ['as' => 'sim.rumah','uses' => 'SimulasiController@hitungRumah']);
Route::post('simulasi/kendaraan/hitung', ['as' => 'sim.kendaraan','uses' => 'SimulasiController@hitungKendaraan']);
//Route::post('simulasi/hitungPinjaman', 'SimulasiController@hitungPinjaman'); //gak dipake


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