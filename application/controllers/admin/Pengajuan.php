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

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/admin');
		$a['admin'] = true;
		$data['konten'] = view('universal/daftar_pengajuan', $a, true);
		return view('templates/head', $data);
	}

	public function detail($Id_Pengajuan_Pengadaan){


		$pengajuan = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->get()->row_array();
				
		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

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

		$ar['pengajuan'] = $this->db->select('*, pengajuan_pengadaan.Created_At as diajukan_tangggal')
							->from('pengajuan_pengadaan')
							->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
							->join('master_skpd', 'master_skpd.Master_Skpd_Id = user.Master_Skpd_Id')
							->join('pengadaan_hasil_lelang', 'pengadaan_hasil_lelang.Id_Pengajuan_Pengadaan = pengajuan_pengadaan.Id_Pengajuan_Pengadaan')
							->where('pengajuan_pengadaan.Deleted_At !=', null)
							->where('SUBSTR(pengajuan_pengadaan.Created_At, 1, 7) = ', $bulan)
							->where('Progress', 'lelang_diterima')
							->get()->result_array();

		$v =  view('templates/pdf/rekap_pengajuan', $ar, true);

		$filename = 'rekap-per-bulan';
        pdf_create($v, $filename, 'F4', 'landscape');


	}
}
