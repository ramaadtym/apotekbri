<?php
	class User extends CI_model{
		public function verify($uname,$pass){
			$this->db->where('induk',$uname);
			$encrypt = md5($pass);
			$this->db->where('pass',$encrypt);
			$query = $this->db->get('apoteker');

			if($query->num_rows() > 0):
				// var_dump($query);
				// echo "Ada";
				$user = $query->result()[0];
				// if($this->bcrypt->check_password($pass,$user->pass)):
				if(md5($user->pass)):
					return $user;
				endif;
			endif;

		}
		public function getUsers() {
			$q = $this->db->get('apoteker')->result();
			return $q;
		}
		public function editUsers($data) {

		if($data['pwd'] == NULL): // kalo ga mau ganti pass
			$object = array(
				'Nama_apoteker'=> $data['apoteker'],
				'induk'=> $data['uname'],
				// 'pass'=> $this->bcrypt->hash_password($data['pwd']),
				'Alamat'=> $data['alamat'],
				'user_level'=>$data['level']
			);
		else: //kalo ganti pass
			$object = array(
				'Nama_apoteker'=> $data['apoteker'],
				'induk'=> $data['uname'],
				'pass'=> md5($data['pwd']),
				'Alamat'=> $data['alamat'],
				'user_level'=>$data['level']
			);	
		endif;
		$this->db->where('ID_apoteker', $data['idAptk']);
        $this->db->update('apoteker', $object);

	}
	public function delUsers($id){
		$this->db->where('ID_apoteker', $id);
        $this->db->delete('apoteker');
	}
}
?>