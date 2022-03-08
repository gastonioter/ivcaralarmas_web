<?php

namespace App\Models;

use CodeIgniter\Model;

class DevicesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'devices';
    protected $primaryKey       = 'device_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['device_serie', 'device_alias', 'device_type_id', 'device_user_id', 'device_category_id'];

    // asocio con la categoria del dispositivo
    public function getDevices()
    {

        return $this->select('categories.category_name, devices.device_id, devices.device_alias, devices.device_serie,devices.device_status')
            ->join('categories', 'categories.category_id = devices.device_category_id')
            ->where('device_user_id', session()->get('loggedUser'))
            ->findAll();
    }

    // asoscio con en nombre de usuario al que le pertenece
    public function getAllDevices()
    {

        return $this->select('devices.created_at, users.user_name, devices.device_id, devices.device_alias, devices.device_serie,devices.device_status')
            ->join('users', 'users.user_id = devices.device_user_id')
            ->orderBy('devices.created_at', 'DESC');
    }

    public function getAllConnDevices()
    {

        return $this->select('devices.created_at, users.user_name, devices.device_id, devices.device_alias, devices.device_serie,devices.device_status')
            ->join('users', 'users.user_id = devices.device_user_id')
            ->where('devices.device_status', 1)
            ->orderBy('devices.created_at', 'DESC');
    }

    public function getAllDesconnDevices()
    {

        return $this->select('devices.created_at, users.user_name, devices.device_id, devices.device_alias, devices.device_serie,devices.device_status')
            ->join('users', 'users.user_id = devices.device_user_id')
            ->where('devices.device_status', 0)
            ->orderBy('devices.created_at', 'DESC');
    }

    public function getConectedDevices()
    {

        return $this->select('device_id, device_status')
            ->where('device_user_id', session()->get('loggedUser'))
            ->where('device_status', 1)
            ->countAllResults();
    }

    public function getAllDomoticaDevices()
    {

        return $this->select('device_id')->where('device_category_id', 2)
            ->countAllResults();
    }

    public function getAllAlarmaDevices()
    {

        return $this->select('device_id')->where('device_category_id', 1)
            ->countAllResults();
    }

    public function getAllConectedDevices()
    {

        return $this->select('device_id, device_status')
            ->where('device_status', 1)
            ->countAllResults();
    }


    public function getCount()
    {

        return $this->select('device_alias, device_serie, device_status, device_id')
            ->where('device_user_id', session()->get('loggedUser'))
            ->countAllResults();
    }

    public function getCountAdmin($user_id)
    {

        return $this->select('device_alias, device_serie, device_status, device_id')
            ->where('device_user_id', $user_id)
            ->countAllResults();
    }

    public function getAll()
    {

        return $this->select('device_id')
            ->countAllResults();
    }

    public function deleteDevices()
    {
        return $this->where('device_user_id', session()->get('loggedUser'))->delete();
    }
}
