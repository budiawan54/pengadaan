<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('admin');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	public function daftar(){
		$a['pengguna'] = $this->db->from('user')->where('user.Slug_Jabatan <>', 'admin')
							->join('jabatan_sistem', 'user.Slug_Jabatan = jabatan_sistem.Slug_Jabatan')
							->order_by('urutan')
							->get()->result_array();
		$data['konten'] = view('admin/daftar_pengguna', $a, true);

		return view('templates/head', $data);
	}

	public function tambah(){
		$a['pokja'] = $this->db->from('user')->where('Slug_Jabatan', 'pokja')->get()->result_array();
		$a['skpd'] = $this->db->from('master_skpd')->get()->result_array();
		$a['ListJabatan'] = $this->db->from("jabatan_sistem")
							->where('Slug_Jabatan <>', 'admin')
							->order_by('urutan')
							->get()->result_array();

		$data['konten'] = view('admin/tambah_pengguna', $a, true);
		return view('templates/head', $data);

	}

	private function _uploadFile(){
		$uploadDir = './storage/surat_tugas_user/';
		$myFile = $_FILES["fileUpload"];
		$path = $myFile['name'];
		$temp = $myFile['tmp_name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$newFileName = rand().'_'.enc(date('Y-m-d')).'.'.$ext;

		if (move_uploaded_file($temp, $uploadDir.$newFileName)){
			return $newFileName;
		}
		return '';
	}

	public function tambahStore(){
		$slug_j = $this->input->post('Slug_Jabatan');

		if ($slug_j == 'kabag' || $slug_j == 'ksb_ren'){
			if (sizeof($this->user_m->getActiveByJabatan($slug_j)) > 0){
				$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Maaf, akun Kabag dan Kasubag hanya dibatasi 1 orang. Silahkan nonaktivkan akun sebelumnya apabila ingin menambah Kabag atau Kasubag baru'));	
				redirect('admin/manajemen/pengguna/tambah');
			}
		}



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
		$a['Master_Skpd_Id'] = $this->input->post('Master_Skpd_Id');
		$a['Surat_tugas'] = $this->_uploadFile();
		$a['Id_Pokja'] = $this->input->post('Id_Pokja');

		if($this->db->insert('user', $a)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengguna baru berhasil ditambahkan. Silahkan instruksikan untuk mengganti password'));		
			redirect('admin/manajemen/pengguna');
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Maaf, terjadi kesalahan'));		
			redirect('admin/manajemen/pengguna/tambah');
		}

	}

	public function detailUser($Id_User){
		$a['User'] = $this->db->from('user')
					->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = user.Slug_Jabatan')
					->where('Id_User', $Id_User)->get()->row_array();
		$data['konten'] = view('admin/detail_pengguna', $a, true);
		return view('templates/head', $data);
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
		redirect('admin/manajemen/pengguna/'.$id);
	}

	public function nonAktifPengguna(){
		$Id_User = $this->input->post('Id_User');
		$ar['IsActive'] = 0;

		$this->db->where('Id_User', $Id_User);
		if($this->db->update('user', $ar)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengguna berhasil dinonaktivkan'));		
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));		
		}
		redirect('admin/manajemen/pengguna/'.$Id_User);
	}

	public function AktifPengguna(){
		$Id_User = $this->input->post('Id_User');
		
		$ar['IsActive'] = 1;

		$this->db->where('Id_User', $Id_User);
		if($this->db->update('user', $ar)){
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengguna berhasil diaktivasi kembali'));		
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));		
		}
		redirect('admin/manajemen/pengguna/'.$Id_User);
	}


	public function profil(){

		$user = $this->user_m->getDetailLoginUser();
		$ar['user'] = $user;
		$data['konten'] = view('universal/profil', $ar, true);
		return view('templates/isi', $data);
		
	}

	public function profilEdit(){
		$user = $this->user_m->getDetailLoginUser();
		$id_user = $user['Id_User'];

		$ar['Username'] = $this->input->post('Username');
		$ar['Nama_Lengkap'] = $this->input->post('Nama_Lengkap');
		$ar['NIP_User'] = $this->input->post('NIP_User');
		$ar['No_Hp_User'] = $this->input->post('No_Hp_User');
		$ar['Email'] = $this->input->post('Email');
		$ar['No_WA'] = $this->input->post('No_WA');
		$ar['No_Telegram'] = $this->input->post('No_Telegram');

		$this->db->where('Id_User', $id_user);
		if ($this->db->update('user', $ar)){

			$this->user_m->createLog('Mengedit profil user');

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Data user berhasil diubah'));		

		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Update gagal dilakukan silahkan gunakan nama user lain'));		
		}
	    redirect('profil');

	}
	

	public function passwordUbah(){
		$Password_n = $this->input->post('Password_n'); 
		$Password_k = $this->input->post('Password_k'); 
		$Password_l = $this->input->post('Password_l'); 
		$user = $this->user_m->getDetailLoginUser();
		
		if ($Password_k != $Password_n){
			
			$this->session->set_flashdata('pesan_pas', array('tipe' => 'danger', 'isi' => 'Password dan Konfirmasi Password tidak cocok'));
		}
		else if (enc($Password_l) != $user['Password']){
			$this->session->set_flashdata('pesan_pas', array('tipe' => 'danger', 'isi' => 'Password lama tidak cocok'));
		}
		else{

			$this->user_m->createLog('Melakukan perubahan password');

			$ar['Password'] = enc($Password_n);
			$this->db->where('Id_User', $user['Id_User']);
			$this->db->update('user', $ar);
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Password berhasil diubah'));

		}

	    redirect('profil');

	}
}