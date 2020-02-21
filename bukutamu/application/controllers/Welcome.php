<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->model('pengajuan_m');
		
		$this->load->view('templates/head');
	}
}
