<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('ksb_pel');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/ksb_pel');
		
		$this->user_m->createLog('Melihat halaman daftar pengajuan');
		
		$data['konten'] = view('universal/daftar_pengajuan', $a, true);
		return view('templates/head', $data);
	}

	public function detail($Id_Pengajuan_Pengadaan){
		$this->pengajuan_m->reset_notif($Id_Pengajuan_Pengadaan);

		$pengajuan = $this->db->select('akses_pengadaan.*, pengajuan_pengadaan.* ,user.Nama_Lengkap, jabatan_sistem.*, akses_pengadaan.User_Id As Id_Pok, pengajuan_pengadaan.Id_User As Id_Us,pengajuan_pengadaan.Id_Pengajuan_Pengadaan AS Id_Peng, akses_pengadaan.Pengajuan_Pengadaan_Id AS Peng_id,')
					->from('akses_pengadaan')
					->join('pengajuan_pengadaan','akses_pengadaan.Pengajuan_Pengadaan_Id=pengajuan_pengadaan.Id_Pengajuan_Pengadaan')
					->join('user','akses_pengadaan.User_Id=user.Id_User')
					->join('jabatan_sistem','akses_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					//->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					//->where('pengajuan_pengadaan.Deleted_At', null)
					->where('akses_pengadaan.Pengajuan_Pengadaan_Id', $Id_Pengajuan_Pengadaan)
					//->where('akses_pengadaan.User_Id', $this->userLogin['Id_User'])
					->get()->row_array();


		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

		//$ar['pokja'] = $this->db->select('*, Id_User as Id_U, (SELECT COUNT(*) FROM pengajuan_pengadaan WHERE Id_Pokja = Id_U AND Progress <> 11 AND pengajuan_pengadaan.Deleted_At = null AND user.Deleted_At = null) AS jml_tangani')
		//			->from('user')
		//			->where('Slug_Jabatan', 'pokja')
		//			->get()
		//			->result_array();
		$ar['pokja']=$this->db->select('User_Id, Nama_Lengkap')->from('akses_pengadaan')
					->where('Pengajuan_Pengadaan_Id',$Id_Pengajuan_Pengadaan)
					->join('user','akses_pengadaan.User_Id=user.Id_User')
					->get()
					->result_array();

		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));


		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}


	public function usul_ke_kabag_pengadaan(){

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'ksb_pel';
		$ar_catatan['Slug_Jabatan_Target'] = 'kabag';
		
		$ar['Progress'] = 'usul_ke_kabag_peng';
		$ar['Slug_Posisi'] = 'kabag';
		$ar['Id_Pokja'] = $this->input->post('Id_Pokja');

		$this->user_m->createLog('Mengusulkan pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']) .' ke Kabag Pelayanan Pengadaan');

		$pesan = 'Pengajuan Pengadaan berhasil diajukan ke Kabag Pelayanan Pengadaan';

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'kabag');


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('ksb_pel/pengajuan/');

	}




	public function upload_surat_trc(){
		$Id_Pengajuan_Pengadaan = $this->input->post("Id_Pengajuan_Pengadaan");

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'ksb_pel';
		$ar_catatan['Slug_Jabatan_Target'] = 'pokja';

		$ar['Progress'] = 'ksb_pel_upl_surat_trc';
		$ar['Slug_Posisi'] = 'ksb_pel';
		$ar['File_Surat_TRC'] = $this->_uploadFile('./storage/file_surat_trc/');

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);


		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'kabag');
		$this->pengajuan_m->addNotif($ar_catatan['Id_Pengajuan_Pengadaan'], false);
		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'pokja');
		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'fo');


		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->user_m->createLog('Mengupload surat TRC pengajuan ke Kabag dengan pin '. $this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Surat TRC berhasil diupload'));		
		return redirect('ksb_pel/pengajuan/');
	}




	public function upload_hasil_trc(){
		$Id_Pengajuan_Pengadaan = $this->input->post("Id_Pengajuan_Pengadaan");

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'ksb_pel';
		$ar_catatan['Slug_Jabatan_Target'] = 'pokja';

		$ar['Progress'] = 'trc_selesai';
		$ar['Slug_Posisi'] = 'pokja';
		$ar['File_Hasil_TRC'] = $this->_uploadFile('./storage/file_hasil_trc/');

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);


		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'pokja');

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->user_m->createLog('Mengupload surat Hasil TRC pengajuan ke Pokja dengan pin '. $this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'File Hasil TRC berhasil diupload'));		
		return redirect('ksb_pel/pengajuan/');
	}


	

	public function hasil_seleksi(){

		$pas = $this->input->post('Password');

		if ($this->userLogin['Password'] == enc($pas)){

			$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
			$ar_catatan['Isi'] = $this->input->post('Catatan');
			$ar_catatan['Slug_Jabatan'] = 'ksb_pel';
			$ar_catatan['Slug_Jabatan_Target'] = 'pokja';

			$ar['Progress'] = $this->input->post('Progress');
			$ar['Slug_Posisi'] = 'pokja';
			//$ar['Id_Pokja'] = $this->input->post('Id_Pokja');
			$ar['Surat_Tugas_Pokja'] = $this->_uploadFile('./storage/file_surat_pokja/');
			//$ar['File_Surat_TRC'] = $this->_uploadFile('./storage/file_surat_trc/');

			// $ar['Surat_Tugas_Pokja'] = $this->_uploadSuratPengembalian();

			$pesan = 'SK POKJA sudah diunggah dan dikirim ke POKJA';

			$this->user_m->createLog('SK POKJA sudah diunggah dan mengirim ke pokja dengan pin '. $this->pengajuan_m->getPIN($this->input->post('Id_Pengajuan_Pengadaan')));

			$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'pokja');
			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'anggota_pokja');


			$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
			return redirect('ksb_pel/pengajuan/');
		}

		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Password tidak cocok'));		
			return redirect('ksb_pel/pengajuan/' . $this->input->post('Id_Pengajuan_Pengadaan'));
		}

	}

	private function _uploadFile($uploadTarget){
		$dir 		 = $uploadTarget;
		$path        = $_FILES['fileUpload']['name'];
		$ext         = pathinfo($path, PATHINFO_EXTENSION);
		$tmpFilePath = $_FILES['fileUpload']['tmp_name'];
		$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;
		if (move_uploaded_file($tmpFilePath, $dir.$newFileName)){
			return $newFileName;
		}
		return '';
	}

	public function kirimKeKabag(){
		$Id_Pengajuan_Pengadaan = $this->input->post("Id_Pengajuan_Pengadaan");

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'ksb_pel';
		$ar_catatan['Slug_Jabatan_Target'] = 'ppk';

		$ar['Progress'] = 'lelang_diterima';
		$ar['Slug_Posisi'] = 'ppk';
		$ar['Jumlah_Sanggahan_Monev'] = $this->input->post("Jumlah_Sanggahan_Monev");
		if ($this->input->post('Jumlah_Sanggahan_Monev') > 0){
			$ar['File_Pendukung_Monev'] = $this->_uploadFile('./storage/file_pendukung_monev/');
		}
		else{
			$ar['File_Pendukung_Monev'] = null;
		}
		
		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'ppk');

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->user_m->createLog('Mengirim pengajuan ke ppk dengan pin '. $this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan pengadaan berhasil diverifikasi dan dikirim ke PPK'));		
		return redirect('ksb_pel/pengajuan/');

	}

	


}
