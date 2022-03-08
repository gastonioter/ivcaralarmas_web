<?php

namespace App\Controllers;

use App\Models\DevicesModel;
use App\Models\CategoriesDevModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Deviceadmin extends BaseController
{
    public function __construct()
    {

        helper(['url', 'form']);
    }

    public function index()
    {
        $deviceModel = new DevicesModel();

        $data = [
            'name' => session('name'),
            'devices' => $deviceModel->asObject()->getAllDevices()->paginate(10),
            'pager' => $deviceModel->pager,
            'devicesConn' => $deviceModel->asObject()->getAllConnDevices()->findall(),
            'devicesDesconn' => $deviceModel->asObject()->getAllDesconnDevices()->findall(),
            'devicesCount' => $deviceModel->getAll(),
            'devicesConnected' => $deviceModel->getAllConectedDevices(),


        ];


        echo view("admin/devices/index", $data);
    }

    public function edit($id = null)
    {
        $deviceModel = new DevicesModel();
        if ($deviceModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $categoriesModel = new CategoriesDevModel();
        $validation =  \Config\Services::validation();

        $data = [
            'name' => session('name'),
            'device' => $deviceModel->asObject()->find($id),
            'categories' => $categoriesModel->asObject()->findAll(),
            'validation' => $validation,
        ];

        echo view("admin/devices/edit", $data);
    }

    public function update($id = null)
    {

        $deviceModel = new DevicesModel();
        $validation = $this->validate('devices');
        $old_serie =  $deviceModel->asObject()->find($id)->device_serie;
        $new_serie = $serie = $this->request->getPost('serie');

        if ($old_serie != $new_serie) {
            if (!$validation) {
                return redirect()->back()->withInput();
            }
        }
        $serie = $this->request->getPost('serie');
        $alias = $this->request->getPost('alias');
        $type_id = $this->request->getPost('type');
        $values = [
            'device_alias' => $alias,
            'device_serie' => $serie,
            'device_category_id' => $type_id,
        ];
        $query = $deviceModel->update($id, $values);

        if (!$query) {
            return redirect()->back()->with('fail', 'Algo salió mal. Intente nuevamente');
        }

        return redirect()->to('/deviceadmin')->with('success', ' Dispositivo actualizado!');
    }


    public function delete($id = null)
    {

        $deviceModel = new DevicesModel();
        if ($deviceModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        $deviceModel->delete($id);
        return redirect()->to('/deviceadmin')->with('fail', ' Dispositivo eliminado!');
    }
}
