<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends APT_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register');
        $this->load->model('User');
    }

    public function index()
    {
        $this->laman('v_login');
    }

    public function login(){
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        $log = $this->User->verify($uname,$pass);

        if($uname !="" && $pass !=""):
            if($log != FALSE):
                //set user data
                $cttn = array(
                    'masuk' => TRUE,
                    'id' => $log->ID_apoteker,
                    'nama' => $log->Nama_apoteker,
                    'username' => $log->induk,
                    'level' => $log->user_level
                );
                $this->session->set_userdata($cttn);
                redirect('Dashboard','refresh');
            else:
                $this->session->set_flashdata('salah', 'Maaf, Username / Password Salah');
                redirect('/');
            endif;
        else:
            $this->session->set_flashdata('salah', 'Maaf, Username / Password harus di isi!');
            redirect('/');
        endif;

    }

    public function reg(){
        $this->Register->awal();
    }
}
