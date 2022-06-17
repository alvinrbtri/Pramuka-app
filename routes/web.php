<?php

use App\Http\Controllers\AdminJenisLatihanController;
use App\Models\Kategori;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\PedomanController;
use App\Http\Controllers\InfoKegiatanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminPedomanController;
use App\Http\Controllers\AdminLatihanController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminInformasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardMateriController;
use App\Models\InfoKegiatan;
use App\Models\JenisLatihan;

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

Route::get('/', function () {
    return view('home',[
        "judul" => "Home",
        "active" => "home"
    ]);
})->name('home')->middleware(['auth']);

Route::get('/masuk', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/pedomans', [PedomanController::class, 'index']);
Route::get('/pedomans/{pedoman:slug}', [PedomanController::class, 'show']);

Route::get('/infokegiatans', [InfoKegiatanController::class, 'index']);
Route::get('/infokegiatans/{infokegiatan:slug}', [InfoKegiatanController::class, 'show']);

Route::get('/materis', [MateriController::class, 'index']);
Route::get('/materis/{materi:slug}', [MateriController::class, 'show']);

Route::get('/latihans', [LatihanController::class, 'index']);
Route::get('/latihans/{latihan:slug}', [LatihanController::class, 'show']);

Route::get('/kategories', function() {
    return view('kategories', [
        'judul' => 'Materi Kategories',
        'active' => 'kategories',
        'kategories' => Kategori::all()
    ]);
});

Route::get('/jenislatihans', function() {
    return view('jenislatihans', [
        'judul' => 'Jenis Latihan',
        'active' => 'jenislatihans',
        'jenislatihans' => JenisLatihan::all()
    ]);
});



Route::get('/dashboard', function() {
    return view('dashboard.index');
})->name('dashboard')->middleware(['auth']);

Route::get('/dashboard/materis/checkSlug', [DashboardMateriController::class, 'checkSlug']);
Route::resource('/dashboard/materis', DashboardMateriController::class);
Route::resource('/dashboard/kategoris', AdminKategoriController::class);


Route::get('/dashboard/latihans/checkSlug', [AdminLatihanController::class, 'checkSlug'])
->middleware('auth');
Route::resource('/dashboard/latihans', AdminLatihanController::class)->middleware('auth');
Route::resource('/dashboard/jenislatihans', AdminJenisLatihanController::class);

Route::resource('/dashboard/pedomans', AdminPedomanController::class);
Route::resource('/dashboard/infokegiatans', AdminInformasiController::class);

Route::get('/dashboard/tambah_siswas', [AuthController::class, 'utama'])->middleware('auth');
Route::post('/dashboard/tambah_siswas/store', [AuthController::class, 'store'])->middleware('auth');
Route::get('/dashboard/tambah_siswas/create', [AuthController::class, 'create'])->middleware('auth');
// Route::get('/dashboard/tambah_siswas/show/{user:nis}',[AuthController::class,'show'])->middleware('auth');
Route::get('/dashboard/tambah_siswas/edit/{user:nis}',[AuthController::class,'edit'])->middleware('auth');
Route::put('/dashboard/tambah_siswas/update/{user:nis}',[AuthController::class,'update'])->middleware('auth');
Route::delete('/dashboard/tambah_siswas/delete/{user:nis}',[AuthController::class,'destroy'])->middleware('auth');
Route::get('/dashboard/tambah_siswas/show/{nis}',[AuthController::class,'show'])->middleware('auth');


// CK EDITOR lARAVEL fILE MANAGER
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


