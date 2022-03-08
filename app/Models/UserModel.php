<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['user_name', 'user_email', 'user_password', 'created_at', 'last_login'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getData()
    {

        return $this->select('last_login, created_at')->where('user_email', session('email'))->first();
    }

    public function count()
    {

        return $this->select('user_id,')
            ->countAllResults();
    }

    public function getUsers()
    {
        return $this->select('user_id, user_name, user_email')
            ->orderBy('users.created_at', 'DESC');
    }

    public function getPhonesUser($user_id)
    {
        return $this->select('user_id, phone_number,phone_id')
            ->join('phones', 'users.user_id = phones.phone_user_id')
            ->where('users.user_id', $user_id)
            ->orderBy('users.created_at', 'DESC');
    }
}
