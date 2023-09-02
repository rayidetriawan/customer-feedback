<?php

use Illuminate\Support\Facades\Route;
use App\Tiket;
use App\Rating;

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
Auth::routes();

// Route::get('/', function ()
// {
//     return view('welcome');
// });

// Route::get('/','AuthController@index')->name('login');
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::get('/daftar', function ()
{
    return view('auth/daftar');
})->name('daftar');
Route::post('/daftar','AuthController@daftar')->name('daftar.add');
Route::post('/','AuthController@login')->name('login');
// Route::post('/','Auth\LoginController@login')->name('login');

Route::get('/reset-password', 'AuthController@halamanreset')->name('reset.index');
Route::post('/create-token-and-sendemail', 'AuthController@createTokenAndSendEmail')->name('reset');
Route::get('/reset-password/{token}', 'AuthController@showResetForm')->name('password.reset');
Route::post('/reset-password', 'AuthController@reset')->name('reset2');

// // Route::group(['middleware' => 'CekloginMiddleware'], function (){
Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', function () { 
        //cek apakah ada tiket yg solved ?
        $cektiket = Tiket::where('reported','=', Auth::user()->username)
            ->where('status','=', 0)
            ->get();
        $data = null;
        if(Auth::user()->role == 'teknisi'){
            $jumlah_tiket= Tiket::where('id_teknisi', Auth::user()->username)->count();
            $onprogress = Tiket::where('id_teknisi', Auth::user()->username)->where('status',4)->count();
            $done_tiket = Tiket::where('id_teknisi', Auth::user()->username)->where('status',0)->count();
        }else if(Auth::user()->role == 'admin'){

            $jumlah_tiket   = Tiket::count();
            $onprogress     = Tiket::where('status','=', 4)->count();
            $done_tiket     = Tiket::where('status','=', 0)->count();
        }else{
            $jumlah_tiket   = Tiket::where('reported','=', Auth::user()->username)
                                ->count();
            $onprogress     = Tiket::where('reported','=', Auth::user()->username)
                                ->where('status','=', 4)
                                ->count();
            $done_tiket     = Tiket::where('reported','=', Auth::user()->username)
                                ->where('status','=', 0)
                                ->count();
        }
        foreach ($cektiket as $value) {
            
            if($cektiket){
                //cek apakah sudah ada penilaian ?
                $cekrating = Rating::where('id_ticket', '=', $value->idTiket)->first();
                if(empty($cekrating)){
                    $data = Tiket::where('idTiket','=',$value->idTiket)->first();

                    return view('index', compact('data','jumlah_tiket','onprogress','done_tiket'));
                }
            }
        }

        return view('index', compact('data','jumlah_tiket','onprogress','done_tiket'));
    })->name('/home');

    Route::group(['middleware' => 'can:isAdmin'], function (){
       
        Route::get('karyawan','KaryawanController@index')->name('karyawan');
        Route::post('karyawan/simpan','KaryawanController@simpan')->name('karyawan.simpan');
        Route::get('karyawan/{id}/edit','KaryawanController@edit')->name('karyawan.edit');
        Route::post('karyawan/update','KaryawanController@update')->name('karyawan.update');
        Route::delete('karyawan/delete/{id}','KaryawanController@hapus')->name('karyawan.hapus');

        Route::get('teknisi','TeknisiController@index')->name('teknisi');
        Route::post('teknisi/simpan','TeknisiController@simpan')->name('teknisi.simpan');
        Route::post('teknisi/export','TeknisiController@export')->name('teknisi.export');
        Route::get('teknisi/{id}/edit','TeknisiController@edit')->name('teknisi.edit');
        Route::post('teknisi/update','TeknisiController@update')->name('teknisi.update');
        Route::delete('teknisi/delete/{id}','TeknisiController@hapus')->name('teknisi.hapus');

        Route::get('user','AuthController@index')->name('user');
        Route::post('user/simpan','AuthController@simpan')->name('user.simpan');
        Route::get('user/{id}/edit','AuthController@edit')->name('user.edit');
        Route::post('user/update','AuthController@update')->name('user.update');
        Route::delete('user/delete/{id}','AuthController@hapus')->name('user.hapus');

        Route::get('departemen','DepartemenController@index')->name('departemen');
        Route::post('departemen/simpan','DepartemenController@simpan')->name('departemen.simpan');
        Route::get('departemen/{id}/edit','DepartemenController@edit')->name('departemen.edit');
        Route::post('departemen/update','DepartemenController@update')->name('departemen.update');
        Route::delete('departemen/delete/{id}','DepartemenController@hapus')->name('departemen.hapus');

        Route::get('branch','BranchController@index')->name('branch');
        Route::post('branch/simpan','BranchController@simpan')->name('branch.simpan');
        Route::get('branch/{id}/edit','BranchController@edit')->name('branch.edit');
        Route::post('branch/update','BranchController@update')->name('branch.update');
        Route::delete('branch/delete/{id}','BranchController@hapus')->name('branch.hapus');

        Route::get('jabatan','JabatanController@index')->name('jabatan');
        Route::post('jabatan/simpan','JabatanController@simpan')->name('jabatan.simpan');
        Route::get('jabatan/{id}/edit','JabatanController@edit')->name('jabatan.edit');
        Route::post('jabatan/update','JabatanController@update')->name('jabatan.update');
        Route::delete('jabatan/delete/{id}','JabatanController@hapus')->name('jabatan.hapus');

        Route::get('crud','TestController@index')->name('crudindex');
        Route::get('crud/tambah','TestController@tambah')->name('tambah');
        Route::get('crud/caribarang','TestController@cari')->name('caribarang');
        Route::post('crud/simpan','TestController@simpan')->name('simpan');
        Route::delete('crud/delete/{id}','TestController@hapus')->name('hapus');
        Route::get('crud/{id}/edit','TestController@edit')->name('edit');
        Route::post('crud','TestController@update')->name('update');  
        
        Route::get('kondisi','KondisiController@index')->name('kondisi');  
        Route::post('kondisi/simpan','KondisiController@simpan')->name('simpan.kondisi');
        Route::get('kondisi/{id}/edit','KondisiController@edit')->name('edit.kondisi');
        Route::post('kondisi/update','KondisiController@update')->name('update.kondisi');  
        Route::delete('kondisi/delete/{id}','KondisiController@hapus')->name('hapus.kondisi');

        Route::get('kategori','KategoriController@index')->name('kategori');  
        Route::post('kategori/simpan','KategoriController@simpan')->name('simpan.kategori');
        Route::get('kategori/{id}/edit','KategoriController@edit')->name('edit.kategori');
        Route::post('kategori/update','KategoriController@update')->name('update.kategori');  
        Route::delete('kategori/delete/{id}','KategoriController@hapus')->name('hapus.kategori');

        Route::get('subkategori','SubKategoriController@index')->name('subkategori');
        Route::post('subkategori/simpan','SubKategoriController@simpan')->name('simpan.subkategori');
        Route::get('subkategori/{id}/edit','SubKategoriController@edit')->name('edit.subkategori');
        Route::post('subkategori/update','SubKategoriController@update')->name('update.subkategori');  
        Route::delete('subkategori/delete/{id}','SubKategoriController@hapus')->name('hapus.subkategori'); 
        
        Route::get('report-teknisi','TransactionController@reportTeknisi')->name('report.teknisi');
        Route::get('report-teknisi/{id}','TransactionController@reportTeknisiDetail')->name('report.teknisi.detail');
       
        
    });

    Route::group(['middleware' => 'can:isTeknisiNadmin'], function (){
        Route::get('ticket/assigmentTicket','TransactionController@assigmentTicket')->name('ticket.assigmentTicket');
        Route::get('detail-ticket-teknisi/{id}','TransactionController@detailticketteknisi')->name('detail.ticket.teknisi');
        Route::post('ticket/update/status/teknisi','TransactionController@updateStatus')->name('ticket.updateStatus.teknisi');
    });

    Route::group(['middleware' => 'can:isUserNadmin'], function (){
        Route::get('new-ticket','TransactionController@newticket')->name('newticket');
        Route::post('new-ticket/simpan','TransactionController@simpanTiketBaru')->name('newticket.simpan');
        Route::get('my-ticket','TransactionController@myticket')->name('my.ticket');
        Route::get('detail-ticket/{id}','TransactionController@detailticket')->name('detail.ticket');
        
        
        Route::get('list-ticket','TransactionController@listticket')->name('list.ticket');
        Route::get('approval-ticket','TransactionController@approvalticket')->name('approval.ticket');
        Route::get('ticket/{id}/kategori/teknisi','TransactionController@getSpesialis');
        Route::get('ticket/{id}/detail/modal','TransactionController@detailticketmodal');
        Route::post('ticket/update/status','TransactionController@updateStatus')->name('ticket.updateStatus');
        
        Route::post('rating/add','RatingController@insert')->name('add.rating');
        
    });


    Route::get('logout','AuthController@logout')->name('logout');
});

Route::get('/tes', function ()
{
    return view('email.newTicketAdmin');
});


Route::get('/home', 'HomeController@index')->name('home');
