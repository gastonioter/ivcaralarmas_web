<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesDevModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'category_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['category_name', 'category_id'];

}
