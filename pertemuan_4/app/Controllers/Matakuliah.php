<?php

namespace App\Controllers;

class Matakuliah extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        return view('view-form-matakuliah', ['validate' => validation_list_errors()]);
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
            return view('view-form-matakuliah', [
                'validate' => validation_list_errors(),
            ]);
        } else {
            $data = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),
                'sks' => $this->request->getPost('sks'),
            ];
            return view('view-data-matakuliah', $data);
        }
    }
}
