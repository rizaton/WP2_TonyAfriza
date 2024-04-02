<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';

    // Functions
    public function createUser($dataUser = null)
    {
        return $this->insert($dataUser);
    }

    public function whereUser($where = null)
    {
        return $this->where($where);
    }

    public function checkUserAccess($where = null)
    {
        return $this->db->table('access_menu')
            ->select('*')
            ->where($where)
            ->get();
    }
    public function userGetLimit()
    {
        return $this->findAll(10, 0);
    }
}
