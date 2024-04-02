<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'book';
    protected $primaryKey       = 'idBook';
    public function getBook()
    {
        return $this->findAll();
    }
}
