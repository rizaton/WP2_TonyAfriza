<?php

namespace App\Controllers;

use App\Models\Model_latihan1;

class Latihan1 extends BaseController
{
    public function index()
    {
        echo "Selamat Datang.. Selamat belajar Web Programming";
    }
    public function penjumlahan($n1, $n2)
    {
        $modelLatihan1 = new Model_latihan1();
        $data['nilai1'] = $n1;
        $data['nilai2'] = $n2;
        $data['hasil'] = $modelLatihan1->Jumlah($n1, $n2);
        return view('view-latihan', $data);
    }
}
