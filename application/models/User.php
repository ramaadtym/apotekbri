<?php
	class User extends CI_model{
		public function verify($uname,$pass){
			$this->db->where('induk',$uname);
			$query = $this->db->get('apoteker');

			if($query->num_rows() > 0):
				// var_dump($query);
				// echo "Ada";
				$user = $query->result()[0];
				if($this->bcrypt->check_password($pass,$user->pass)):
					return $user;
				endif;
			endif;

		}


	}

?>