<?php

namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table ='buku';
    protected $useTimestamp =true;
    protected $allowedFields =['judul', 'slug', 'kelas', 'penulis', 'penerbit', 'sampul'];

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function search($keyword)
    {
        return $this->table('buku')->like('judul', $keyword)->orLike('sampul', $keyword );
    }
}

