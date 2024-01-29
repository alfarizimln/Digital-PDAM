<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;

class Transaksi extends BaseController
{
    public function index()
    {
       
        $model = new ModelTransaksi();
        $data['transaksi'] = $model->gettransaksi()->getResultArray();
        $data['data_pelanggan'] = $model->getpelanggan()->getResult();
        $data['data_tarif'] = $model->gettarif()->getResult();
        echo view('transaksi/v_transaksi', $data);
    }

    public function save()
    {
        $model = new ModelTransaksi();
        $data = array(
            'idpel' => $this->request->getpost('iddonatur'),
            'idharga' => $this->request->getpost('iddonatur1'),
            'meterblnini' => $this->request->getpost('mblnini'),
            'meterblnlalu' => $this->request->getpost('mblnll'),
            'tglbayar' => $this->request->getpost('tgl'),
        );
        $model->insertData($data);
        return redirect()->to('/transaksi');
    }
    public function cetaklaporanperperiode()
    {
       
        $model = new ModelTransaksi();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query =$model->getLaporanperpiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('transaksi/vcetaklaporanperperiode',$data);
    }
    public function laporanperperiode()
    {
        echo view('transaksi/vlaporankasmasuk');
        }
}