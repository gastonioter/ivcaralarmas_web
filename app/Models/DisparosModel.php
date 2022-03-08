<?php

namespace App\Models;

use CodeIgniter\Model;

class DisparosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'disparos';
    protected $primaryKey       = 'disparos_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['disparos_value','disparos_device_serie','disparos_date'];

    public function getHistory($serie = null){

        return $this->select('UNIX_TIMESTAMP(created_at), disparos_value')
        ->where('disparos_device_serie', $serie)
        ->findAll(100);

    }

}
