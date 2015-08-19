<?php

class m_home extends CI_Model {

    function getDataKasusPenyakit($penyakit, $tahun) {        
        $this->db->select('provinsi.KODE_PETA, jumlah_kasus_penyakit.JUMLAH');
        $this->db->from('jumlah_kasus_penyakit');
        $this->db->join("provinsi", "provinsi.ID_PROVINSI = jumlah_kasus_penyakit.ID_PROVINSI");
        $this->db->where("jumlah_kasus_penyakit.ID_PENYAKIT", $penyakit);
        $this->db->where("jumlah_kasus_penyakit.TAHUN", $tahun);
        $data = $this->db->get();
        return $data;
    }

    function getDataGrafik($penyakit, $tahun) {
        $this->db->select('provinsi.NAMA, jumlah_kasus_penyakit.JUMLAH');
        $this->db->from('jumlah_kasus_penyakit');
        $this->db->join("provinsi", "provinsi.ID_PROVINSI = jumlah_kasus_penyakit.ID_PROVINSI");
        $this->db->where("jumlah_kasus_penyakit.ID_PENYAKIT", $penyakit);
        $this->db->where("jumlah_kasus_penyakit.TAHUN", $tahun);
        $data = $this->db->get();
        return $data;
    }

}
