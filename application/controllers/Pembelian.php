<?php

    class Pembelian extends APT_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Beli');
        }

        public function addBeli(){
            $tglbeli = $this->input->post('tglbeli');
            $namaobt = $this->input->post('namaobt');
            $jnsobt = $this->input->post('jns');
            $ktobt = $this->input->post('kategori');
            $jum = $this->input->post('jum');
            $hrg = $this->input->post('hrg');
            $tot = $this->input->post('total');
            $kadal = $this->input->post('kadaluwarsa');
            $stok = $this->input->post('stok');

            $masukkan = array(
                'tglbeli' => $tglbeli,
                'nama' => $namaobt,
                'jns' => $jnsobt,
                'ktgr' => $ktobt,
                'jum' => $jum,
                'hrg' => $hrg,
                'tot' => $tot,
                'kdl' => $kadal,
                'stok' => $stok,
                'apoteker' => $this->session->userdata('id')
            );
            $this->Beli->insert_beli($masukkan);
            $this->session->set_flashdata('add','Data berhasil ditambah');
            redirect('Dashboard');
        }
    }
