<?php

namespace App\Controllers;

class Web extends BaseController
{
    protected $helpers = ['url'];
    public function index()
    {
        $data['judul'] = "Halaman Depan";
        echo view('v_header');
        echo view('v_index', $data);
        echo view('v_footer');
    }
    public function about()
    {
        $data['judul'] = "Halaman About";
        echo view('v_header');
        echo view('v_about', $data);
        echo view('v_footer');
    }
}
