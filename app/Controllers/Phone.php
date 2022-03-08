<?php 

namespace App\Controllers;
use App\Models\PhonesModel;
use App\Models\DevicesModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Phone extends BaseController
{
    public function __construct(){

        helper(['url','form']);
    }
    
    public function index()
    {
        
        $phoneModel = new PhonesModel();
        $deviceModel = new DevicesModel();
        $devices = $deviceModel->asObject()->getDevices();

        $data = [
            'name' => session()->get('name'),
            'phones' => $phoneModel->asObject()->getPhones(),
            'devices' => $devices,
        ];

        $this->_loadDefaultView('Mis telefonos', $data, 'index');
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

    public function create()
    {
        $validation = $this->validate('phone');

        if(!$validation){
            return redirect()->back()->withInput();
        }

        $number = $this->request->getPost('phone');

        $values = [
            'phone_number' => $number,
            'phone_user_id' => session()->get('loggedUser'),
        ];

        $phoneModel = new PhonesModel();
        $query = $phoneModel->insert($values);

        if(!$query){
            return redirect()->to('phone/')->with('fail', 'Algo salió mal. Intente nuevamente');
        }

        return redirect()->to('phone/')->with('success', ' Teléfono agregado!');
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

        $this->_loadDefaultView('Telefonos', $data, 'edit');
    }

    public function update($id = null)
    {
        $phoneModel = new PhonesModel();
        $validation = $this->validate('phone');
        $old_phone =  $phoneModel->asObject()->find($id)->phone_number;
        $new_phone = $this->request->getPost('phone');
        
        if($old_phone != $new_phone){
            if(!$validation){
                return redirect()->back()->withInput();
            }
        }else{
            
            return redirect()->to('/phone')->with('fail', ' No hubo cambios');
        }

        $values = [
            'phone_number' => $new_phone,
        ];
        $query = $phoneModel->update($id, $values);

        if(! $query){
            return redirect()->back()->with('fail', 'Algo salió mal. Intente nuevamente');
        }

        return redirect()->to('phone/')->with('success', ' Teléfono actualizado!');

    }

    public function delete($id = null)
    {
        $phoneModel = new PhonesModel();
        if ($phoneModel->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        $phoneModel->delete($id);
        return redirect()->to('/phone')->with('fail', ' Teléfono eliminado!');

    }

    private function _loadDefaultView($title,$data,$view){

        $dataHeader = [
            'title' => $title
        ];
        
        echo view("users/phone/$view", $data);
    }

}

?>