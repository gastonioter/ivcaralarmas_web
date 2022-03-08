<?php

namespace App\Controllers;

use App\Models\DevicesModel;
use App\Models\PhonesModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Useradmin extends BaseController
{
    public function __construct()
    {

        helper(['url', 'form']);
    }

    public function new()
    {

        $phoneModel = new PhonesModel();
        $validation =  \Config\Services::validation();

        $data = [
            'name' => session()->get('name'),
            'validation' => $validation,
            'phone' => $phoneModel,
            'validation' => $validation,
        ];
        $this->_loadDefaultView('Dispositivos', $data, 'new');
    }

    public function create($id = null)
    {

        echo "hola";
    }

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

    public function delete($id = null)
    {

        $userModel = new UserModel();
        if ($userModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        $userModel->delete($id);
        return redirect()->to('/useradmin')->with('fail', ' Usuario eliminado!');
    }

    public function listPhones($id = null)
    {
        $userModel = new UserModel();
        if ($userModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'name' => session('name'),
            'phones' => $userModel->asObject()->getPhonesUser($id)->findall(),
        ];

        echo view('admin/users/phone/index', $data);
    }

    private function _loadDefaultView($title, $data, $view)
    {

        $dataHeader = [
            'title' => $title
        ];

        echo view("admin/users/phone/$view", $data);
    }
}
