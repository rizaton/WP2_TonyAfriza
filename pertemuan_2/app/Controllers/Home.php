<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $contoh1 = new Contoh1;
        $contoh2 = new Latihan1;

        return $contoh2->index();
    }
}
