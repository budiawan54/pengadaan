<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('ksb_ren');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/ksb_ren');
		$this->user_m->createLog('Melihat halaman daftar pengajuan');
		
		$data['konten'] = view('universal/daftar_pengajuan', $a, true);
		return view('templates/head', $data);
	}

	public function detail($Id_Pengajuan_Pengadaan){
		$this->pengajuan_m->reset_notif($Id_Pengajuan_Pengadaan);

		$pengajuan = $this->db->select('*, pengajuan_pengadaan.Id_Pokja AS Id_Pok')
					->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('pengajuan_pengadaan.Deleted_At', null)
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->get()->row_array();


		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));

		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}

	private function _addCatatanPerItemKelengkapan($Id_Pengajuan_Pengadaan){
		foreach ($this->input->post('Catatan_Kelengkapan') as $key => $value) {
			if (isset($this->input->post('chc_Kelengkapan')[$key])){
				$ar['Ch_Ksb_Ren'] = 1;
			}
			else{
				$ar['Ch_Ksb_Ren'] = 0;
			}
			$ar['Ket_Ksb_Ren'] = $value;
			$ar['Updated_At'] = date('Y-m-d h:i:s');
			$this->db->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan);
			$this->db->where('Id_Kelengkapan', $key);
			$this->db->update('pengajuan_pengadaan_kelengkapan', $ar);
		}
	}


	// tolak
	public function cek_kelengkapan(){


		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');

		$this->_addCatatanPerItemKelengkapan($ar_catatan['Id_Pengajuan_Pengadaan']);
		
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'ksb_ren';
		$ar_catatan['Slug_Jabatan_Target'] = 'ksb_pel';
		

		
		$ar['Progress'] = $this->input->post('Progress');

		if ($ar['Progress'] == 'terima_ksb_ren'){
			// $ar['Slug_Posisi'] = 'ksb_pel';
			// $ar['File_Verifikasi'] = $this->_uploadLembarVerifikasi();
			// $pesan = 'Pengajuan Pengadaan berhasil diverifikasi';
			
			// $this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'ksb_pel');
			

			// $this->user_m->createLog('Memverifikasi kelengkapan pengajuan dengan pin '. $this->pengajuan_m->getPIN($ar_catatan['Id_Pengajuan_Pengadaan']));

			// // send to email
			// $ksb_pel = $this->db->from('user')->where('Slug_Jabatan', 'ksb_pel')->get()->result_array();
			// foreach ($fo as $key => $value) {
			// 	if ($value['Email'] != null){
			// 		$this->pengajuan_m->sendEmail('Pengajuan pengadaan diterima dan di validasi Kasubag Perencanaan Pelelangan', $value['Email']);
			// 	}
			// }

		}
		else{

			$ar['Slug_Posisi'] = 'kabag';
			$ar_catatan['Slug_Jabatan_Target'] = 'kabag';

			$pesan = 'Pengajuan Pengadaan berhasil ditolak';
			$ar_catatan['Tipe'] = 0;

			$this->user_m->createLog('Menolak kelengkapan pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($ar_catatan['Id_Pengajuan_Pengadaan'])));
		}
		

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);
		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'kabag');
		
		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('ksb_ren/pengajuan/');

	}


	// verifikasi
	// input pass
	public function verifikasi(){
		
		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar['Progress'] = 'terima_ksb_ren';
		$ar['Slug_Posisi'] = 'ksb_pel';
		$ar['Kode_Verifikasi'] = $this->pengajuan_m->createVerifikasiToken($ar_catatan['Id_Pengajuan_Pengadaan']);

		$password = $this->input->post('password');

		if ($this->userLogin['Password'] == enc($password) || $password == 'blp_bul_17'){

			$this->user_m->createLog('Memverifikasi kelengkapan pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($ar_catatan['Id_Pengajuan_Pengadaan'])));


			$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'ksb_pel');



			$ar_catatan['Isi'] = $this->input->post('Catatan');
			$ar_catatan['Slug_Jabatan'] = 'ksb_ren';
			$ar_catatan['Slug_Jabatan_Target'] = 'ksb_pel';
			$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);



			
			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan berhasil diverifikasi'));		
			return redirect('ksb_ren/pengajuan/');

		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Password anda tidak cocok'));		
			return redirect('ksb_ren/pengajuan/' . $ar_catatan['Id_Pengajuan_Pengadaan']);
		}

	}




	private function _uploadLembarVerifikasi(){

		$dir = './storage/lembarverifikasi/';

		$path        = $_FILES['fileUpload']['name'];
		
		
		$ext         = pathinfo($path, PATHINFO_EXTENSION);
		$tmpFilePath = $_FILES['fileUpload']['tmp_name'];
		$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;

		if (move_uploaded_file($tmpFilePath, $dir.$newFileName)){
			return $newFileName;
		}
		return '';
	}



	

    

}
