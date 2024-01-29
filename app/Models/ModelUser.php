<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelUser extends Model
{
    public function getUser()
    {
        $builder=$this->db->table('tbl_user2110016');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_user2110016')->insert($data);
    }
    public function deleteuser($id)
    {
        $query = $this->db->table('tbl_user2110016')->delete(array('iduser' => $id));
        return $query;
    }
    public function updateuser($data,$id)
    {
        $query = $this->db->table('tbl_user2110016')->update($data,array('iduser' => $id));
        return $query;
    }
    public function cek_login($username)
    {
        return $this->db->table('tbl_user2110016')->where(array('namauser'=>$username))->get()->getRowArray();
    }
}