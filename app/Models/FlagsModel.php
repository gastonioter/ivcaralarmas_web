<?php

namespace App\Models;

use CodeIgniter\Model;

class FlagsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'flags';
    protected $primaryKey       = 'flag_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['flag_id', 'flag_act', 'flag_desact','flag_robo','flag_res','flag_device_serie'];
    
}
