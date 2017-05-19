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

		$ar['pokja'] = $this->db->select('*, Id_User as Id_U, (SELECT COUNT(*) FROM pengajuan_pengadaan WHERE Id_Pokja = Id_U AND Progress <> 11 AND pengajuan_pengadaan.Deleted_At = null AND user.Deleted_At = null) AS jml_tangani')
					->from('user')
					->where('Slug_Jabatan', 'pokja')
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
		$ar_catatan['Slug_Jabatan_Target'] = 'kabag';

		$ar['Progress'] = 'ksb_pel_upl_surat_trc';
		$ar['Slug_Posisi'] = 'ksb_pel';
		$ar['File_Surat_TRC'] = $this->_uploadFile('./storage/file_surat_trc/');

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);
		
		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'kabag');


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

		$this->user_m->createLog('Mengupload surat Hasil TRC pengajuan ke Kabag dengan pin '. $this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'File Hasil TRC berhasil diupload'));		
		return redirect('ksb_pel/pengajuan/');
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

}
