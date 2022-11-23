<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use Illuminate\Http\Auth;
// use Auth;
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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/postlogin', [App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('postlogin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth','rolecheck:admin,direktur,pemohon']], function () {
    Route::get('/dashboard', function () {return View('layouts.dashboard');})->name('dashboard');
    Route::get('/peminjaman',[App\Http\Controllers\PeminjamanController::class, 'filterPeminjam'])->name('peminjaman');
    // Route::get('/peminjamanForm', function () {return View('layouts.peminjaman.peminjamanForm');})->name('peminjamanForm');
    Route::get('/listBanyaknya/{id}',[App\Http\Controllers\BarangController::class, 'listBanyaknya']);
    Route::get('/peminjamanForm',[App\Http\Controllers\BarangController::class, 'list'])->name('peminjamanForm');
    Route::get('/logout', function () {return View('components.logOutModal');})->name('logout');

    //pdf
    Route::get('peminjamanPDF',[App\Http\Controllers\PrintController::class, 'template'])->name('peminjamanPDF');
    Route::get('downloadPDF',[App\Http\Controllers\PrintController::class, 'download'])->name('downloadPDF');
    Route::get('showpdf',[App\Http\Controllers\PrintController::class, 'showpdf'])->name('showpdf');


    //print
    Route::post('choosePrint',[App\Http\Controllers\PrintController::class, 'insertCheckBox'])->name('choosePrint');
    Route::get("deleteDataPrint/{id}",[App\Http\Controllers\PrintController::class, 'deleteData'])->name('deleteDataPrint');


    //infoPeminjaman
    Route::get('/listPending',[App\Http\Controllers\PeminjamanController::class, 'listPending'])->name('listPending');

    Route::get('/listRiwayat',[App\Http\Controllers\PeminjamanController::class, 'listRiwayat'])->name('listRiwayat');

    Route::get("list",[App\Http\Controllers\PeminjamanController::class,"list"]);
    Route::get("filterPeminjam/{peminjam}",[App\Http\Controllers\PeminjamanController::class,"filterPeminjam"]);
    Route::get("peminjamAcc",[App\Http\Controllers\PeminjamanController::class,"print"])->name('peminjamAcc');
    Route::post("create",[App\Http\Controllers\PeminjamanController::class,"create"])->name('createData');
    Route::get("detail/{id}",[App\Http\Controllers\PeminjamanController::class,"detailData"])->name('detailData');
    Route::post("update/{id}",[App\Http\Controllers\PeminjamanController::class,"update"])->name('updateData');
    Route::get("delete/{id}",[App\Http\Controllers\PeminjamanController::class,"delete"])->name('delete');;

    //pengembalianBarang
    Route::get('/belumKembali',[App\Http\Controllers\PengembalianController::class, 'belumKembali'])->name('belumKembali');
    Route::get('/sudahKembali',[App\Http\Controllers\PengembalianController::class, 'sudahKembali'])->name('sudahKembali');
    Route::get("detailPengembalian/{id}",[App\Http\Controllers\PengembalianController::class,"detail"])->name('detailPengembalian');
    Route::get("detailPengembalian2/{id}",[App\Http\Controllers\PengembalianController::class,"detail2"])->name('detailPengembalian2');
    Route::post("updatePengembalian/{id}",[App\Http\Controllers\PengembalianController::class,"diKembalikan"])->name('updatePengembalian');
    Route::post("updateBelumPengembalian/{id}",[App\Http\Controllers\PengembalianController::class,"belumDiKembalikan"])->name('updateBelumPengembalian');

    //userManagement
    Route::get('/usermanagement',[App\Http\Controllers\UserController::class, 'getData'])->name('usermanagement');
    Route::get('/usermanagement/add',function () {return View('layouts.userManagement.userForm');})->name('user.form');
    Route::get("editData/{id}",[App\Http\Controllers\UserController::class, 'editData'])->name('user.edit');
    Route::post("putData/{id}",[App\Http\Controllers\UserController::class, 'putData'])->name('user.put');
    Route::get("deleteData/{id}",[App\Http\Controllers\UserController::class, 'deleteData'])->name('user.delete');
    Route::post("postData",[App\Http\Controllers\UserController::class, 'postData'])->name('user.add');

    //Route::get('/barang',function () {return View('layouts.barang.barangManagement');})->name('barang');
    Route::get('/barangmanagement',[App\Http\Controllers\BarangController::class, 'listBarang'])->name('barangmanagement');
    Route::get('/barangmanagement/add',function () {return View('layouts.barang.barangForm');})->name('barang.form');
    Route::post("addBarang",[App\Http\Controllers\BarangController::class, 'addBarang'])->name('barang.add');
    Route::get("editData/{id}",[App\Http\Controllers\BarangController::class, 'editData'])->name('barang.edit');
    Route::post("putData/{id}",[App\Http\Controllers\BarangController::class, 'putData'])->name('barang.put');
    Route::get("deleteData/{id}",[App\Http\Controllers\BarangController::class, 'deleteData'])->name('barang.delete');
    Route::get("barcodes",[App\Http\Controllers\BarangController::class, 'GetBarangBarcodes'])->name('barang.barcode');
    Route::get("barcodePrint",[App\Http\Controllers\BarangController::class,"barcodePrint"])->name('barcodePrint');

    Route::get('/drivermanagement',[App\Http\Controllers\DriverController::class, 'list'])->name('drivermanagement');
    Route::get('/driverForm',[App\Http\Controllers\DriverController::class, 'form'])->name('driver.form');
    Route::get('/driverForm/{id}',[App\Http\Controllers\DriverController::class, 'formEdit'])->name('driver.formedit');
    Route::post('/driverAdd',[App\Http\Controllers\DriverController::class, 'add'])->name('driver.add');
    Route::post('/editDriver', [App\Http\Controllers\DriverController::class, 'update']);
    Route::get('/inputfield', [App\Http\Controllers\DriverController::class, 'inputfield'])->name('driver.inputfield');
    Route::get('/deleteDriver', [App\Http\Controllers\DriverController::class, 'delete'])->name('driver.delete');


    Route::get('/laporan',[App\Http\Controllers\PeminjamanController::class, 'laporan'])->name('laporan');
    Route::get('/laporan/excel',[App\Http\Controllers\PeminjamanController::class, 'export_excel'])->name('laporan.excel');
}); 