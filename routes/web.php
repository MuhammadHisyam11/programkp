<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;

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

// FRONTEND //
Route::get('/', [MahasiswaController::class, 'postguidance'])->name('dashboard');
Route::get('/JadwalBimbingan', [MahasiswaController::class, 'postguidance'])->name('show.bimbingan');
Route::get('/TugasKuliah', [MahasiswaController::class, 'postcollection'])->name('show.tugas');
Route::get('/Jadwalkuliah', [MahasiswaController::class, 'postlesson'])->name('show.kuliah');

// AUTH //
Auth::routes();

//Admin Route
Route::group(['middleware' => ['auth', 'rolemiddleware:admin']], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('user');
    Route::delete('/admin/destroy/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/guidance/data', [AdminController::class, 'guidance'])->name('admin.guidance');
    Route::post('/admin/guidance/data/{id}', [AdminController::class, 'acceptguid'])->name('admin.confirmguid');
    route::get('/admin/guidance/show/{id}', [AdminController::class, 'adminguid'])->name('admin.deleteguidance');
    Route::post('/admin/guidance/show/destroy/{id}', [AdminController::class, 'delete'])->name('admin.destroyguid');

    Route::get('/admin/collection/data', [AdminController::class, 'collection'])->name('admin.collection');
    Route::Post('/admin/collection/data/{id}', [AdminController::class, 'acceptcoll'])->name('admin.confirmcoll');
    Route::get('/admin/collection/show/{id}', [AdminController::class, 'admincoll'])->name('admin.deletecollection');
    Route::Post('/admin/collection/data/destroy/{id}', [AdminController::class, 'destroycoll'])->name('admin.destroycoll');

    Route::get('/admin/dosen', [AdminController::class, 'dashdosen'])->name('dosen');
    Route::get('/admin/dosen/create', [AdminController::class, 'createdos'])->name('dosen.create');
    Route::post('/admin/dosen/store', [AdminController::class, 'storedos'])->name('dosen.store');
    Route::get('/admin/dosen/edit/{id}', [AdminController::class, 'editdos'])->name('dosen.edit');
    Route::patch('/admin/dosen/update/{id}', [AdminController::class, 'updatedos'])->name('dosen.update');
    Route::delete('/admin/dosen/destroy/{id}', [AdminController::class, 'destroydos'])->name('dosen.destroy');

    Route::get('/admin/lesson', [AdminController::class, 'dashless'])->name('lesson');
    Route::get('/admin/lesson/create', [AdminController::class, 'createless'])->name('admin.createjadwal');
    Route::post('/admin/lesson/store', [AdminController::class, 'storeless'])->name('admin.storejadwal');
    Route::get('/admin/lesson/edit/{id}', [AdminController::class, 'editless'])->name('admin.editjadwal');
    Route::patch('/admin/lesson/update/{id}', [AdminController::class, 'updateless'])->name('admin.updatejadwal');
    Route::delete('/admin/lesson/destroy/{lesson}', [AdminController::class, 'destroyless'])->name('admin.destroyjadwal');
});

Route::group(['middleware' => ['auth', 'rolemiddleware:admin,mahasiswa']], function(){
    Route::get('/home', [MahasiswaController::class, 'privindex'])->name('home');
    // Private Show
    Route::get('/show', [MahasiswaController::class, 'privdash'])->name('active.post');
    Route::get('/show/guidance', [MahasiswaController::class, 'privguidance'])->name('active.guid');
    Route::get('/show/collection', [MahasiswaController::class, 'privcollection'])->name('active.coll');
    // Guidance
    Route::get('/post/guidance/create', [MahasiswaController::class, 'createguid'])->name('create.guidance');
    Route::post('/post/guidance/store', [MahasiswaController::class, 'storeguid'])->name('store.guidance');
    Route::get('/post/guidance/edit/{guidance}', [MahasiswaController::class, 'editguid'])->name('edit.guidance');
    Route::patch('/post/guidance/update/{guidance}', [MahasiswaController::class, 'updateguid'])->name('update.guidance');
    Route::post('/post/guidance/destroy/{id}', [MahasiswaController::class, 'destroyguid'])->name('destroy.guidance');
    // Collection
    Route::get('/post/collection/create', [MahasiswaController::class, 'createcoll'])->name('create.collection');
    Route::post('/post/collection/store', [MahasiswaController::class, 'storecoll'])->name('store.collection');
    Route::get('/post/collection/edit/{id}', [MahasiswaController::class, 'editcoll'])->name('edit.collection');
    Route::patch('/post/collection/update/{id}', [MahasiswaController::class, 'updatecoll'])->name('update.collection');
    Route::post('/post/collection/destroy/{id}', [MahasiswaController::class, 'destroycoll'])->name('destroy.collection');
    // History
    Route::get('/history', [MahasiswaController::class, 'hist'])->name('history');
    //history guidance
    Route::get('/history/guidance', [MahasiswaController::class, 'histguidance'])->name('history.guidance');
    Route::post('/history/guidance/{id}', [MahasiswaController::class, 'acceptguid'])->name('konfirmasi.historybimbingan');
    //history collection
    Route::get('/history/collection', [MahasiswaController::class, 'histcollection'])->name('history.collection');
    Route::post('/history/collection/{id}', [MahasiswaController::class, 'acceptcoll'])->name('konfirmasi.historytugas');
    //Edit Profile
    Route::get('/editprofile', [UserController::class, 'editprof'])->name('edit.profile');
    Route::put('/updateprofile', [UserController::class, 'updateprof'])->name('update.profile');
    Route::get('/resetpassword', [UserController::class, 'editpass'])->name('edit.password');
    Route::put('/resetpassword', [UserController::class, 'updatepass'])->name('update.password');
});

