<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends APT_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi');
		$this->load->model('Beli');
	}

	public function index()
	{
		if (!$this->session->userdata("masuk")){
            redirect("/");
        }
        $data['obat'] = $this->Transaksi->get_obat();
        $data['obats'] = $this->Transaksi->get_obat_general();
        $data['trx'] = $this->Transaksi->get_trx();
        $data['kt'] = $this->Transaksi->get_kategori_general();
        $data['beli'] = $this->Beli->get_beli();
		$this->laman('laman/v_dashboard',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/','refresh');
	}

	
}
