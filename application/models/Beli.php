<?php
/**
 * Created by PhpStorm.
 * User: ramaadtym
 * Date: 10/05/2018
 * Time: 10:50
 */

class Beli extends CI_Model
{
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
//                'ID_Obat' => $r,
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
//                'ID_Obat' => $r,
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
    }

    public function get_beli(){
        $this->db->join('obat','idObat = ID_Obat');
        $this->db->join('kategori','idKategori = kategori.ID_Kategori');
        return $this->db->get('pembelian')->result();
    }
}