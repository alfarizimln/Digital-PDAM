<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelTarif extends Model
{
    public function gettarif()
    {
        $builder=$this->db->table('tbl_tarif2110016');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_tarif2110016')->insert($data);
    }
}