<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('pokja');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/pokja');
		
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
					// ->where('pengajuan_pengadaan.Id_Pokja', $this->userLogin['Id_User'])
					->get()->row_array();


		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

		// catatan personal pokja
		foreach ($ar['kelengkapan'] as $key => $value) {
			$id_kelengkapan = $value['Id_Kelengkapan'];

			if (isset($ar['kelengkapan'][$key]['isian'])){

				$ar['kelengkapan'][$key]['catatan_anggota_personal'] = $this->db->from('pengajuan_pengadaan_kelengkapan_catatan')
						->where('Id_User', $this->userLogin['Id_User'])
						->where('Id_Pengajuan_Pengadaan_Kelengkapan', $value['isian']['Id_Pengajuan_Pengadaan_Kelengkapan'])
						->get()->row_array();
			}
		}

		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));

		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}


	// catatan per kelengkapan
	// 
	public function simpanCatatanPokja(){

		$id_user = $this->userLogin['Id_User'];
		$id = $this->input->post('Id_Pengajuan_Pengadaan');

		$this->user_m->createLog('Memberikan catatan pada pengajuan dengan pin'. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($id)));

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

		redirect('pokja/pengajuan/'.$id);

	}


	public function kirim_hasil_kaji(){

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'pokja';
		$ar_catatan['Slug_Jabatan_Target'] = 'ppk';
		
		$ar['Progress'] = 'pengkajian';
		$ar['Slug_Posisi'] = 'ppk';
		$ar['Hasil_Kaji_Pokja'] = $this->input->post('Hasil_Kaji_Pokja');

		$pesan = 'Hasil kajian berhasil dikirim ke PPK';
		
		$this->pengajuan_m->addNotif($ar_catatan['Id_Pengajuan_Pengadaan'], false);

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->user_m->createLog('Mengirim hasil kaji pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan"))));


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('pokja/pengajuan/');
		
	}

	public function proses_lelang(){
		$arr['Progress'] = 'lelang';
		
		$this->pengajuan_m->UpdateProgress($this->input->post('Id_Pengajuan_Pengadaan'), $arr);

		$this->pengajuan_m->addNotif($this->input->post('Id_Pengajuan_Pengadaan'), false);

		$this->user_m->createLog('Melakukan proses lelang terhadap pengajuan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan"))));
		
		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan pengadaan berhasil di atur dalam proses lelang'));		

		return redirect('pokja/pengajuan/' . $this->input->post('Id_Pengajuan_Pengadaan'));
	}


	public function request_trc(){
		$arr['Progress'] = 'permintaan_trc';
		$arr['Slug_Posisi'] = 'kabag';
		
		$this->pengajuan_m->UpdateProgress($this->input->post('Id_Pengajuan_Pengadaan'), $arr);

		$this->pengajuan_m->sendNotifToBySlug($this->input->post('Id_Pengajuan_Pengadaan'), 'kabag');

		$this->user_m->createLog('Meminta TRC terhadap pengajuan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan"))));
		
		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Request TRC berhasil dikirim ke Kabag'));

		return redirect('pokja/pengajuan/' . $this->input->post('Id_Pengajuan_Pengadaan'));
	}



	public function kirim_hasil_lelang(){
		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'pokja';
		$ar_catatan['Slug_Jabatan_Target'] = 'monev';

		
		$ar['Progress'] = 'pokja_kirim_lelang';
		$ar['Slug_Posisi'] = 'monev';
		$pesan = 'Hasil lelang berhasil dikirim ke Kasubag Monev';
		
		

		$this->_uploadHasilLelang($ar_catatan['Id_Pengajuan_Pengadaan']);

		// insert ke pengajuan kelengkapan file
		$arr['Tanggal_Pengumuman'] = $this->input->post('Tanggal_Pengumuman');
		$arr['Nilai_Penawaran_Hasil'] = $this->input->post('Nilai_Penawaran_Hasil');
		$arr['NPWP'] = $this->input->post('NPWP');
		$arr['Metode_Pemilihan_Penyedia'] = $this->input->post('Metode_Pemilihan_Penyedia');
		$arr['Lelang_Ulang'] = $this->input->post('Lelang_Ulang');
		$arr['Lelang_Ulang_Ke'] = $this->input->post('Lelang_Ulang_Ke');

		$arr['Id_Pengajuan_Pengadaan'] = $ar_catatan['Id_Pengajuan_Pengadaan'];

		$this->db->insert('pengadaan_hasil_lelang', $arr);

		$this->user_m->createLog('Mengirim hasil lelang pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan"))));


		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);
		
		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'monev');

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('pokja/pengajuan/');
	}




	private function _getKeyUpload($file){
		$a = $file['name'];
		$b = array();
		foreach ($a as $key => $value) {
			$b[] = $key;
		}
		return $b;
	}

	private function _uploadHasilLelang($Id_Pengajuan_Pengadaan){
		$targetFolder = './storage/hasil_lelang/';
		$arI          = $this->_getKeyUpload($_FILES['fileUpload']);
		
		foreach ($arI as $key => $value) {
			$path        = $_FILES['fileUpload']['name'][$value];
			$ext         = pathinfo($path, PATHINFO_EXTENSION);
			$tmpFilePath = $_FILES['fileUpload']['tmp_name'][$value];
			$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;

			if (move_uploaded_file($tmpFilePath, $targetFolder.$newFileName)){
				$ar['index']         		  = $value;
				$ar['Id_Pengajuan_Pengadaan'] = $Id_Pengajuan_Pengadaan;
				$ar['filename'] = $newFileName;

				$this->db->insert('pengadaan_hasil_lelang_file', $ar);
			}
		}
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

	public function hapuscatatan($id, $id_pengajuan){
		$this->db->where('Id_Catatan', $id);
		$this->db->delete('pengajuan_pengadaan_kelengkapan_catatan');
		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Catatan berhasil dihapus'));		
		return redirect('pokja/pengajuan/' . $id_pengajuan);
	}
}
