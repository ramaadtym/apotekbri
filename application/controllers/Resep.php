<?php

class Resep extends APT_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Resep_m');
        $this->load->model('Register');
    }
	public function index()
	{
		if (!$this->session->userdata("masuk")){
            redirect("/");
        }

        $data['resep'] = $this->Resep_m->getResep();
		$this->laman('laman/v_resep',$data);
	}
}