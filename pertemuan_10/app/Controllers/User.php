<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $helpers = ['helper_lib', 'form'];
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
    public function members()
    {
        $data = [
            'judul' => 'Data Anggota',
            'user' => $this->userModels->whereUser(
                ['email' => $this->session->get('email')]
            )->first(),
            'anggota' => $this->userModels->getUserLimit(),
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('user/members', $data);
        echo view('templates/footer');
    }
    public function change_profile()
    {
        $data = [
            'judul' => 'Ubah Profil',
            'user' => $this->userModels->where(
                ['email' => $this->session->get('email')]
            )->first(),
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
            echo view('templates/header', $data);
            echo view('templates/sidebar', $data);
            echo view('templates/topbar', $data);
            echo view('user/ubah-profile', $data);
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
            $pathUpload = WRITEPATH . 'upload/profile/';
            $newFileName = $file->getRandomName();
            $file->move($pathUpload, $newFileName);
            $oldImage = $data['user']['iamge'];
            if ($oldImage && $oldImage != 'default.jpg') {
                unlink($pathUpload, $newFileName);
            }
            $this->userModels->set('image', 'profile/' . $newFileName);
            $this->userModels->set('name', $name);
            $this->userModels->set('email', $email);
            $this->userModels->update('user');
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
