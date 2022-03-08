<?php

namespace App\Controllers\admin;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\DevicesModel;


class User extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $deviceModel = new DevicesModel();
        
        $data = [
            'name' => session('name'),
            'users' => $userModel->asObject()->getUsers()->paginate(20),
            'allusers' => $userModel->asObject()->getUsers()->findall(),
            'pager' => $userModel->pager,
            'countUsers' => $userModel->count(),
            'deviceModel' => $deviceModel,
        ];

        echo view('admin/users/index', $data);
    }

    public function delete($id = null){
        echo "ds";
    }

    public function prueba(){
        echo "ds";
    }
}
