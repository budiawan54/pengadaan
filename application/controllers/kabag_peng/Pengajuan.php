<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('kabag_peng');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/kabag_peng');

		$this->user_m->createLog('Melihat halaman daftar pengajuan');
		
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

		$ar['pokja'] = $this->db->select('*, Id_User as Id_U, (SELECT COUNT(*) FROM pengajuan_pengadaan WHERE Id_Pokja = Id_U AND Progress <> 11 AND pengajuan_pengadaan.Deleted_At = null AND user.Deleted_At = null) AS jml_tangani')
					->from('user')
					->where('Slug_Jabatan', 'pokja')
					->get()
					->result_array();

		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $pengajuan['PIN']);


		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}


	// private function _uploadSuratPengembalian(){
	// 	$uploadDir = './storage/surat/';
	// 	$myFile = $_FILES["fileUpload"];
	// 	$path = $myFile['name'];
	// 	$temp = $myFile['tmp_name'];
	// 	$ext = pathinfo($path, PATHINFO_EXTENSION);

	// 	$newFileName = rand().'_'.enc(date('Y-m-d')).'.'.$ext;

	// 	if (move_uploaded_file($temp, $uploadDir.$newFileName)){
	// 		return $newFileName;
	// 	}
	// 	return '';
	// }

	// public function pengembalian_berkas(){
	// 	$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
	// 	$ar_catatan['Isi'] = $this->input->post('Catatan');
	// 	$ar_catatan['Slug_Jabatan'] = 'kabag';
	// 	$ar_catatan['Slug_Jabatan_Target'] = 'ppk';
		
	// 	$ar['Progress'] = $this->input->post('Progress');
	// 	$ar['Slug_Posisi'] = 'ppk';
	// 	$ar['Surat_Pengembalian'] = $this->_uploadSuratPengembalian();

	// 	$pesan = 'Surat berhasil disubmit dan berkas telah dikembalikan ke PPK';

	// 	$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

	// 	$this->user_m->createLog('Mengupload surat pengembalian pengajuan dengan pin '. $this->pengajuan_m->getPIN($this->input->post('Id_Pengajuan_Pengadaan')));


	// 	$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

	// 	$this->pengajuan_m->addNotif($ar_catatan['Id_Pengajuan_Pengadaan'], false);


	// 	$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
	// 	return redirect('kabag_peng/pengajuan/');

	// }

	public function hasil_seleksi(){

		$pas = $this->input->post('Password');

		if ($this->userLogin['Password'] == enc($pas)){

			$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
			$ar_catatan['Isi'] = $this->input->post('Catatan');
			$ar_catatan['Slug_Jabatan'] = 'kabag_peng';
			$ar_catatan['Slug_Jabatan_Target'] = 'pokja';




			$ar['Progress'] = $this->input->post('Progress');
			$ar['Slug_Posisi'] = 'pokja';
			$ar['Id_Pokja'] = $this->input->post('Id_Pokja');
			$ar['Surat_Tugas_Pokja'] = $this->input->post('Surat_Tugas_Pokja');
			// $ar['Surat_Tugas_Pokja'] = $this->_uploadSuratPengembalian();

			$pesan = 'Pengajuan berhasil di setujui dan dikirim ke POKJA';

			$this->user_m->createLog('Menyetujui pengajuan dan mengirim ke pokja dengan pin '. $this->pengajuan_m->getPIN($this->input->post('Id_Pengajuan_Pengadaan')));

			$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'pokja');
			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'anggota_pokja');


			$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
			return redirect('kabag_peng/pengajuan/');
		}

		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Password tidak cocok'));		
			return redirect('kabag_peng/pengajuan/' . $this->input->post('Id_Pengajuan_Pengadaan'));
		}

	}


}
