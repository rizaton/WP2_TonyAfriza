<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'userId';

    // Functions
    public function getUser()
    {
        return $this->findAll();
    }

    public function whereUser($where)
    {
        return $this->where($where)->first();
    }

    public function createUser($dataUser)
    {
        return $this->insert($dataUser);
    }

    public function updateUser($dataUpdate = null, $whereUser = null)
    {
        return $this->whereIn($this->primaryKey, $whereUser)
            ->set($dataUpdate)
            ->update();
    }

    public function deleteUser($hapusData)
    {
        return $this->delete($hapusData);
    }
}
