<?php

namespace App\Models;

use CodeIgniter\Model;

class PhonesModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'phones';
    protected $primaryKey       = 'phone_id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['phone_number', 'phone_user_id'];

    public function getPhones(){

        return $this->select('phone_id, phone_number')
        ->where('phone_user_id', session()->get('loggedUser'))
         ->findAll();
     }

     public function deletePhones(){

        return $this->where('phone_user_id', session()->get('loggedUser'))->delete();
     }



}
