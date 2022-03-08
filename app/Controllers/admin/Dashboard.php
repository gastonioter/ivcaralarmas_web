<?php

namespace App\Controllers\admin;
use App\Models\UserModel;
use App\Models\DevicesModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController{

    public function index(){

        $devicesModel = new DevicesModel();
        $userModel = new UserModel();

        $data = [
            'name' => session()->get('name'),
            'devicesCount' => $devicesModel->getAll(),
            'devicesConnected' => $devicesModel->getAllConectedDevices(),
            'devicesDomotica' => $devicesModel->getAllDomoticaDevices(),
            'devicesAlarma' => $devicesModel->getAllAlarmaDevices(),
            'users' => $userModel->count(),
        ];

        echo view("admin/dashboard/index", $data);
    }



}
