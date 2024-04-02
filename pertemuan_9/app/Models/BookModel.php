<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';

    // Manajemen Buku
    public function getBook()
    {
        return $this->findAll();
    }

    public function whereBook($where)
    {
        return $this->where($where)->findAll();
    }

    public function insertBook($data = null)
    {
        return $this->insert($data);
    }

    public function updateBook($data = null, $where = null)
    {
        return $this->update($where, $data);
    }

    public function deleteBook($where = null)
    {
        return $this->delete($where);
    }

    public function total($field, $where = null)
    {
        $this->selectSum($field);
        if (!empty($where) && count($where) > 0) {
            $this->where($where);
        }
        return $this->get()->getRow($field);
    }

    // Manajemen kategori
    public function getCategory()
    {
        return $this->db->table('kategori')->get()->getResult();
    }

    public function whereCategory($where)
    {
        return $this->db->table('kategori')->getWhere($where)->getResult();
    }

    public function insertCategory($data = null)
    {
        return $this->db->table('kategori')->insert($data);
    }

    public function deleteCategory($where = null)
    {
        return $this->db->table('kategori')->delete($where);
    }

    public function updateCategory($where = null, $data = null)
    {
        return $this->db->table('kategori')->update($data, $where);
    }

    // Join
    public function joinCategoryBook($where)
    {
        return $this->select('Book.id_kategori, kategori.kategori')
            ->join('kategori', 'kategori.id = Book.id_kategori')
            ->where($where)
            ->get()
            ->getResult();
    }
}
