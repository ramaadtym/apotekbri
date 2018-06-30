<?php
/**
 * Created by PhpStorm.
 * User: ramaadtym
 * Date: 10/05/2018
 * Time: 10:50
 */

class Beli extends CI_Model
{
    /*
    cttn: bagian $r nya nanti di hapus yg ID_Obat
    public function insert_beli($input){
        $this->db->select('Max(idFakturbeli)+1 as id');
        $q = $this->db->get('pembelian')->row()->id;

        $this->db->select('Max(ID_Obat)+1 as id');
        $r = $this->db->get('obat')->row()->id;
        var_dump($r);

        $this->db->select('Nama_obat as obt');
        $this->db->where('ID_Obat',$input['nama']);
        $s = $this->db->get('obat')->row()->obt;

        if($q == NULL):
            $id = 0;
            $data = array(
                'idFakturbeli' => $id+1,
                'tglPembelian' => $input['tglbeli'],
                'idObat' => $input['nama'],
                'idKategori' => $input['ktgr'],
                'Qty' => $input['jum'],
                'hrg' => $input['hrg'],
                'total_hrg' => $input['tot'],
                'tglKadaluwarsa' => $input['kdl'],
                'ID_apoteker' => $input['apoteker']
            );
            $idobt = 0;

            $data2 = array(
               'ID_Obat' => $r,
                'Jenis_obat' => $input['jns'],
                'Nama_obat' => $s,
                'kadaluwarsa' => $input['kdl'],
                'hrg_obat' => $input['hrg'],
                'ID_kategori' => $input['ktgr'],
                'stok' => $input['jum']
            );
            $this->db->set($data2);
            $this->db->where('ID_Obat', $input['nama']);
            $this->db->update('obat');

            $this->db->insert('pembelian', $data);
        else:
            $data = array(
                'idFakturbeli' => $q,
                'tglPembelian' => $input['tglbeli'],
                'idObat' => $input['nama'],
                'idKategori' => $input['ktgr'],
                'Qty' => $input['jum'],
                'hrg' => $input['hrg'],
                'total_hrg' => $input['tot'],
                'tglKadaluwarsa' => $input['kdl'],
                'ID_apoteker' => $input['apoteker']
            );
            $data2 = array(
               'ID_Obat' => $r,
                'Jenis_obat' => $input['jns'],
                'Nama_obat' => $s,
                'kadaluwarsa' => $input['kdl'],
                'hrg_obat' => $input['hrg'],
                'ID_kategori' => $input['ktgr'],
                'stok' => $input['jum']
            );
            $this->db->set($data2);
            $this->db->where('ID_Obat', $input['nama']);
            $this->db->update('obat');

            $this->db->insert('pembelian', $data);
        endif;
    }*/ 

    public function insert_beli($input){
        $this->db->select('Max(idFakturbeli)+1 as id');
        $q = $this->db->get('pembelian')->row()->id;

        $this->db->select('Max(ID_Obat)+1 as id');
        $r = $this->db->get('obat')->row()->id;
        
        //cek nama obat udah ada atau belum

        $this->db->select('Nama_obat');
        $this->db->where('Nama_obat',ucfirst($input['nama']));
        $t = $this->db->get('obat');

        if($t->num_rows() > 0):
           $this->session->set_flashdata('add','Nama Obat sudah ada, silakan cek Daftar Obat');
           redirect('Dashboard');
        else:
            if($q == NULL):
                $id = 0;
                $data = array(
                    'idFakturbeli' => $id+1,
                    'tglPembelian' => $input['tglbeli'],
                    'idObat' => $r+1,
                    'idKategori' => $input['ktgr'],
                    'Qty' => $input['jum'],
                    'hrg' => $input['hrg'],
                    'total_hrg' => $input['tot'],
                    'tglKadaluwarsa' => $input['kdl'],
                    'ID_apoteker' => $input['apoteker']
                );
                $idobt = 0;

                $data2 =  array(
                    'ID_Obat' => $r+1,
                    'Nama_obat' => $input['nama'],
                    'kadaluwarsa' => $input['kdl'],
                    'hrg_obat' => $input['hrg'],
                    'Jenis_obat' => $input['jns'],
                    'ID_kategori' => $input['ktgr'],
                    'stok' => $input['jum']
                );

                $this->db->insert('obat', $data2);

                $this->db->insert('pembelian', $data);
            else:
                $data = array(
                    'idFakturbeli' => $q,
                    'tglPembelian' => $input['tglbeli'],
                    'idObat' =>$r+1,
                    'idKategori' => $input['ktgr'],
                    'Qty' => $input['jum'],
                    'hrg' => $input['hrg'],
                    'total_hrg' => $input['tot'],
                    'tglKadaluwarsa' => $input['kdl'],
                    'ID_apoteker' => $input['apoteker']
                );
               $data2 =  array(
                   'ID_Obat' => $r+1,
                   'Nama_obat' => $input['nama'],
                   'kadaluwarsa' => $input['kdl'],
                   'Jenis_obat' => $input['jns'],
                   'hrg_obat' => $input['hrg'],
                   'ID_kategori' => $input['ktgr'],
                   'stok' => $input['jum']
               );

                $this->db->insert('obat', $data2);
                $this->db->insert('pembelian', $data);
            endif;
        endif;
    }

    public function edit_beli($input){
        $data = array(
            'tglPembelian' => $input['tglbeli'],
            'idKategori' => $input['ktgr'],
            'Qty' => $input['jum'],
            'hrg' => $input['hrg'],
            'total_hrg' => $input['tot'],
            'tglKadaluwarsa' => $input['kdl'],
            'ID_apoteker' => $input['apoteker']
        );

        $dtobat = array(
           'Nama_obat' => $input['nama'],
           'kadaluwarsa' => $input['kdl'],
           'Jenis_obat' => $input['jns'],
           'hrg_obat' => $input['hrg'],
           'ID_kategori' => $input['ktgr'],
           'stok' => $input['jum']
        );

        $this->db->where('ID_Obat', $input['idObt']);
        $this->db->update('obat', $dtobat);

        $this->db->where('idFakturbeli', $input['faktur']);
        $this->db->update('pembelian', $data);
    }
    public function get_beli(){
        $this->db->join('obat','idObat = ID_Obat');
        $this->db->join('kategori','idKategori = kategori.ID_Kategori');
        return $this->db->get('pembelian')->result();
    }
}