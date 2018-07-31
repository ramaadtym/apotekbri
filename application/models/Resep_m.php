<?php
	class Resep_m extends CI_model{

		public function getResep() {
			$this->db->join('pasien','resep.idPasien = pasien.idPasien');
			$this->db->join('dokter','resep.idDokter = dokter.idDokter');
			$this->db->join('obat','resep.idObat = obat.id_Obat');
			$q = $this->db->get('resep')->result();
			return $q;
		}
}
?>