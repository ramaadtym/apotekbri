<?php
	class Transaksi extends CI_model{

		public function get_obat(){
		    $this->db->distinct();
			$this->db->join('kategori', 'obat.ID_kategori = kategori.ID_kategori');
			return $this->db->get('obat')->result();
		}
        public function get_obat_general(){
            $this->db->select('Nama_obat as ob,ID_Obat');
            $this->db->join('kategori', 'obat.ID_kategori = kategori.ID_kategori');
            return $this->db->get('obat')->row()->ob;
        }

		public function get_trx(){
			$this->db->join('obat', 'ID_Obat = idObat');
			return $this->db->get('penjualan')->result();
		}
		public function get_kategori($id){
			$this->db->where("ID_obat",intval($id));
			$this->db->join('kategori','obat.ID_kategori = kategori.ID_kategori');
			$query = $this->db->get("obat");

			return $query->result_array();

		}
		public function get_kategori_general(){
		    $query = $this->db->get("kategori");
		    return $query->result();
        }
		public function insert_jual($input){
			//Get Last Record
            $this->db->select('Max(idFakturjual)+1 as id');
            $q = $this->db->get('penjualan')->row()->id;
			if($q == NULL){
			    $id = 0;
				$data = array(
					'idFakturjual' => $id+1,
					'tglPenjualan' => $input['tgljual'],
					'idObat' => $input['nama'],
					'namaKategori' => $input['ktgr'],
					'Qty' => $input['jum'],
					'harga' => $input['hrg'],
					'total_hrg' => $input['tot'],
					'ID_apoteker' => $input['apoteker'],
				);
				$this->db->insert('penjualan', $data);

			}
			else{
				$data = array(
					'idFakturjual' => $q,
					'tglPenjualan' => $input['tgljual'],
					'idObat' => $input['nama'],
					'namaKategori' => $input['ktgr'],
					'Qty' => $input['jum'],
					'harga' => $input['hrg'],
					'total_hrg' => $input['tot'],
					'ID_apoteker' => $input['apoteker'],
				);

				$this->db->insert('penjualan', $data);

			}

		}

	}
?>