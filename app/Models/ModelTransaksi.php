<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    public function gettransaksi()
    {
        $builder=$this->db->query('
        SELECT idtransaksi,nama,tarif,meterblnini,meterblnlalu,tglbayar
        FROM tbl_transaksi2110016 JOIN tbl_pelanggan2110016 ON idpel=idpelanggan JOIN tbl_tarif2110016 ON idharga=idtarif');
        return $builder;
    }
    public function getpelanggan()
    {
        $builder=$this->db->table('tbl_pelanggan2110016');
        return $builder->get();
    }
    public function gettarif()
    {
        $builder=$this->db->table('tbl_tarif2110016');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_transaksi2110016')->insert($data);
    }
    public function getLaporanperpiode($tgla,$tglb)
    {
        $b = $this->db->query("SELECT idtransaksi,idpel,nama,tglbayar,meterblnini,meterblnlalu,tarif,meterblnini-meterblnlalu AS jumlahpemakaian,
        IF(klass='Ekonomi',0,10000) AS biayasampah,(tarif*(meterblnini-meterblnlalu))+IF(klass='Ekonomi',0,10000) AS totalbiaya 
        FROM tbl_transaksi2110016 JOIN tbl_pelanggan2110016 ON idpel=idpelanggan JOIN tbl_tarif2110016 ON idharga=idtarif 
        WHERE tglbayar BETWEEN '$tgla' AND '$tglb' ORDER BY idpel");
        return $b;
    }
}