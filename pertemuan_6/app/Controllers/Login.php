<?php

namespace App\Controllers;

use App\Models\StudentsModel;

class Login extends BaseController
{
    protected $studentsModel;
    protected $session;
    public function __construct()
    {
        $this->studentsModel = new StudentsModel();
        $this->studentsModel->protect(false);
        $this->session = \Config\Services::session();
    }
    private function dataModel($message = null)
    {
        $students = $this->studentsModel->getStudents();
        return [
            'message' => $message,
            'students' => $students
        ];
    }
    private function getData($dataFrom = null)
    {
        return 0;
    }
    private $validation = [
        'user' => [
            'label' => 'Username',
            'rules' => 'required|min_length[5]',
            'errors' => [
                'required' => 'Username harus diisi',
                'min_length' => 'Username terlalu pendek'
            ]
        ],
        'pass' => [
            'label' => 'Password',
            'rules' => 'required|min_length[5]',
            'errors' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password terlalu pendek'
            ]
        ],
    ];
    public function index($message = null)
    {
        return view('login_form', [
            'message' => $message
        ]);
    }
    public function login()
    {
        $this->session->setFlashdata('login', false);
        $getLogin = [
            'user' => $this->request->getPost('user'),
            'pass' => $this->request->getPost('pass'),
        ];
        if (!$this->validate($this->validation)) {
            return $this->index(validation_list_errors());
        } else {
            if ($getLogin['user'] == 'admin' && $getLogin['pass'] == 'admin') {
                $this->session->setFlashdata('login', true);
                return redirect()->to(base_url('/form'));
            } else {
                $this->session->setFlashdata('login', false);
                return $this->index("Username atau password salah");
            }
        }
    }
    public function form()
    {
        if (!$this->session->getFlashdata('login') || $this->session->getFlashdata('login') == null) {
            return redirect()->to(base_url());
        }
        $this->session->setFlashdata('login', true);
        return view('input_form', $this->dataModel());
    }
    public function save()
    {
        if (!$this->loginStatus) {
            return $this->index("Login terlebih dahulu");
        }
    }
}
