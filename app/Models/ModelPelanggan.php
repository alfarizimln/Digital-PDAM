<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    public function getpelanggan()
    {
        $builder=$this->db->table('tbl_pelanggan2110016');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_pelanggan2110016')->insert($data);
    }
}