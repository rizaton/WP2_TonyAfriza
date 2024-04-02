<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    private $session;
    private $userModels;
    private $bookModels;
    protected $helpers = ['helper_lib'];
    public function __construct()
    {
        $this->userModels = new UserModel();
        $this->bookModels = new BookModel();
        $this->session = \Config\Services::session();
        // loginCheck();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => [
                'image' => 'undraw_profile.svg',
                'name' => 'Ahmad Fikri Kusumah',
                'email' => 'fikal2kusumah@gmail.com',
                'input_date' => mktime(1, 1, 1, 3, 26, 2024),
            ],
            'members' => $this->userModels->userGetLimit(),
            'book' => $this->bookModels->getBook(),
        ];
        // $data = [
        //     'judul' => 'Dashboard',
        //     'user' => $this->userModels->whereUser(['email' => $this->session->get('email')])->first(),
        //     'anggota' => $this->userModels->getUserLimit(),
        //     'buku' => $this->bookModels->getBook(),
        // ];
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('admin/index', $data);
        echo view('templates/footer');
    }
}
