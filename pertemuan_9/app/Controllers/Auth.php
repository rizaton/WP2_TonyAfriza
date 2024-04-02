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
            return redirect()->to(base_url('user'));
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
            return redirect()->to(base_url('auth'));
        }
        if ($user['is_active'] != 1) {
            $this->session->setFlashdata(
                'message',
                '<div class="alert alert-danger alert-message" role="alert">
                User belum diaktifasi!!
                </div>'
            );
            return redirect()->to(base_url('auth'));
        }
        if (!password_verify($password, $user['password'])) {
            $this->session->setFlashdata(
                'message',
                '<div class="alert alert-danger alert-message" role="alert">
                    Password salah!!
                </div>'
            );
            return redirect()->to(base_url('auth'));
        }
        if ($user['role_id'] == 1) {
            $this->session->set('user_id', $this->userModels->whereData(['email' => $email]));
            return redirect()->to(base_url('admin'));
        } else {
            if ($user['image'] == 'default.jpg') {
                $this->session->setFlashdata(
                    'message',
                    '<div class="alert alert-info alert-message" role="alert">
                        Silahkan Ubah Profile Anda untuk Ubah Photo Profil
                    </div>'
                );
                return redirect()->to(base_url('user'));
            }
        }
    }
    private function block()
    {
        return view('auth/block');
    }
    private function failed()
    {
        return view('auth/failed');
    }
    public function registration()
    {
        if ($this->session->get('email')) {
            return redirect()->to(base_url('user'));
        }
        $rules = [
            'nama' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Belum diisi!!',
                ]
            ],
            'email' => [
                'label' => 'Alamat Email',
                'rules' => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'valid_email' => 'Email Tidak Benar!!',
                    'required' => 'Email Belum diisi!!',
                    'is_unique' => 'Email Sudah Terdaftar!'
                ]
            ],
            'password1' => [
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]|matches[password2]',
                'errors' => [
                    'matches' => 'Password Tidak Sama!!',
                    'min_length' => 'Password Terlalu Pendek'
                ]
            ],
            'password2' => [
                'label' => 'Repeat Password',
                'rules' => 'required|trim|matches[password1]',
            ]
        ];
        if (!$this->validate($rules)) {
            $data = [
                'judul' => 'Registrasi Member',
            ];
            echo view('templates/aute_header', $data);
            echo view('auth/registration');
            echo view('templates/aute_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->request->getVar('nama')),
                'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),
                'image' => 'default.jpg',
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'input_date' => time()
            ];
            $this->userModels->insert($data);
            $this->session->setFlashdata(
                'message',
                '<div class="alert alert-success alert-message" role="alert">
                Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda
                </div>'
            );
            return redirect()->to(base_url('auth'));
        }
    }
}
