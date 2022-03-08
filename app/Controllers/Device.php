<?php

namespace App\Controllers;
use App\Models\DevicesModel;
use App\Models\CategoriesDevModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Device extends BaseController
{
    public function __construct(){

        helper(['url','form']);
    }
    
    public function index()
    {
        
        $categories = new CategoriesDevModel();
        $devicesModel = new DevicesModel();

        $data = [
            'name' => session()->get('name'),
            'categories' => $categories->asObject()->findAll(),
            'devices' => $devicesModel->asObject()->getDevices(),
            'devicesCount' => $devicesModel->getCount(),
            'devicesConnected' => $devicesModel->getConectedDevices(),
        ];

        //var_dump($devicesModel->getDevices());
        $this->_loadDefaultView('Dispositivos', $data, 'index');
        
    }

    public function new(){

        $categories = new CategoriesDevModel();
        $deviceModel = new DevicesModel();
        $validation =  \Config\Services::validation();

        $data = [
            'name' => session()->get('name'),
            'device' => $deviceModel,
            'validation' => $validation,
            'categories' => $categories->asObject()->findAll(),
        ];
        $this->_loadDefaultView('Dispositivos', $data, 'new');
    }

    public function create(){
        
    $validation = $this->validate('devices');

        if(!$validation){
            return redirect()->back()->withInput();
        }

        $serie = $this->request->getPost('serie');
        $alias = $this->request->getPost('alias');
        $type_id = $this->request->getPost('type');
        $values = [
            'device_alias' => $alias,
            'device_serie' => $serie,
            'device_category_id' => $type_id,
            'device_user_id' => session()->get('loggedUser'),
        ];
        $deviceModel = new DevicesModel();
        //$flagsModel = new FlagsModel();

        $query = $deviceModel->insert($values);

        // TABA FLAGS
        
        //$values_flags = [
        //    'flag_device_serie' => $serie,
        //    'flag_act' => 0,
        //    'flag_desact' => 0,
        //    'flag_robo' => 0,
        //    'flag_res' => 0,
        //];

        //$flagsModel->insert($values_flags);
        
        if(! $query){
            return redirect()->back()->with('fail', 'Algo salió mal. Intente nuevamente');
        }

        return redirect()->to('/device')->with('success', ' Dispositivo agregado!');
    }

    public function edit($id = null){    
        $deviceModel = new DevicesModel();
        if ($deviceModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation =  \Config\Services::validation();
        $categories = new CategoriesDevModel();
        $data = [
            'name' => session()->get('name'),
            'device' => $deviceModel->asObject()->find($id),
            'validation' => $validation,
            'categories' => $categories->asObject()->findAll(),
        ];

        $this->_loadDefaultView('Dispositivos', $data, 'edit');
    }

    public function update($id = null){
        
        $deviceModel = new DevicesModel();
        $validation = $this->validate('devices');
        $old_serie =  $deviceModel->asObject()->find($id)->device_serie;
        $new_serie = $serie = $this->request->getPost('serie');
        
        if($old_serie != $new_serie){
            if(!$validation){
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
            'device_user_id' => session()->get('loggedUser'),
        ];
        $query = $deviceModel->update($id, $values);

        if(! $query){
            return redirect()->back()->with('fail', 'Algo salió mal. Intente nuevamente');
        }

        return redirect()->to('/device')->with('success', ' Dispositivo actualizado!');
    }

    public function delete($id = null){

        $deviceModel = new DevicesModel();
        //$flagsModel = new FlagsModel();
        if ($deviceModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        
        // elimino de la tabla flags
        $device = $deviceModel->asObject()->find($id);
        //$flagsModel->where('flag_device_serie', $device->device_serie)->delete();

        // elimino de la tabla devices
        $deviceModel->delete($id);
        return redirect()->to('/device')->with('fail', ' Dispositivo eliminado!');

    }


    private function _loadDefaultView($title,$data,$view){

        $dataHeader = [
            'title' => $title
        ];
        
        echo view("users/devices/$view", $data);
    }
}
