<?php
	class Register extends CI_model{
		public function registerUsers($data){
			$this->db->select('Max(ID_apoteker)+1 as id');
			$r = $this->db->get('apoteker')->row()->id;
			// $hash = $this->bcrypt->hash_password($pass);
			if($r == NULL):
				$id = 0;
				$object = array(
					'ID_apoteker' => $id+1,
					'Nama_apoteker'=> $data['apoteker'],
					'induk'=> $data['uname'],
					'pass'=> $this->bcrypt->hash_password($data['pwd']),
					'Alamat'=> $data['alamat'],
					'user_level'=>$data['level']
				);
				$this->db->insert('apoteker', $object);
			else:
				$object = array(
					'ID_apoteker' => $r,
					'Nama_apoteker'=> $data['apoteker'],
					'induk'=> $data['uname'],
					'pass'=> $this->bcrypt->hash_password($data['pwd']),
					'Alamat'=> $data['alamat'],
					'user_level'=>$data['level']
				);
				$this->db->insert('apoteker', $object);
			endif;

			
		}
	}
?>