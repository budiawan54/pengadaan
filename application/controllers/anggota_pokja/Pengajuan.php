<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;
	function __construct()
	{
		parent::__construct();
		$this->userLogin = $this->user_m->getDetailLoginUser();

		$this->user_m->checkLogin('anggota_pokja');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/anggota_pokja');
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
					// ->where('pengajuan_pengadaan.Id_Pokja', $this->userLogin['Id_User'])
					->get()->row_array();


		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		
		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));

		// catatan personal anggota pokja
		foreach ($ar['kelengkapan'] as $key => $value) {
			$id_kelengkapan = $value['Id_Kelengkapan'];

			if (isset($ar['kelengkapan'][$key]['isian'])){

				$ar['kelengkapan'][$key]['catatan_anggota_personal'] = $this->db->from('pengajuan_pengadaan_kelengkapan_catatan')
						->where('Id_User', $this->userLogin['Id_User'])
						->where('Id_Pengajuan_Pengadaan_Kelengkapan', $value['isian']['Id_Pengajuan_Pengadaan_Kelengkapan'])
						->get()->row_array();
			}
		}

		// dd($ar['kelengkapan']);

		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}


	public function simpanCatatanAnggotaPokja(){
		$id_user = $this->userLogin['Id_User'];
		$id = $this->input->post('Id_Pengajuan_Pengadaan');

		$this->user_m->createLog('Memberikan catatan pada pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($id)));

		foreach ($this->input->post('Catatan_Kelengkapan_Pokja') as $key => $value) {
			$id_kel = $key;
			$isian_sblm = $this->db->from('pengajuan_pengadaan_kelengkapan_catatan')
							->where('Id_User', $id_user)
							->where('Id_Pengajuan_Pengadaan_Kelengkapan', $id_kel)
							->get()
							->row_array();

			$ar['Id_User'] = $id_user;
			$ar['Isi_Catatan'] = $value;
			$ar['Id_Pengajuan_Pengadaan_Kelengkapan'] = $id_kel;

			if (sizeof($isian_sblm) == 0){
				if ($ar['Isi_Catatan'] != ''){
					$this->db->insert('pengajuan_pengadaan_kelengkapan_catatan', $ar);
				}
			}
			else{
				$this->db->where('Id_Catatan', $isian_sblm['Id_Catatan']);
				$this->db->update('pengajuan_pengadaan_kelengkapan_catatan', $ar);
			}
			unset($ar);
		}

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Catatan anda berhasil disimpan. Silahkan input kembali untuk mengedit catatan sebelumnya'));		

		redirect('anggota_pokja/pengajuan/'.$id);

	}

	
}
