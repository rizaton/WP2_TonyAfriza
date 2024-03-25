<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $helpers = ['helper_lib'];
    private $session;
    private $userModels;
    public function __construct()
    {
        loginCheck();
        $this->userModels = new UserModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data = [
            'judul' => 'Profil Saya',
            'user' => $this->userModels->cekData(['email' => session()->get('email')])->row_array()
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('user/index', $data);
        echo view('templates/footer');
    }
}
