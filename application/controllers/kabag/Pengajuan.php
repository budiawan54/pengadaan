<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;

	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('kabag');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	
	public function daftarPengajuan(){
		$a['url_datatable'] = base_url('ajax/ambilpengajuan/kabag');
		
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
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->where('pengajuan_pengadaan.Deleted_At', null)
					->get()->row_array();

		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['pokja'] = $this->db->select('*, Id_User as Id_U, (SELECT COUNT(*) FROM pengajuan_pengadaan WHERE Id_Pokja = Id_U AND Progress <> 11 AND pengajuan_pengadaan.Deleted_At = null AND user.Deleted_At = null) AS jml_tangani')
					->from('user')
					->where('Slug_Jabatan', 'pokja')
					->where('IsActive','1')
					->get()
					->result_array();
					
		$this->user_m->createLog('Melihat detail pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));

		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		return view('templates/head', $data);

	}

	public function kirimKePPK(){
		$Id_Pengajuan_Pengadaan = $this->input->post("Id_Pengajuan_Pengadaan");

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'kabag';
		$ar_catatan['Slug_Jabatan_Target'] = 'ppk';

		$ar['Progress'] = 'lelang_diterima';
		$ar['Slug_Posisi'] = 'ppk';

		$this->user_m->createLog('Mengirim pengajuan pengadaan ke PPK '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($Id_Pengajuan_Pengadaan)));

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);
		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);
		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan pengadaan telah selesai dan berhasil dikirim ke PPK'));		

		$this->pengajuan_m->addNotif($Id_Pengajuan_Pengadaan, false);
		
		return redirect('kabag/pengajuan/');
	}

	private function _uploadSuratPengembalian(){
		$uploadDir = './storage/surat/';
		$myFile = $_FILES["fileUpload"];
		$path = $myFile['name'];
		$temp = $myFile['tmp_name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$newFileName = rand().'_'.enc(date('Y-m-d')).'.'.$ext;

		if (move_uploaded_file($temp, $uploadDir.$newFileName)){
			return $newFileName;
		}
		return '';
	}

	public function pengembalian_berkas(){

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'kabag';
		$ar_catatan['Slug_Jabatan_Target'] = 'ppk';
		 
		$ar['Progress'] = $this->input->post('Progress');
		$ar['Slug_Posisi'] = 'ppk';
		$ar['No_Surat_Pengembalian'] = $this->input->post('No_Surat_Pengembalian');
		$ar['Tgl_Pengembalian'] = date("Y-m-d");
		// $ar['Surat_Pengembalian'] = $this->_uploadSuratPengembalian();

		$pesan = 'Surat berhasil disubmit dan berkas telah dikembalikan ke PPK';

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

		$this->user_m->createLog('Mengupload surat pengembalian berkas pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post('Id_Pengajuan_Pengadaan'))));

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

		$this->pengajuan_m->addNotif($ar_catatan['Id_Pengajuan_Pengadaan'], false);

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('kabag/pengajuan/');

	}



	/**
	 * KIRIM KE POKJA
	 * @return [type] [description]
	 */
	public function hasil_seleksi(){

		$pas = $this->input->post('Password');

		if ($this->userLogin['Password'] == enc($pas)){

			$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
			$ar_catatan['Isi'] = $this->input->post('Catatan');
			$ar_catatan['Slug_Jabatan'] = 'kabag';
			$ar_catatan['Slug_Jabatan_Target'] = 'pokja';


			$ar['Progress'] = $this->input->post('Progress');
			$ar['Slug_Posisi'] = 'pokja';
			//$ar['Id_Pokja'] = $this->input->post('Id_Pokja');
			$ar['Surat_Tugas_Pokja'] = $this->input->post('Surat_Tugas_Pokja');
			// $ar['Surat_Tugas_Pokja'] = $this->_uploadSuratPengembalian();

			$pesan = 'Pengajuan berhasil di setujui dan dikirim ke POKJA';

			$this->user_m->createLog('Menyetujui pengajuan dan mengirim ke pokja dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post('Id_Pengajuan_Pengadaan'))));

			$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar);

			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'pokja');
			$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'anggota_pokja');

			$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
			return redirect('kabag/pengajuan/');
		}

		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Password tidak cocok'));		
			return redirect('kabag/pengajuan/' . $this->input->post('Id_Pengajuan_Pengadaan'));
		}

	}

	public function usul_ke_kabag_pengadaan(){

		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'kabag';
		$ar_catatan['Slug_Jabatan_Target'] = 'ksb_pel';
		
		$ar_peng['Progress'] = 'usul_ke_kabag_peng';
		$ar_peng['Slug_Posisi'] = 'ksb_pel';
		$arr = $this->input->post('Id_Pokja');
		$jumlah_akses = count($arr);
		for ($x=0; $x<$jumlah_akses; $x++){
		$ar_akses['User_Id'] = $arr[$x] ;
		$ar_akses['Pengajuan_Pengadaan_Id'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_akses['Slug_Posisi'] = $this->input->post('Slug_Posisi');
		$ar_akses['Id_Pengaju']=$this->input->post('Id_Pengaju');

		$pilih = $this->db->select('User_Id')
							->from('akses_pengadaan')
							->where('User_Id')
							->get()
							->row_array();
		$cek = mysqli_num_rows($pilih);
		if ($cek == 0){
			$this->db->insert('akses_pengadaan',$ar_akses);
		} else {
		$this->db->update('akses_pengadaan',$ar_akses);
		}
		}
		

		$this->user_m->createLog('Mengusulkan pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']) .' ke Kasubag Pengelolaan Pengadaan Barang/Jasa');

		$pesan = 'Pengajuan Pengadaan berhasil diajukan ke Kasubag Pengelolaan Pengadaan Barang/Jasa';

		$this->pengajuan_m->UpdateProgress($ar_catatan['Id_Pengajuan_Pengadaan'], $ar_peng);

		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);
		

		$this->pengajuan_m->sendNotifToBySlug($ar_catatan['Id_Pengajuan_Pengadaan'], 'ksb_pel');


		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
		return redirect('kabag/pengajuan/');

	}
	

	public function submit_trc(){

		$arr['Progress'] = $this->input->post('Progress');


		$ar_catatan['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar_catatan['Isi'] = $this->input->post('Catatan');
		$ar_catatan['Slug_Jabatan'] = 'kabag';
		$ar_catatan['Slug_Jabatan_Target'] = 'ksb_pel';
		$this->db->insert('pengajuan_pengadaan_catatan', $ar_catatan);


		if ($arr['Progress'] == 'kabag_acc_trc'){
			$arr['Slug_Posisi'] = 'ksb_pel';
			$log = 'Kabag menerima permintaan TRC pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));
			$p = 'Pengajuan berhasil dikirim ke Kasubag Pengelolaan Pengadaan Barang/Jasa untuk TRC';
		}
		else{
			$arr['Slug_Posisi'] = 'pokja';
			$log = 'Kabag menolak permintaan TRC pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post("Id_Pengajuan_Pengadaan")));
			$p = 'Pengajuan berhasil dikembalikan ke POKJA';
		}
		
		$this->pengajuan_m->UpdateProgress($this->input->post('Id_Pengajuan_Pengadaan'), $arr);

		$this->pengajuan_m->sendNotifToBySlug($this->input->post('Id_Pengajuan_Pengadaan'), $arr['Slug_Posisi']);

		$this->user_m->createLog($log);
		
		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $p));

		return redirect('kabag/pengajuan/');
	}
}
