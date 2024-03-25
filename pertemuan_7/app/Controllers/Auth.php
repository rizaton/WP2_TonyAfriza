<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    private $session;
    private $userModels;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->userModels = new UserModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        if ($this->session->get('email')) {
            redirect()->to(base_url('user'));
        }
        $this->session->setFlashdata(
            'message',
            ''
        );
        $rules = [
            'email' => [
                'label' => 'Alamat Email',
                'rules' => 'required|trim|valid_email',
                'errors' => [
                    'required' => 'Email Harus diisi!!',
                    'valid_email' => 'Email Tidak Benar!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Email Harus diisi!!',
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            $data = [
                'judul' => 'login',
                'user' => '',
            ];
            echo view('templates/aute_header', $data);
            echo view('login');
            echo view('templates/aute_footer');
        } else {
            return $this->login();
        }
    }
    private function login()
    {
        $email = htmlspecialchars(
            $this->request->getPost('email', true) ?? ''
        );
        $password = $this->request->getPost('password') ?? '';
        $user = $this->userModels->whereData(['email' => $email]) ?? [];
        if (!$user) {
            $this->session->setFlashdata(
                'message',
                '<div class="alert alert-danger alert-message" role="alert">
                    Email tidak terdaftar!!
                </div>'
            );
            return redirect()->to(base_url('autentifikasi'));
        }
        if ($user['is_active'] != 1) {
            $this->session->setFlashdata(
                'message',
                '<div class="alert alert-danger alert-message" role="alert">
                User belum diaktifasi!!
                </div>'
            );
            return redirect()->to(base_url('autentifikasi'));
        }
        if (!password_verify($password, $user['password'])) {
            $this->session->setFlashdata(
                'message',
                '<div class="alert alert-danger alert-message" role="alert">
                    Password salah!!
                </div>'
            );
            return redirect()->to(base_url('autentifikasi'));
        }
        if ($user['role_id'] == 1) {
            return redirect()->to(base_url('admin'));
        } else {
            if ($user['image'] == 'default.jpg') {
                $this->session->setFlashdata(
                    'message',
                    '<div class="alert alert-info alert-message" role="alert">
                        Silahkan Ubah Profile Anda untuk Ubah Photo Profil
                    </div>'
                );
            }
            return redirect()->to(base_url('user'));
        }
    }
}
