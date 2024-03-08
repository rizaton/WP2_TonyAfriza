<?php

namespace App\Controllers;


class Matakuliah extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('view-form-matakuliah');
    }
    public function cetak()
    {
        // $form_validation = \Config\Services::validation();
        $rules = [
            'kode' => [
                'label' => 'Kode Matakuliah',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Kode matakuliah Harus diisi',
                    'min_length' => 'Kode terlalu pendek'
                ]
            ],
            'nama' => [
                'label' => 'Nama Matakuliah',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama matakuliah Harus diisi',
                    'min_length' => 'Nama terlalu pendek'
                ]
            ],
        ];
        // $form_validation->setRules($rules);
        if (!$this->validate($rules)) {
            return view('view-form-matakuliah');
        } else {
            $data = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'sks' => $this->request->getPost('sks'),
            ];
            // return redirect()->to('view-data-matakuliah')->withInput();
            return view('view-data-matakuliah', $data);
        }
    }
}
