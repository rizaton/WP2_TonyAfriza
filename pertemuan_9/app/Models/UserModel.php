<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'idUser';

    // Functions
    public function createUser($dataUser)
    {
        return $this->insert($dataUser);
    }

    public function whereUser($where)
    {
        return $this->where($where);
    }

    public function checkUserAccess($where = null)
    {
        return $this->db->table('acess_menu')
            ->select('*')
            ->where($where)
            ->get();
    }
    public function getUserLimit()
    {
        return $this->db->table('user')
            ->select('*')
            ->limit(10, 0)
            ->get();
    }
}
