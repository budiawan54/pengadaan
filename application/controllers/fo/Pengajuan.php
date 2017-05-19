<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('fo');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$this->user_m->createLog('Melihat halaman daftar pengajuan');

		$a['url_datatable'] = base_url('ajax/ambilpengajuan/fo');
		
		$data['konten'] = view('universal/daftar_pengajuan', $a, true);
		return view('templates/head', $data);
	}

	public function detail($Id_Pengajuan_Pengadaan){

		$this->pengajuan_m->reset_notif($Id_Pengajuan_Pengadaan);

		$pengajuan = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->where('pengajuan_pengadaan.Deleted_At', null)
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
				$ar['Ch_Fo'] = 1;
			}
			else{
				$ar['Ch_Fo'] = 0;
			}

			$ar['Ket_Fo'] = $value;
			$ar['Updated_At'] = date('Y-m-d h:i:s');
			$this->db->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan);
			$this->db->where('Id_Kelengkapan', $key);
			$this->db->update('pengajuan_pengadaan_kelengkapan', $ar);
		}
	}

	public function cek_kelengkapan(){
		

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		
		$this->_addCatatanPerItemKelengkapan($ar_catatan['Id_Pengajuan_Pengadaan']);

		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'fo';
		

		$ar['Progress'] = $this->input->post('Progress');

		if ($ar['Progress'] == 'terima_fo'){

			$this->user_m->createLog('Memverifikasi kelengkapan pengajuan pin '. $this->pengajuan_m->getPIN($ar_catatan['Id_Pengajuan_Pengadaan']));

			$ar['Slug_Posisi'] = 'ksb_ren';
			$pesan = 'Pengajuan Pengadaan berhasil diverifikasi';
			$ar_catatan['Slug_Jabatan_Target'] = 'ksb_ren';

			$ksb_ren = $this->db->from('user')->where('Slug_Jabatan', 'ksb_ren')->get()->result_array();
			foreach ($ksb_ren as $key => $value) {
				if ($value['Email'] != null){
					$this->pengajuan_m->sendEmail('Pengajuan pengadaan diterima dan di validasi Front Office', $value['Email']);
				}
			}
			$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'ksb_ren');

		}
		else{
			$ar['Slug_Posisi'] = 'ppk';
			$pesan = 'Pengajuan Pengadaan berhasil ditolak';
			$ar_catatan['Tipe'] = 0;
			$ar_catatan['Slug_Jabatan_Target'] = 'ppk';
			$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);
			
			$this->pengajuan_m->addNotif($ar_catatan['Id_Pengajuan_Pengadaan'], false);

			$this->user_m->createLog('Menolak kelengkapan pengajuan pin '. $this->pengajuan_m->getPIN($ar_catatan['Id_Pengajuan_Pengadaan']));
			


		}




		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('fo/pengajuan/');

	}

}
