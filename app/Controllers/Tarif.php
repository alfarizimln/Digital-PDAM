<?php

namespace App\Controllers;

use App\Models\ModelTarif;

class Tarif extends BaseController
{
    public function index()
    {
        $model = new ModelTarif();
        $data['tarif'] = $model->gettarif()->getResultArray();
        echo view('tarif/v_tarif', $data);
    }
    public function save()
    {
        $model = new ModelTarif();
        $data = array(
            'idtarif' => $this->request->getpost('kode'),
            'klass' => $this->request->getpost('nama'),
            'tarif' => $this->request->getpost('jab'),
            
        );
        
        $model->insertData($data);
        return redirect()->to('/tarif');
    }
}