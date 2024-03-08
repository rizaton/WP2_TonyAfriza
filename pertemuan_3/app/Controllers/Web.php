<?php

namespace App\Controllers;

// defined('BASEPATH') or exit('no direct script access allowed');

class Web extends BaseController
{
    protected $helpers = ['url'];
    // public function __construct()
    // {
    //     $this->index();
    // }
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
