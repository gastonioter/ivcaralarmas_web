<?php

namespace App\Models;

use CodeIgniter\Model;

class ActdesactModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'actdesacts';
    protected $primaryKey       = 'actdesact_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['actdesact_value','actdesact_device_serie','actdesact_date'];

    public function getHistory($serie = null){

        return $this->select('UNIX_TIMESTAMP(created_at), actdesact_value')
        ->where('actdesact_device_serie', $serie)
        ->findAll(100);

    }

}
