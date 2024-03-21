<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'studentid';

    // Functions
    public function getStudents()
    {
        return $this->findAll();
    }

    public function whereStudent($where)
    {
        return $this->where($where)->findAll();
    }

    public function createStudent($dataStudent)
    {
        return $this->insert($dataStudent);
    }

    public function updateStudent($dataUpdate = null, $whereStudent = null)
    {
        return $this->whereIn('studentid', $whereStudent)
            ->set($dataUpdate)
            ->update();
    }

    public function deleteStudent($hapusData)
    {
        return $this->delete($hapusData);
    }
}
