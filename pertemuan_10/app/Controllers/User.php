<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $helpers = ['helper_lib', 'form'];
    private $session;
    private $userModels;
    protected $testing = 'testing';
    public function __construct()
    {
        // loginCheck();
        $this->userModels = new UserModel();
        $this->session = \Config\Services::session();
        $this->session->setFlashdata('message', null);
        // dd(mktime(1, 5, 2, 2, 3, 2));
        // dd(FCPATH);
    }
    public function index()
    {
        // $data = [
        //     'judul' => 'Profil Saya',
        //     'user' => $this->userModels->where(['email' => $this->session()->getFlashData('email')])->getRowArray()
        // ];
        $data = [
            'title' => 'Profil Saya',
            'user' => [
                'image' => 'undraw_profile.svg',
                'name' => 'Ahmad Fikri Kusumah',
                'email' => 'fikal2kusumah@gmail.com',
                'input_date' => mktime(1, 1, 1, 3, 26, 2024),
            ],
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('user/index', $data);
        echo view('templates/footer');
    }
    public function members()
    {
        $data = [
            'title' => 'Data Anggota',
            'user' => $this->userModels->whereUser(
                ['email' => $this->session->get('email')]
            )->first(),
            'members' => $this->userModels->userGetLimit(),
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('user/members', $data);
        echo view('templates/footer');
    }
    public function changeProfile()
    {
        $data = [
            'title' => 'Ubah Profil',
            'members' => $this->userModels->where(
                ['email' => $this->session->get('email')]
            )->first(),
            'user' => [
                'image' => 'default.jpg',
                'name' => 'Ahmad Fikri Kusumah',
                'email' => 'fikal2kusumah@gmail.com',
                'input_date' => mktime(1, 1, 1, 3, 26, 2024),
            ],
        ];
        if (!$this->validate([
            'name' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Nama tidak Boleh Kosong',
                ]
            ],
        ])) {
            // echo view('templates/test', $data);
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('user/changeProfile', $data);
            echo view('templates/footer');
        } else {
            $name = $this->request->getVar('name', true);
            $email = $this->request->getVar('email', true);
            $file = $this->request->getFile('image');
            if ($file->isValid()) {
                $this->validate([
                    'image' => [
                        'uploaded[image]',
                        'max_size[image,3000]',
                        'mime_in[image,image/gif,image/jpg,image/jpeg,image/png]',
                        'max_dims[image,1024,1000]',
                    ]
                ]);
            }
            $pathUpload = FCPATH . 'assets/img/profile/';
            $newFileName = $file->getRandomName();
            $file->move($pathUpload, $newFileName);
            $oldImage = $data['user']['iamge'];
            if ($oldImage && $oldImage != 'default.jpg') {
                unlink($pathUpload, $newFileName);
            }
            // $this->userModels->set('image', 'profile/' . $newFileName);
            // $this->userModels->set('name', $name);
            // $this->userModels->set('email', $email);
            $this->userModels->update('user', [
                'image' => 'profile/' . $newFileName,
                'name' => $name,
                'email' => $email
            ]);
            // $this->userModels->update('user');
            $this->session->setFlashdata(
                'message',
                '<div  class="alert alert-success alert-message" role="alert">
                    Profil Berhasil diubah 
                </div>'
            );
            return redirect()->to(base_url('user'));
        }
    }
}
