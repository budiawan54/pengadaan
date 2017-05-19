<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterskpd extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('admin');
		$this->load->model('user_m');
		$this->load->model('pengajuan_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	public function daftar(){
		$a['skpd'] = $this->db->from('master_skpd')->get()->result_array();
		
		$data['konten'] = view('admin/index_skpd', $a, true);
		return view('templates/head', $data);
	}

	public function tambah(){
		
		$data['konten'] = view('admin/tambah_skpd', array(), true);
		return view('templates/head', $data);
	}

	public function submitTambah(){
		$data = $this->input->post(NULL, TRUE);
		if($this->db->insert('master_skpd', $data)){
			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'SKPD berhasil disimpan'));		
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));		
		}
		return redirect('admin/masterskpd');
	}

	public function edit($Master_Skpd_Id){
		$a['skpd'] = $this->db->from('master_skpd')
					->where('Master_Skpd_Id', $Master_Skpd_Id)
					->get()->row_array();
		
		$data['konten'] = view('admin/edit_skpd', $a, true);
		return view('templates/head', $data);
	}

	public function editStore($Master_Skpd_Id){
		$data = $this->input->post(NULL, TRUE);
		$this->db->where('Master_Skpd_Id', $Master_Skpd_Id);
		if ($this->db->update('master_skpd', $data)){
			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'SKPD berhasil diubah'));		
			return redirect('admin/masterskpd');
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan. Coba ulangi beberapa saat lagi'));		
			return redirect('admin/masterskpd/edit/'.$Master_Skpd_Id);
		}

	}
}