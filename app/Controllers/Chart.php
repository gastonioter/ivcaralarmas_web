<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DevicesModel;
use App\Models\DisparosModel;
use App\Models\ActdesactModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Chart extends BaseController
{
    
    public function index_historic()
    {
        $deviceModel = new DevicesModel();
        $devices = $deviceModel->asObject()->getDevices();
        
        $data = [
            'name' => session()->get('name'),
            'devices' =>  $devices,
        ];

        if ($devices == null){
            return redirect()->to('/device')->with('fail', ' No tenés dispositivos!');
        }

        echo view("users/charts/historic/selector", $data);
    }

    public function index_realtime()
    {
        $deviceModel = new DevicesModel();
        $devices = $deviceModel->asObject()->getDevices();
        
        $data = [
            'name' => session()->get('name'),
            'devices' =>  $devices,
        ];

        if ($devices == null){
            return redirect()->to('/device')->with('fail', ' No tenés dispositivos!');
        }

        echo view("users/charts/realtime/selector", $data);
    }

    public function historic($serie = null){

        $deviceModel = new DevicesModel();
        $device = $deviceModel->asObject()->where('device_serie', $serie)->first();

        if($device == null){
            throw PageNotFoundException::forPageNotFound();
        }

        $actdesactModel = new ActdesactModel();
        $disparosModel = new DisparosModel();

        $data = [
            'name' => session()->get('name'),
            'actdesact_data' => $actdesactModel->getHistory($serie),
            'disparos_data' => $disparosModel->getHistory($serie),
            'device' => $device,
            'devices' => $deviceModel->asObject()->getDevices(),
        ];

        if($device->device_category_id == 1){
            $this->_loadDefaultView('', $data, 'alarma');
        }
        else{
            $this->_loadDefaultView('', $data, 'domotica');
        }


        

    }


    public function realtime($serie = null){

        $deviceModel = new DevicesModel();
        $device = $deviceModel->asObject()->where('device_serie', $serie)->first();

        if($device == null){
            throw PageNotFoundException::forPageNotFound();
        }

        $actdesactModel = new ActdesactModel();
        $disparosModel = new DisparosModel();

        $devices = $deviceModel->asObject()->getDevices();

        $data = [
            'name' => session()->get('name'),
            'actdesact_data' => $actdesactModel->getHistory($serie),
            'disparos_data' => $disparosModel->getHistory($serie),
            'device' => $device,
            'devices' =>  $devices,
        ];

        if($device->device_category_id == 1){
            echo view("users/charts/realtime/alarma", $data);
        }
        else{
            echo view("users/charts/realtime/domotica", $data);
        }

    }


    private function _loadDefaultView($title,$data,$view){
 
        echo view("users/charts/historic/$view", $data);
    }

}
