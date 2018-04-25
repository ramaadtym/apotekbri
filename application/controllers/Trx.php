<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trx extends APT_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi');
	}
	public function kategori(){
		$id = $this->input->get('id');
		// echo $id;
		$get = $this->Transaksi->get_kategori($id);
		echo json_encode($get);

	}
	public function addJual(){
		$tgljual = $this->input->post('tgljual');
		$nama = $this->input->post('nama');
		$jns = $this->input->post('jenis');
		$ktgr = $this->input->post('ktgr');
		$jum = $this->input->post('jum');
		$hrg = $this->input->post('hrg');
		$tot = $this->input->post('total');
		$kdl = $this->input->post('kadaluwarsa');

		$input = array(
			'tgljual' => $tgljual,
			'nama' => $nama,
			'jns' => $jns,
			'ktgr' => $ktgr,
			'jum' => $jum,
			'hrg' => $hrg,
			'tot' => $tot,
			'kdl' => $kdl,
			'apoteker' => $this->session->userdata('id')
		);
		$this->Transaksi->insert_jual($input);
		redirect('Dashboard');
	}


}