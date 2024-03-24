<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    private $session;
    private $userModels;
    private $bookModels;
    public function __construct()
    {
        $this->userModels = new UserModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'user' => $this->userModels->whereUser(['email' => $this->session->get('email')])->first(),
            'anggota' => $this->userModels->getUserLimit()->result_array(),
            'buku' => $this->bookModels->getBook()->result_array(),
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('admin/index', $data);
        echo view('templates/footer');
    }
}
