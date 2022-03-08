<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Statistics extends BaseController
{

    public function index()
    {
        $data = [
            'name' => session('name'),
        ];

        $this->_loadDefaultView('Estadisticas', $data, 'index');
    }


    private function _loadDefaultView($title, $data, $view)
    {

        $dataHeader = [
            'title' => $title
        ];

        echo view("admin/statistics/$view", $data);
    }
}
