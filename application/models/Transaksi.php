<?php
	class Transaksi extends CI_model{

		public function get_obat(){
			$this->db->join('kategori', 'obat.ID_kategori = kategori.ID_kategori');
			return $this->db->get('obat')->result();
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
		public function insert_jual($input){
			//Get Last Record
			$this->db->order_by('idFakturjual',"DESC");
			$q = $this->db->get('penjualan')->row();

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
				$id = $q->idFakturjual;
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
				$this->db->insert_id();
				$this->db->insert('penjualan', $data);
			}

		}
	}
?>