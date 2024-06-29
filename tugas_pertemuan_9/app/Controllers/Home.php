<?php

namespace App\Controllers;


class Home extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        return view('view-form-Biodata');
    }
    public function cetak()
    {
        $rules = [
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIM Harus diisi',
                ],
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                ],
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus diisi',
                ],
            ],
            'hobby' => [
                'label' => 'Hobby',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hobby Harus dipilih',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus diisi',
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            return view('view-form-biodata');
        } else {
            $data = [
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'hobby' => $this->request->getPost('hobby'),
                'email' => $this->request->getPost('email'),
            ];
            // return redirect()->to('view-data-matakuliah')->withInput();
            return view('view-data-biodata', $data);
        }
    }
}
