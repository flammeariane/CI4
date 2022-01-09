<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'birthdate', 'street', 'post_code', 'tel_number', 'creation_date', 'creation_delete', 'status', 'admin'];

    public function getAllUsers()
    {
        return $this->findAll();
    }
}
