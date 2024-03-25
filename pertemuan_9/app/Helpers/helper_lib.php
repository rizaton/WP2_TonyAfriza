<?php
function loginCheck()
{
    $session = \Config\Services::session();
    if (!$session->get('email')) {
        $session->setFlashdata(
            'message',
            '<div class="alert 
                alert-danger" role="alert">Akses ditolak. Anda belum login!! 
            </div>'
        );
        redirect()->to(base_url('auth'));
    } else {
        return $session->get('role_id');
    }
}
