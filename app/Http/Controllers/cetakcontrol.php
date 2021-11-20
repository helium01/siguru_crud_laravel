<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class cetakcontrol extends Controller
{
    public function cetakguru(){
        $data=DB::table('data_guru')->get();
        $pdf = PDF::loadView('cetak.guru',['data'=>  $data]);
        return $pdf->download('guru.pdf');

    }
    public function cetakkecamatan(){
        $data=DB::table('data_kecamatan')->get();
        $pdf = PDF::loadView('cetak.kecamatan',['data'=>  $data]);
        return $pdf->download('kecamatan.pdf');

    }
}
