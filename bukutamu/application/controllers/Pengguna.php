<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function daftar(){
		$data['pengguna'] = $this->db->from('user')
							->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = user.Slug_Jabatan')
							->where('jabatan_sistem.Slug_Jabatan <>', 'admin')->get()->result_array();
		$ar['konten'] = view('admin/pengguna/daftar', $data, true);
		return view('templates/isi', $ar);
	}

	public function tambah(){
		$a['ListJabatan'] = $this->db->from("jabatan_sistem")
							->where('Slug_Jabatan <>', 'admin')
							->order_by('urutan')
							->get()->result_array();
		$data['konten'] = view('admin/pengguna/tambah', $a, true);
		return view('templates/isi', $data);

	}

	public function submit(){
		$slug_j = $this->input->post('Slug_Jabatan');


		$a['Username'] = $this->input->post('Username');
		$a['Nama_Lengkap'] = $this->input->post('Nama_Lengkap');
		$a['Password'] = enc($this->input->post('Password'));
		$a['NIP_User'] = $this->input->post('NIP_User');
		$a['No_Ktp'] = $this->input->post('No_Ktp');
		$a['No_WA'] = $this->input->post('No_WA');
		$a['No_Telegram'] = $this->input->post('No_Telegram');
		$a['Email'] = $this->input->post('Email');
		$a['No_Hp_User'] = $this->input->post('No_Hp_User');
		$a['Slug_Jabatan'] = $this->input->post('Slug_Jabatan');

		if($this->db->insert('user', $a)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengguna baru berhasil ditambahkan. Silahkan instruksikan untuk mengganti password'));		
			redirect('pengguna/daftar');
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Maaf, terjadi kesalahan'));		
			redirect('pengguna/daftar');
		}
	}


	public function detail($Id_User){
		$a['User'] = $this->db->from('user')
					->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = user.Slug_Jabatan')
					->where('Id_User', $Id_User)->get()->row_array();
		$data['konten'] = view('admin/pengguna/detail_pengguna', $a, true);

		return view('templates/isi', $data);
	}

	public function resetPass($id){
		$ar['Password'] = enc($this->input->post('Password'));

		$this->db->where('Id_User', $id);
		if ($this->db->update('user', $ar)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Password pengguna berhasil diubah'));		
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));		
		}
		redirect('pengguna/detail/'.$id);
	}

	public function nonaktif(){
		$Id_User = $this->input->post('Id_User');
		$ar['IsActive'] = 0;

		$this->db->where('Id_User', $Id_User);
		if($this->db->update('user', $ar)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengguna berhasil dinonaktivkan'));		
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));		
		}
		redirect('pengguna/detail/'.$Id_User);
	}

	public function aktif(){
		$Id_User = $this->input->post('Id_User');
		
		$ar['IsActive'] = 1;

		$this->db->where('Id_User', $Id_User);
		if($this->db->update('user', $ar)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengguna berhasil diaktivasi kembali'));		
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));		
		}
		redirect('pengguna/detail/'.$Id_User);
	}

}
