<?php

namespace App\Controllers\users;
use App\Models\UserModel;
use App\Models\DevicesModel;
use App\Models\FlagsModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController{

    public function __construct(){

        helper(['url','form']);
    }

    public function index(){
        $devicesModel = new DevicesModel();
        $flagsModel = new FlagsModel();

        $data = [
            'id' => session()->get('loggedUser'),
            'name' => session()->get('name'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'devices' =>  $devicesModel->asObject()->getDevices(),
            'flags_model' => $flagsModel,

        ];  

        //var_dump($flagsModel->getActFlag(8140181));

        if ($devicesModel->getCount() == 0){
            return redirect()->to('/device')->with('fail', ' No tienes dispositivos');
        }
        $this->_loadDefaultView('Dashboard', $data, 'index');
    }


    private function _loadDefaultView($title,$data,$view){
        $dataHeader = [
            'title' => $title
        ];  
        echo view("users/dashboard/$view", $data);
    }

}
?>