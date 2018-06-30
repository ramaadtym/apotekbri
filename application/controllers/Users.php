<?php

class Users extends APT_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Register');
    }
	public function index()
	{
		if (!$this->session->userdata("masuk")){
            redirect("/");
        }

        $data['user'] = $this->User->getUsers();
		$this->laman('laman/v_pengguna',$data);
	}
    public function addUsers() {
        $data = array(
            'uname' => $this->input->post('user'),
            'apoteker' => $this->input->post('nama_apoteker'),
            'pwd' => $this->input->post('pass'),
            'alamat' => $this->input->post('almt'),
            'level' => $this->input->post('level')
         );
        $this->Register->registerUsers($data);
        redirect('Users','refresh');
    }
    public function editUsers() {
        if($this->input->post('level') == ""):
             $this->session->set_flashdata('del','Level harus dipilih dahulu!');
               redirect('Users','refresh');
        else:
        $data = array(
            'uname' => $this->input->post('user'),
            'apoteker' => $this->input->post('nama_apoteker'),
            'pwd' => $this->input->post('pass'),
            'alamat' => $this->input->post('almt'),
            'level' => $this->input->post('level'),
            'idAptk' => $this->input->post('idAptk')
         );
        $this->User->editUsers($data);
        $this->session->set_flashdata('add','Data berhasil diubah!');
        redirect('Users','refresh');
        endif;
        
    }
    public function delUsers() {
        $id = $this->input->post('id');
        $this->User->delUsers($id);
        $this->session->set_flashdata('add','Data berhasil dihapus');
        redirect('Users');

    }
}