<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        $model = new ModelPelanggan();
        $data['pelanggan'] = $model->getpelanggan()->getResultArray();
        echo view('pelanggan/v_pelanggan', $data);
    }
    public function save()
    {
        $model = new ModelPelanggan();
        $data = array(
            'idpelanggan' => $this->request->getpost('kode'),
            'nama' => $this->request->getpost('nama'),
            'nohp' => $this->request->getpost('jab'),
            'alamat' => $this->request->getpost('al'),
            
        );
        
        $model->insertData($data);
        return redirect()->to('/pelanggan');
    }
}