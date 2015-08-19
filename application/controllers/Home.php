<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('m_home');
	}

	public function index() {
		$this->load->view('V_home');
	}

	function grafikKasusPenyakit() {
		$data_detail = $this->m_home->getDataKasusPenyakit("DBD", "2008");
		$result = array();
		foreach ($data_detail->result() as $row) {
			$data["hc-key"] = $row->KODE_PETA;
			$data["value"] = $row->JUMLAH;
			array_push($result, $data);
		}

		echo json_encode($result, JSON_NUMERIC_CHECK);
	}

	function grafik() {
		$data_detail = $this->m_home->getDataGrafik("DBD", "2008");
		$category = array();
		$category['name'] = 'Provinsi';
		$series1 = array();
		$series1['name'] = 'Jumlah Kasus';
		foreach ($data_detail->result() as $row) {
			$category['data'][] = $row->NAMA;
			$series1['data'][] = $row->JUMLAH;
		}

		$result = array();
		array_push($result, $category);
		array_push($result, $series1);
		echo json_encode($result, JSON_NUMERIC_CHECK);
	}
}
