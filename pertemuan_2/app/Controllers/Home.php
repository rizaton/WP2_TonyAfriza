<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $latihan1 = new Latihan1;
        return $latihan1->index();
    }
}
