<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('pengajuan_m');
		
	}

	public function insert(){

		$date = date('Y-m-d h:i:s');

		$ar['Username'] = 'admin';
		$ar['Nama_Lengkap'] = 'Ni Made Admin';
		$ar['Password'] = enc('admin');
		$ar['Slug_Jabatan'] = 'admin';
		$this->db->insert('user', $ar);
		
	}


}