<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();

		$this->user_m->checkLogin('admin');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');


		$this->userLogin = $this->user_m->getDetailLoginUser();

	}

	public function updateprogress(){
	$a['id'] = $this->input->post('progress_pengajuan');
	$ar_pengadaan = $this->input->post('Id_Pengajuan_Pengadaan');
	$proses = $a['id'];
	switch ($proses) {
		case '1':
			$ar['Progress'] = 'fo';
			$ar['Slug_Posisi'] = 'fo';
			break;
		case '2':
			$ar['Progress'] = 'terima_fo';
			$ar['Slug_Posisi'] = 'kabag';
			$this->db->where('Pengajuan_Pengadaan_Id', $ar_pengadaan);
			$this->db->delete('akses_pengadaan');
			break;
		case '3':
			$ar['Progress'] = 'usul_ke_kabag_peng';
			$ar['Slug_Posisi'] = 'ksb_pel';
			break;
		case '4':
			$ar['Progress'] = 'tolak_fo';
			$ar['Slug_Posisi'] = 'ppk';
			break;
		case '5':
			$ar['Progress'] = 'lelang_diterima';
			$ar['Slug_Posisi'] = 'ppk';
			break;
		case '6':
			$ar['Progress'] = 'setuju_seleksi';
			$ar['Slug_Posisi'] = 'pokja';
			break;
		case '7':
			$ar['Progress'] = 'lelang';
			$ar['Slug_Posisi'] = 'pokja';
			break;
		case '8':
			$ar['Progress'] = 'pengkajian';
			$ar['Slug_Posisi'] = 'ppk';
			break;
		case '9':
			$ar['Progress'] = 'pengkajian';
			$ar['Slug_Posisi'] = 'pokja';
			break;
		case '10':
			$ar['Progress'] = 'permintaan_trc';
			$ar['Slug_Posisi'] = 'kabag';
			break;
		case '11':
			$ar['Progress'] = 'kabag_arc_trc';
			$ar['Slug_Posisi'] = 'ksb_pel';
			break;
		case '12':
			$ar['Progress'] = 'ksb_pel_upl_surat_trc';
			$ar['Slug_Posisi'] = 'ksb_pel';
			break;
		case '13':
			$ar['Progress'] = 'trc_selesai';
			$ar['Slug_Posisi'] = 'pokja';
			break;
		case '14':
			$ar['Progress'] = 'pokja_kirim_lelang';
			$ar['Slug_Posisi'] = 'ksb_pel';
			break;
		case '15':
			$ar['Progress'] = 'lelang_diterima';
			$ar['Slug_Posisi'] = 'ppk';
			break;
	}
	$this->pengajuan_m->UpdateProgress($ar_pengadaan['Id_Pengajuan_Pengadaan'], $ar);
	return redirect('admin/pengajuan');
	}


	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/admin');
		$a['admin'] = true;
		$data['konten'] = view('universal/daftar_pengajuan', $a, true);
		return view('templates/head', $data);
	}

	public function detail($Id_Pengajuan_Pengadaan){


		$pengajuan = $this->db->select('*, pengajuan_pengadaan.Id_Pokja AS Id_Pok')
					->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->get()->row_array();

		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['proses'] = $this->db->select('*')
									->from('progress')
									->get()
									->result_array();
		$ar['progress'] = $this->db->select('*')
									->from('progress')
									->get()
									->row_array();
		$ar['nama_proses']=$this->config_m->proses_pengajuan();
		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}

	public function hapus($Id_Pengajuan_Pengadaan){
		$date = date('Y-m-d h:i:s');
		$a['Deleted_At'] = $date;

		$this->db->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan);
		if ($this->db->update('pengajuan_pengadaan', $a)){
			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan pengadaan berhasil dihapus'));
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Maaf, terjadi kesalahan'));
		}

		redirect('admin/pengajuan');

	}

	public function rekap(){
		$data['konten'] = view('admin/rekap_pengajuan', array(), true);
		return view('templates/head', $data);

	}

	public function cetakRekapPengajuan(){
		$bulan = $this->input->post('bulan');

		$ar['pengajuan'] = $this->db->select('*, pengajuan_pengadaan.Created_At as diajukan_tangggal, pengajuan_pengadaan.Id_Pokja as Id_p,

								(SELECT nama_lengkap FROM user WHERE Id_User = Id_p) AS nama_pokja
							')
							->from('pengajuan_pengadaan')
							->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
							->join('master_skpd', 'master_skpd.Master_Skpd_Id = user.Master_Skpd_Id')
							->join('pengadaan_hasil_lelang', 'pengadaan_hasil_lelang.Id_Pengajuan_Pengadaan = pengajuan_pengadaan.Id_Pengajuan_Pengadaan', 'right')
							->where('pengajuan_pengadaan.Deleted_At', null)
							->where('SUBSTR(pengajuan_pengadaan.Created_At, 1, 7) = ', $bulan)
							->get()->result_array();
		// print_r($ar);
		// exit();

		$ar['bulan'] = $bulan;
		$v =  view('templates/pdf/rekap_pengajuan', $ar, true);

		$filename = 'rekap-per-bulan';
        pdf_create($v, $filename, 'F4', 'landscape');


	}

	public function daftar_realisasi(){

		$query= $this->db->query("SELECT realisasi.*, pengajuan_pengadaan.Paket_Pengadaan, pengajuan_pengadaan.Sumber_Dana,
				pengajuan_pengadaan.Kode_RUP,pengadaan_hasil_lelang.kd_lelang, pengadaan_hasil_lelang.Nama_Pemenang,
				pengadaan_hasil_lelang.Nilai_Penawaran_Hasil from realisasi
				left join pengajuan_pengadaan on realisasi.Id_Pengajuan_Pengadaan = pengajuan_pengadaan.Id_Pengajuan_Pengadaan
				left join pengadaan_hasil_lelang on realisasi.Id_Pengajuan_Pengadaan= pengadaan_hasil_lelang.Id_Pengajuan_Pengadaan
				");
		$data['realisasi']= $query->result_array();
		$data['konten'] = view('ppk/realisasi/daftar_realisasi', $data, true);
		return view('templates/head', $data);
	}

}
