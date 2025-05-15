<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // ini route default ( bawaan )
    return view('welcome');
});

// route tanpa controller
// Route::get('/pengguna/login', function () { 
    // $dataTodo = DB::table('tb_todo')
    //             ->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
    //             ->join('tb_pegawai as tb_pegawai_2', 'tb_todo.tugas_untuk', '=', 'tb_pegawai_2.id')
    //             ->select(
    //                 'tb_todo.id',
    //                 'tb_todo.tugas',
    //                 'tb_todo.waktu_mulai',
    //                 'tb_todo.waktu_selesai',
    //                 'tb_pegawai.nama as pemberi_tugas',
    //                 'tb_pegawai_2.nama as penerima_tugas',
    //                 'tb_todo.keterangan'
    //             )
    //             ->get();
    // return view('pengguna.index', ['dataTodo' => $dataTodo]);
// }); 

// route menggunakan controller
Route::get('/pengguna/login', [TodoController::class, 'tampilkanTodo']);

// untuk menampilkan detail tugas ( satu per satu )
Route::get('/tugas/detailTugas/{id}', [TodoController::class, 'detailTugas']);

//untuk menghapus data ( tugas )
Route::get('/tugas/hapusTugas/{id}', [TodoController::class, 'hapusTodo']);

Route::get('/lihatData', [TodoController::class, 'tampilkanTodo']);

//menyimpan atau membuat todo baru --> next pertemuan
Route::get('/tugas/tambahTugas', [TodoController::class, 'tambahTugas']);

// simpan ke database
Route::post('/tugas/simpanTugasBaru', [TodoController::class, 'simpanTugas']);

//ubah tugas
Route::get('tugas/perbaruiTugas/{id}', [TodoController::class, 'ubahTugas']);

//simpan ke database
Route::post('/tugas/simpanPembaruanTugas/{id}', [TodoController::class, 'simpanPembaruan']);

