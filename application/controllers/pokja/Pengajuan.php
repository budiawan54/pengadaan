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

		$pengajuan = $this->db->select('akses_pengadaan.*, pengajuan_pengadaan.* ,user.Nama_Lengkap, jabatan_sistem.*, akses_pengadaan.User_Id As Id_Pok, pengajuan_pengadaan.Id_User As Id_Us,pengajuan_pengadaan.Id_Pengajuan_Pengadaan AS Id_Peng, akses_pengadaan.Pengajuan_Pengadaan_Id AS Peng_id,')
					->from('akses_pengadaan')
					->join('pengajuan_pengadaan','akses_pengadaan.Pengajuan_Pengadaan_Id=pengajuan_pengadaan.Id_Pengajuan_Pengadaan')
					->join('user','akses_pengadaan.User_Id=user.Id_User')
					->join('jabatan_sistem','akses_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					//->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					//->where('pengajuan_pengadaan.Deleted_At', null)
					->where('akses_pengadaan.Pengajuan_Pengadaan_Id', $Id_Pengajuan_Pengadaan)
					->where('akses_pengadaan.User_Id', $this->userLogin['Id_User'])
					->get()->row_array();
		//$pengajuan = $this->db->order_by('Id_Pengajuan_Pengadaan','asc');


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

		$hasil_kaji = [];
		foreach ($this->input->post('Hasil_Kaji_Pokja') as $key => $value) {
			$hasil_kaji[$key]['isi'] = $value;
		}

		$hasil_kaji = json_encode($hasil_kaji);

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'pokja';
		$ar_catatan['Slug_Jabatan_Target'] = 'ppk';

		$ar['Progress'] = 'pengkajian';
		$ar['Slug_Posisi'] = 'ppk';
		$ar['Hasil_Kaji_Pokja'] = $hasil_kaji;


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


		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'pokja';
		$ar_catatan['Slug_Jabatan_Target'] = 'kabag';

        $this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);



		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Request TRC berhasil dikirim ke Kabag'));

		return redirect('pokja/pengajuan/' . $this->input->post('Id_Pengajuan_Pengadaan'));
	}



	public function kirim_hasil_lelang(){
		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'pokja';
		$ar_catatan['Slug_Jabatan_Target'] = 'ksb_pel';


		$ar['Progress'] = 'pokja_kirim_lelang';
		$ar['Slug_Posisi'] = 'ksb_pel';
		$pesan = 'Hasil lelang berhasil dikirim ke Kasubag Pengelolaan Pengadaan Barang/Jasa';


		$this->_uploadHasilLelang($ar_catatan['Id_Pengajuan_Pengadaan']);

		// insert ke pengajuan kelengkapan file
		$arr['Tanggal_Pengumuman'] = $this->input->post('Tanggal_Pengumuman');
		$arr['Nilai_Penawaran_Hasil'] = $this->input->post('Nilai_Penawaran_Hasil');
		$arr['NPWP'] = $this->input->post('NPWP');
		$arr['Metode_Pemilihan_Penyedia'] = $this->input->post('Metode_Pemilihan_Penyedia');
		$arr['Nama_Pemenang'] = $this->input->post('Nama_Pemenang');
		$arr['Alamat_Pemenang'] = $this->input->post('Alamat_Pemenang');
		$arr['Tgl_Sppbj'] = $this->input->post('Tgl_Sppbj');
		$arr['Jml_Pendaftar'] = $this->input->post('Jml_Pendaftar');
		$arr['Jml_Penawar'] = $this->input->post('Jml_Penawar');
		$arr['kd_lelang']=$this->input->post('kd_lelang');



		if ($this->input->post('Lelang_Ulang') == 'on'){
			$arr['Lelang_Ulang'] = 1;
		}
		else{
			$arr['Lelang_Ulang'] = 0;
		}

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


	public function cetak_hasil_laporan_rapat($id_pengajuan){

		$pengajuan = $this->db->select('*, pengajuan_pengadaan.Id_Pokja AS Id_Pok')
					->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('pengajuan_pengadaan.Deleted_At', null)
					->where('pengajuan_pengadaan.Id_Pengajuan_Pengadaan', $id_pengajuan)
					->join('master_skpd', 'master_skpd.Master_Skpd_Id = user.Master_Skpd_Id')
					->get()->row_array();


		$pokja = $this->db->from('user')->where('Id_User', $pengajuan['Id_Pok'])->get()->row_array();




		$hasil_kaji = [];

		foreach ($this->input->post('Hasil_Kaji_Pokja') as $key => $value) {
			$hasil_kaji[$key]['isi'] = $value;
			$hasil_kaji[$key]['status'] = $this->input->post('Status')[$key];
			$hasil_kaji[$key]['keterangan'] = $this->input->post('Keterangan')[$key];

		}


		$arUpdate['Hasil_Kaji_Pokja'] = json_encode($hasil_kaji);
		$this->pengajuan_m->UpdateProgress($id_pengajuan, $arUpdate);



		$ar['pengajuan'] = $pengajuan;
		$ar['hasil_kaji'] = $hasil_kaji;
		$ar['pokja'] = $pokja;

		$this->user_m->createLog('Mencetak Hasil Kaji Rapat dengan PIN '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));

		$v =  view('templates/pdf/cetakHasilRapatKaji', $ar, true);

		$filename = 'hasil-kaji-rapat';
	    pdf_create($v, $filename, 'A4');


	}

	//tampil data lelang
	public function tampil_data_lelang() {
					$lelang = $this->security->xss_clean($this->input->post('lelang', TRUE));
					$tahun  = $this->security->xss_clean($this->input->post('tahun', TRUE));
					$bulan  = $this->security->xss_clean($this->input->post('bulan', TRUE));
	        $data = array();
	        $url = 'https://inaproc.lkpp.go.id/isb/api/0ce36ab5-a795-4c60-be59-92a6d7ef4ef8/json/22113253/LelangSelesaiSPSELPSE/tipe/4:4:4/parameter/'.$tahun.':'.$bulan.':33';
	        $content = file_get_contents($url); // varibel untuk konten
	        if ($content) {
	            $content_lelang = json_decode($content, true); // decode json
	            foreach ($content_lelang as $tampil) {
	                if ($tampil['kd_lelang'] == $lelang) {
						          $data['kd_lelang'] = $tampil['kd_lelang'];
	                    $data['nilai_penawaran']=$tampil['nilai_penawaran'];
											$data['npwp_penyedia']=$tampil['npwp_penyedia'];
											$data['nama_pemenang']=$tampil['nama_pemenang'];
											$data['jum_peserta']=$tampil['jum_peserta'];
	                    $data['status'] = 'berhasil';

	                }
	            }
	        } else {
	            $data['status'] = 'bermasalah';
	        }
	        echo json_encode($data);
	    }


}
