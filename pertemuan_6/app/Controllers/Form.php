<?php

namespace App\Controllers;

use App\Models\StudentsModel;

class Form extends BaseController
{
    protected $studentsModel;
    public function __construct()
    {
        $this->studentsModel = new StudentsModel();
        $this->studentsModel->protect(false);
    }
    private $formValidatation = [
        'kode' => [
            'label' => 'Kode Siswa',
            'rules' => 'required|min_length[1]|max_length[5]',
            'errors' => [
                'required' => 'Kode siswa harus diisi',
                'min_length' => 'Kode siswa tidak boleh kurang dari 1 karakter',
                'max_length' => 'Kode siswa tidak boleh lebih dari 5 karakter',
            ]
        ],
        'nis' => [
            'label' => 'NIS',
            'rules' => 'required|min_length[5]|max_length[5]',
            'errors' => [
                'required' => 'NIS harus diisi',
                'min_length' => 'NIS tidak boleh kurang dari 5 karakter',
                'max_length' => 'NIS tidak boleh lebih dari 5 karakter',
            ]
        ],
        'nama' => [
            'label' => 'Nama Siswa',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama siswa harus diisi',
                'min_length' => 'Nama siswa tidak boleh kurang dari 3 karakter',
            ]
        ],
        'kelas' => [
            'label' => 'Kelas Siswa',
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => 'Kelas siswa harus diisi',
                'max_length' => 'Kelas siswa tidak boleh lebih dari 10 karakter'
            ]
        ],
        'tanggal_lahir' => [
            'label' => 'Tanggal Lahir',
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal lahir harus diisi',
            ]
        ],
        'tempat_lahir' => [
            'label' => 'Tempat Lahir',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => 'Tempat lahir harus diisi',
                'max_length' => 'Tempat lahir tidak boleh lebih dari 50 karakter'
            ]
        ],
        'alamat' => [
            'label' => 'Alamat',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => 'Alamat harus diisi',
                'max_length' => 'Alamat tidak boleh lebih dari 255 karakter'
            ]
        ],
        'jenis_kelamin' => [
            'label' => 'Jenis Kelamin',
            'rules' => 'required',
            'errors' => [
                'required' => 'Jenis kelamin harus dipilih'
            ]
        ],
        'agama' => [
            'label' => 'Agama',
            'rules' => 'required',
            'errors' => [
                'required' => 'Agama harus dipilih'
            ]
        ]
    ];
    private function data($messages = null): array
    {
        return [
            'message' => $messages,
            'students' => $this->studentsModel->getStudents()
        ];
    }
    public function index()
    {
        return view('input_form', $this->data());
    }
    public function create()
    {
        if (!$this->validate($this->formValidatation)) {
            return view('input_form', $this->data(validation_list_errors()));
        } else {
            $this->studentsModel->createStudent([
                'studentid' => $this->request->getPost('kode'),
                'nis' => $this->request->getPost('nis'),
                'nama' => $this->request->getPost('nama'),
                'kelas' => $this->request->getPost('kelas'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'agama' => $this->request->getPost('agama')
            ]);
            return redirect()->to(base_url());
        }
    }
    public function update()
    {
        if (!$this->validate($this->formValidatation)) {
            return view('input_form', $this->data(validation_list_errors()));
        } else {
            $this->studentsModel->updateStudent([
                'studentid' => $this->request->getPost('kode'),
                'nis' => $this->request->getPost('nis'),
                'nama' => $this->request->getPost('nama'),
                'kelas' => $this->request->getPost('kelas'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'agama' => $this->request->getPost('agama')
            ], [
                'studentid' => $this->request->getPost('kode'),
            ]);
            // return view('input_form', $this->data('berhasil'));
            return redirect()->to(base_url());
        }
    }
    public function delete()
    {
        if (!$this->validate([
            'kode' => [
                'label' => 'Kode Siswa',
                'rules' => 'required|max_length[5]',
                'errors' => [
                    'required' => 'Kode siswa harus diisi',
                    'max_length' => 'Kode siswa tidak boleh lebih dari 5 karakter',
                ]
            ],
        ])) {
            return view('input_form', $this->data(validation_list_errors()));
        } else {
            $this->studentsModel->delete([
                'studentid' => $this->request->getPost('kode'),
            ]);
            return redirect()->to(base_url());
        }
    }
}
