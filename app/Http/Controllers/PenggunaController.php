<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{ 
    function prosesLogin() {
        // ambil data dari database
        $todo = DB::table('tb_todo')->first();
        // mengembalikan view index dengan data dari database $todo
        return view('pengguna.index', 
        ['dataTugas' => $todo 
    ]);
        
    }
}
