<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends APT_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi');
	}

	public function index()
	{
		if (!$this->session->userdata("masuk")){
            redirect("/");
        }
        $data['obat'] = $this->Transaksi->get_obat();
        $data['trx'] = $this->Transaksi->get_trx();
		$this->laman('laman/v_dashboard',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/','refresh');
	}

	
}
