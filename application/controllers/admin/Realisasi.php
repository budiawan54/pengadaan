<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('admin');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	public function index(){
		$data['konten'] = view('admin/daftar_realisasi','',true);

		return view('templates/head', $data);
	}
	
}