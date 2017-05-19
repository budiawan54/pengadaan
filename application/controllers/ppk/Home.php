<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->user_m->checkLogin('ppk');
	}

	public function index(){
		$data['konten'] = view('ppk/dashboard', array(), true);
		return view('templates/head', $data);
	}

}