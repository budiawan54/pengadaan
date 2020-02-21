<?php

class Buku_tamu extends CI_Model{

	public function ambilKode(){



		$a = substr(md5(rand()), 5);
		return substr($a, 5);
	}
	
	public function getNoUrutHariIni($unit_tujuan){
		

		$user = $this->db->from('jabatan_sistem')->where('Slug_Jabatan', $unit_tujuan)->get()->row_array();

		$tanggal = date('Y-m-d');

		$buku = $this->db->from('buku_tamu')
					->where('unit_tujuan', $unit_tujuan)
					->where("(SUBSTRING(created_at, 1, 10) = '$tanggal')")
					->order_by('created_at', 'desc')
					->get()->row_array();

		if (sizeof($buku) != 0){

			$last = substr($buku['no_urut'], 1);

			$last = (int)$last + 1;

			return $user['kode'] . $last;
		}
		else{

			return $user['kode'] . 1;
		}
	}

	public function ambilJumlahAntrian($unit_tujuan){
		$tanggal = date('Y-m-d');

		$buku = $this->db->from('buku_tamu')
					->where('unit_tujuan', $unit_tujuan)
					->where("(SUBSTRING(created_at, 1, 10) = '$tanggal')")
					->where('status', 'mengantri')
					->get()->num_rows();
		return $buku;
		
	}

}