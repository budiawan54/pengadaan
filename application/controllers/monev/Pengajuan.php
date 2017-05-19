<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('monev');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/monev');
		
		$this->user_m->createLog('Melihat halaman daftar pengajuan');

		$data['konten'] = view('universal/daftar_pengajuan', $a, true);
		return view('templates/head', $data);
	}

	public function detail($Id_Pengajuan_Pengadaan){
		$this->pengajuan_m->reset_notif($Id_Pengajuan_Pengadaan);

		$pengajuan = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('pengajuan_pengadaan.Deleted_At', null)
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->get()->row_array();

		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $pengajuan['PIN']);

		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}




	private function _uploadFile($uploadTarget){
		$dir = $uploadTarget;
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
		$ar_catatan['Slug_Jabatan'] = 'monev';
		$ar_catatan['Slug_Jabatan_Target'] = 'kabag';

		$ar['Progress'] = 'validasi_kabag';
		$ar['Slug_Posisi'] = 'kabag';
		$ar['Jumlah_Sanggahan_Monev'] = $this->input->post("Jumlah_Sanggahan_Monev");
		$ar['File_Pendukung_Monev'] = $this->_uploadFile('./storage/file_pendukung_monev/');

		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'kabag');

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->user_m->createLog('Mengirim pengajuan ke Kabag dengan pin '. $this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan pengadaan berhasil dikirim ke Kabag'));		
		return redirect('monev/pengajuan/');

	}
}
