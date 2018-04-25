<?php
	class Register extends CI_model{
		public function awal(){
			$uname = "1301150034";
			$pass = '1202962432';
			$hash = $this->bcrypt->hash_password($pass);
			$dt = array(
				'ID_apoteker' => 1,
				'Nama_apoteker' => "Rama",
				'induk' => $uname,
				'pass' => $hash,
				'Alamat' => "Jakarta"

			);
			$this->db->insert('apoteker',$dt);
		}
	}
?>