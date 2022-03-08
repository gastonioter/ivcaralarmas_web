<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;
use App\Models\PhonesModel;


class Auth extends BaseController
{

    public function __construct()
    {

        helper(['url', 'form']);
    }

    public function login()
    {

        $validation_log =  \Config\Services::validation();
        $this->_loadDefaultView('Log In', ['validation' => $validation_log, 'user' => new UserModel()], 'login-2');
    }

    public function attemptLogin()
    {
        $validation = $this->validate('login');

        if (!$validation) {

            return redirect()->back()->withInput();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $userModel = new UserModel();
        $user = $userModel->asObject()->where('user_email', $email)->first();
        $check_password = Hash::check($password, $user->user_password);

        if (!$check_password) {
            return redirect()->back()->with('fail', 'La contraseña es incorrecta')->withInput();
        }

        $session = session();
        $data_session = [
            'loggedUser' => $user->user_id,
            'name' => $user->user_name,
            'email' => $user->user_email,
            'type' => $user->user_type,

        ];
        $session->set($data_session);

        if ($user->user_type == "regular") {
            return redirect()->route('app_user_dashboard');
        }

        return redirect()->route('app_admin_dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('app_login')->with('fail', 'Cerraste sesión');
    }

    public function register()
    {
        $validation_reg =  \Config\Services::validation();
        $this->_loadDefaultView('Registro ', ['validation' => $validation_reg, 'user' => new UserModel()], 'register');
    }

    public function attemptRegister()
    {
        $validation = $this->validate('register');

        if (!$validation) {

            return redirect()->back()->withInput();
        }

        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $phoneModel = new PhonesModel();

        // TABA USERS

        $values_users = [
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => Hash::make($password),
        ];

        $userModel->insert($values_users);
        $last_id = $userModel->insertID();

        // TABA PHONES

        $values_phones = [
            'phone_number' => $phone,
            'phone_user_id' => $last_id,
        ];

        $phoneModel->insert($values_phones);

        // DATA SESSION 

        $session = session();
        $data_session = [
            'loggedUser' => $last_id,
            'name' => $name,
            'email' => $email,
            'type' => 'regular',
        ];
        $session->set($data_session);

        $email = \Config\Services::email();

        $email->setFrom('iotting.castro10@gmail.com', 'Ivcar Alarmas');
        $email->setTo('gaston10.c@hotmail.com');
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        if ($email->send()) {
            return "success:200";
        } else {
            return "error";
        }


        return redirect()->to('/device')->with('success', ' Bienvenido! Agregá un dispositivo');
    }

    public function forgotPassword()
    {

        $validation =  \Config\Services::validation();
        $this->_loadDefaultView('Recuperar Contraseña', ['validation' => $validation], 'forgot_password');
    }

    public function attemptForgot()
    {

        $validation = $this->validate('login');

        if (!$validation) {
            return redirect()->back()->withInput();
        }
        return redirect()->back()->with('success', 'Perfecto! Revise su casilla de correo.');
    }


    private function _loadDefaultView($title, $data, $view)
    {

        $dataHeader = [
            'title' => $title
        ];

        echo view("auth/templates/header", $dataHeader);
        echo view("auth/$view", $data);
        echo view("auth/templates/footer");
    }
}
