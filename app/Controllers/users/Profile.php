<?php

namespace App\Controllers\users;
use App\Models\UserModel;
use App\Models\PhonesModel;
use App\Models\DevicesModel;
use App\Controllers\BaseController;

class Profile extends BaseController
{

    public function __construct(){

        helper(['url','form']);
    }

    public function index(){
        $phoneModel = new PhonesModel();
        $userModel = new UserModel();
        $deviceModel = new DevicesModel();
        
        $devices = $deviceModel->asObject()->getDevices();
        
        $data = [
            'name' => session()->get('name'),
            'email' => session()->get('email'),
            'phones' => $phoneModel->asObject()->getPhones(),
            'userData' => $userModel->asObject()->getData(),
            'devices' =>  $devices,
        ];

        $this->_loadDefaultView('Perfil', $data, 'index');
    }

    public function edit(){
        $validation =  \Config\Services::validation();
        

        $data = [
            'name' => session()->get('name'),
            'email' => session()->get('email'),
            'validation' => $validation,
        ];
        $this->_loadDefaultView('Actualizar datos', $data, 'edit');
        
    }


    public function update(){

        $validation = $this->validate('edit_user');
        $new_email = $this->request->getPost('email');
        $new_name = $this->request->getPost('name');
        $old_email = session('email');

        if ($new_email != $old_email){
            if(!$validation){
                return redirect()->back()->withInput();   
            }
        }

        $values = [
            'user_name' => $new_name,
            'user_email' => $new_email,
        ];

        $userModel = new UserModel();
        $userModel->update(session('loggedUser'), $values);
        return redirect()->route('app_profile')->with('success', ' Cuando te vuelvas a loguear se actualizará');

    }


    public function delete(){    
        $user = new UserModel();
        $phone = new PhonesModel();
        $device = new DevicesModel();

        $user->delete(session('loggedUser'));
        $phone->deletePhones();
        $device->deleteDevices();
        
        session()->destroy();
        return redirect()->route('app_login')->with('fail', 'Tu cuenta se dio de baja');
        
    }

    private function _loadDefaultView($title,$data,$view){

        $dataHeader = [
            'title' => $title
        ];
        echo view("users/profile/$view", $data);
        
    }



}