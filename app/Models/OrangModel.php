<?php

namespace App\Models;
use CodeIgniter\Model;

class OrangModel extends Model
{
    protected $table = 'orang';
    protected $useTimestamp = true;
    protected $allowedFields = ['nama', 'alamat'];

    public function getOrang($nama = false)
    {
        if ($nama == false) {
            return $this->findAll();
        }
        return $this->where(['nama' => $nama])->first();
    }

    public function search($keyword)
    {
        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword );
    }

}   
