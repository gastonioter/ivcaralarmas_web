<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'doc'   => 'Ivcar Alarmas | Sistemas de seguridad orientados al IoT',
            'title' => 'Ivcar Alarmas',
        ];
        echo view('index', $data);
    }
}
