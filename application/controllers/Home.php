<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pengajuan_m');
	}

	public function send(){
		echo file_get_contents('https://api.telegram.org/bot348103823:AAHFZlpeEOXhAwZvnMJl-kHxZTr4umokb-s/getUpdates');
	}
	
	public function getNamaBulan($yearMonth){
		$aa = explode('-', $yearMonth);
		$mon = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

		return $mon[(int)$aa[1]] .' '.$aa[0];
	}

	public function login(){

		// $monthBefore = strtotime("-8 month");
		// $monthBefore = date('Y-m', $monthBefore);
		// $monthNow = date('Y-m');

		// $start    = (new DateTime($monthBefore))->modify('first day of this month');
		// $end      = (new DateTime($monthNow))->modify('first day of next month');
		// $interval = DateInterval::createFromDateString('1 month');
		// $period   = new DatePeriod($start, $interval, $end);

		// $ar = array();

		// foreach ($period as $dt) {

		// 	$mm = $dt->format("Y-m");
		// 	$dbData = $this->db->from('pengajuan_pengadaan')
		// 			->where("(SUBSTRING(Created_At, 1, 7) = '$mm')")->get();

		//     $ar[$this->getNamaBulan($dt->format("Y-m"))] = $dbData->num_rows();
		// }

		// $data['ar'] = $ar;
		// return view('login', $data);
		return view('login');
	}

	public function homePage(){
		return view('homePage');
	}

	public function loginAction(){
		if ($this->user_m->auth($this->input->post('Username'), $this->input->post('Password'))){
			$this->user_m->createLog('Login ke sistem');
			return redirect('/');
		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Maaf, kombinasi username dan password salah'));		

			return redirect('/login');
		}
	}

	public function logout(){

		$this->db->where('Id_User', $this->user_m->getDetailLoginUser()['Id_User']);
		$this->db->update('user', array('Last_Logout' => date('Y-m-d h:i:s')));

		$this->user_m->createLog('Logout dari sistem');

	    $sess_array = array();
	    $this->session->unset_userdata('userLogin', $sess_array);
	    
	    redirect('login');
	}


	public function index(){
		$this->user_m->checkLogin();
		$user = $this->user_m->getDetailLoginUser();

		$view_to_load = $user['Slug_Jabatan'].'/dashboard';

		$ar['user'] = $user;
		
		$ar['url_datatable'] = base_url('ajax/ambilpengajuan/'. $ar['user']['Slug_Jabatan']);

		$data['konten'] = view($view_to_load, $ar, true);

		return view('templates/head', $data);

	}

	public function profil(){
		$this->user_m->createLog('Masuk ke halaman profil');

		$user = $this->user_m->getDetailLoginUser();
		$ar['user'] = $user;
		$data['konten'] = view('universal/profil', $ar, true);
		return view('templates/head', $data);
		
	}

	public function profilEdit(){
		$user = $this->user_m->getDetailLoginUser();
		$id_user = $user['Id_User'];

		$ar['Username'] = $this->input->post('Username');
		$ar['Nama_Lengkap'] = $this->input->post('Nama_Lengkap');
		$ar['NIP_User'] = $this->input->post('NIP_User');
		$ar['No_Hp_User'] = $this->input->post('No_Hp_User');
		$ar['Email'] = $this->input->post('Email');
		$ar['No_WA'] = $this->input->post('No_WA');
		$ar['No_Telegram'] = $this->input->post('No_Telegram');

		$this->db->where('Id_User', $id_user);
		if ($this->db->update('user', $ar)){

			$this->user_m->createLog('Mengedit profil user');

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Data user berhasil diubah'));		

		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Update gagal dilakukan silahkan gunakan nama user lain'));		
		}
	    redirect('profil');

	}
	

	public function passwordUbah(){
		$Password_n = $this->input->post('Password_n'); 
		$Password_k = $this->input->post('Password_k'); 
		$Password_l = $this->input->post('Password_l'); 
		$user = $this->user_m->getDetailLoginUser();
		
		if ($Password_k != $Password_n){
			
			$this->session->set_flashdata('pesan_pas', array('tipe' => 'danger', 'isi' => 'Password dan Konfirmasi Password tidak cocok'));
		}
		else if (enc($Password_l) != $user['Password']){
			$this->session->set_flashdata('pesan_pas', array('tipe' => 'danger', 'isi' => 'Password lama tidak cocok'));
		}
		else{

			$this->user_m->createLog('Melakukan perubahan password');

			$ar['Password'] = enc($Password_n);
			$this->db->where('Id_User', $user['Id_User']);
			$this->db->update('user', $ar);
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Password berhasil diubah'));

		}

	    redirect('profil');

	}

	public function logActivity(){

		$this->user_m->createLog('Masuk ke halaman log activity');

		$user = $this->user_m->getDetailLoginUser();

		$ar['user'] = $user;

		$data['konten'] = view('universal/log', $ar, true);
		return view('templates/head', $data);

	}


    public function downloadLembarVerifikasi($pin){

    	$pengajuan = $this->db->select('*, pengajuan_pengadaan.Id_User AS id_pengaju')->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('PIN', $pin)
					// ->where('pengajuan_pengadaan.Id_User', $this->userLogin['Id_User'])
					->get()->row_array();

					
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['pengajuan'] = $pengajuan;


		$this->user_m->createLog('Mendownload lembar verifikasi pengajuan dengan pin '. $pengajuan['PIN']);


		$ar['skpd'] = $this->db->from('master_skpd')->join('user', 'user.Master_Skpd_Id = master_skpd.Master_Skpd_Id')
						->where('Id_User', $pengajuan['id_pengaju'])->get()->row_array();

		$v =  view('templates/pdf/lembarVerifikasi', $ar, true);

		$filename = 'lembar-verifikasi';
        pdf_create($v, $filename, 'F4', 'portrait');
    }



	public function dwnSuratTugasPokja($Id_Pengajuan_Pengadaan){

		$nomor = $this->input->get('nomor');

    	$pengajuan = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->get()->row_array();

		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['pengajuan'] = $pengajuan;
		$ar['nomor'] = $pengajuan['Surat_Tugas_Pokja'];

		$ar['kabag_peng'] = $this->db->from('user')->where('Id_User', $pengajuan['Id_Kabag'])->get()->row_array();

		$v =  view('templates/pdf/suratTugasPokja', $ar, true);


		$this->user_m->createLog('Mengunduh surat tugas untuk POKJA '. $pengajuan['PIN']);


		$filename = 'surat-tugas-pokja';
        pdf_create($v, $filename, 'F4', 'portrait');

	}


	public function pengajuan_pin($pin){
		$this->user_m->checkLogin();
		$pengajuan = $this->db->from('pengajuan_pengadaan')->where('PIN', $pin)->get()->row_array();
		$user = $this->user_m->getDetailLoginUser();
		if (sizeof($pengajuan) == 0){
			echo '<h2>Data yang anda cari tidak ditemukan</h2>';
		}
		else{
			return redirect($user['Slug_Jabatan'].'/pengajuan/'. $pengajuan['Id_Pengajuan_Pengadaan']);
		}
	}

}
