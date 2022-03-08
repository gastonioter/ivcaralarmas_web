<?php

namespace App\Controllers;

use App\Models\PhonesModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Phoneadmin extends BaseController
{
    public function __construct()
    {

        helper(['url', 'form']);
    }



    public function edit($id = null)
    {
        $phoneModel = new PhonesModel();
        if ($phoneModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation =  \Config\Services::validation();
        $data = [
            'name' => session()->get('name'),
            'phone' => $phoneModel->asObject()->find($id),
            'validation' => $validation,
        ];

        $this->_loadDefaultView('Dispositivos', $data, 'edit');
    }

    public function update($id = null)
    {
        $phoneModel = new PhonesModel();
        $validation = $this->validate('phone');
        $old_phone =  $phoneModel->asObject()->find($id)->phone_number;
        $new_phone = $this->request->getPost('phone');

        if ($old_phone != $new_phone) {
            if (!$validation) {
                return redirect()->back()->withInput();
            }
        } else {

            return redirect()->to('/phone')->with('fail', ' No hubo cambios');
        }

        $values = [
            'phone_number' => $new_phone,
        ];
        $query = $phoneModel->update($id, $values);

        if (!$query) {
            return redirect()->back()->with('fail', 'Algo salió mal. Intente nuevamente');
        }

        return redirect()->to('/useradmin')->with('success', ' Teléfono actualizado!');
    }


    public function delete($id = null)
    {

        $phoneModel = new PhonesModel();
        if ($phoneModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        // $phoneModel->delete($id);
        // return redirect()->to('/useradmin')->with('fail', ' Usuario eliminado!');
    }

    private function _loadDefaultView($title, $data, $view)
    {

        $dataHeader = [
            'title' => $title
        ];

        echo view("admin/users/phone/$view", $data);
    }
}
