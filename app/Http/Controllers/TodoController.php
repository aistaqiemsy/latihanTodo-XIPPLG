<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller 
{
    function tampilkanTodo() { // membuat method, harus sama dengan yang di Controller
        $dataTodo = DB::table('tb_todo') // mengambil semua data dari tabel tb_todo
                    ->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
                    ->select(
                        'tb_todo.id',
                        'tb_todo.tugas',
                        'tb_pegawai.nama as pemberi_tugas',
                        'tb_todo.keterangan'
                    )
                    ->get();

        // tampilkan view index dalam folder pengguna, disertai data dari basis data
        return view('pengguna.index', ['dataTodos' => $dataTodo]); 
    }

    public function detailTugas($id) {
        // $tugas = DB::table('tb_todo')
        // ->where('id', $id)
        // ->first();
        // ->get();

        $tugas = DB::table('tb_todo as td')
                    ->join('tb_pegawai as pengirim', 'td.tugas_dari', '=', 'pengirim.id')
                    ->join('tb_pegawai as penerima', 'td.tugas_untuk', '=', 'penerima.id')
                    ->select(
                        'td.id',
                        'td.tugas',
                        'td.waktu_mulai',
                        'td.waktu_selesai',
                        'pengirim.nama as tugas_dari',
                        'penerima.nama as tugas_untuk',
                        'td.keterangan'
                    )
                    ->first();


        return view('pengguna.detailTugas', [
          'detailTodo' => $tugas  
        ]);
    }

    public function hapusTodo($id) {
        DB::table('tb_todo') // menghapus data berdasarkan id terpilih
        ->where('id', $id)
        ->delete();

        $dataTodos = DB::table('tb_todo') // mengambil semua data dari tabel tb_todo
                    ->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
                    ->select(
                        'tb_todo.id',
                        'tb_todo.tugas',
                        'tb_pegawai.nama as pemberi_tugas',
                        'tb_todo.keterangan'
                    )
                    ->get();

        return view('pengguna.index', [ 
            'dataTodos' => $dataTodos
        ]);
    }

    // method untuk menambah tugas
    public function tambahTugas() {
        $pemberiTugas = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'CEO')
                        ->get();
        $pelaksanaTugas = DB::table('tb_pegawai')
                        ->where('jabatan','!=', 'CEO')
                        ->get();
        return view('pengguna.tambahTugas', [
            'pemberiTugas' => $pemberiTugas,
            'pelaksanaTugas' => $pelaksanaTugas
        ]);
    }

    public function simpanTugas(Request $request) {
        DB::table('tb_todo') //simpan dalam database
        ->insert([
            'tugas' => $request->namaTugas,
            'waktu_mulai' => $request->mulaiTugas,
            'waktu_selesai' => $request->selesaiTugas,
            'tugas_dari'=> $request->tugasDari,
            'tugas_untuk'=> $request->tugasUntuk,
            'keterangan' => $request->keteranganTugas 
        ]);

        return "Penyimpanan berhasil!";
    }

    function ubahTugas($id) {
        $dataTugas = DB::table('tb_todo')
                    ->where('id', '=', $id)
                    ->first();
                    
                    return view('pengguna.ubahTugas', [
                        'a' => $dataTugas
                    ]);
    }

    function simpanPembaruan(Request $request, $id) {
        
        DB::table('tb_todo') // query builder - laravel
        ->where('id', '=', $id)
        ->update([
            'tugas' => $request->perbaruiTugas
        ]);

        $dataTodos = DB::table('tb_todo') // mengambil semua data dari tabel tb_todo
        ->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
        ->select(
            'tb_todo.id',
            'tb_todo.tugas',
            'tb_pegawai.nama as pemberi_tugas',
            'tb_todo.keterangan'
        )
        ->get();

        return view('pengguna.index', [
            'dataTodos' => $dataTodos
        ]);
    }
}
