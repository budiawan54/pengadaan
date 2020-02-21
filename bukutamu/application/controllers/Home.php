<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}


	public function index(){

		$this->user_m->checkLogin('bukutamu');

		$data['konten'] = view('user/index', array(), true);

		return view('templates/front', $data);
	}



	public function login(){

		$data['konten'] = view('user/login', array(), true);

		return view('templates/isi', $data);
	}



	public function loginAction(){

		if ($this->user_m->auth($this->input->post('Username'), $this->input->post('Password'))){


			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Login berhasil, Selamat Datang di Buku Tamu Bagian Layanan Pengadaan Buleleng'));	


			$user = $this->user_m->getDetailLoginUser();

			if ($user['Slug_Jabatan'] == 'bukutamu'){
				return redirect('/home');
			}
			else{
				return redirect('/bukutamu/lihat');
			}
		}
		else{

			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Maaf, kombinasi username dan password salah'));		
			return redirect('/login');
		}
	}

	public function logout(){

		$this->db->where('Id_User', $this->user_m->getDetailLoginUser()['Id_User']);
		$this->db->update('user', array('Last_Logout' => date('Y-m-d h:i:s')));


	    $sess_array = array();
	    $this->session->unset_userdata('userLogin', $sess_array);
	    
	    redirect('login');
	}

	
	public function profil(){

		$this->user_m->checkLogin();


		$user = $this->user_m->getDetailLoginUser();
		$ar['user'] = $user;
		$data['konten'] = view('universal/profil', $ar, true);
		return view('templates/isi', $data);
		
	}



	public function profilEdit(){
		
		$this->user_m->checkLogin();

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

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Data user berhasil diubah'));		

		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'danger', 'isi' => 'Update gagal dilakukan silahkan gunakan nama user lain'));		
		}
	    redirect('home/profil');

	}
	

	public function passwordUbah(){

		$this->user_m->checkLogin();

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


			$ar['Password'] = enc($Password_n);
			$this->db->where('Id_User', $user['Id_User']);
			$this->db->update('user', $ar);
			$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Password berhasil diubah'));

		}

	    redirect('home/profil');

	}



	public function isiBukuTamu(){

		$this->user_m->checkLogin('bukutamu');

		$ar['user'] = $this->db->from('jabatan_sistem')->where('status', 1)->get()->result_array();
		$ar['master_skpd'] = $this->db->from('master_skpd')->get()->result_array();

		$data['konten'] = view('user/isi_buku_tamu', $ar, true);

		return view('templates/isi', $data);
	}

	public function submitIsiBukuTamu(){

		$this->user_m->checkLogin('bukutamu');


		$ar['nama'] = $this->input->post('nama');
	    $ar['nip_noktp'] = $this->input->post('nip_noktp');
	    $ar['instansi'] = $this->input->post('instansi');
	    $ar['jenis'] = $this->input->post('jenis');
	    $ar['no_telp'] = $this->input->post('no_telp');
	    $ar['email'] = $this->input->post('email');
	    $ar['kode'] = $this->buku_tamu->ambilKode();
	    $ar['unit_tujuan'] = $this->input->post('unit_tujuan');
	    $ar['keperluan'] = $this->input->post('keperluan');
	    $ar['foto'] = $this->input->post('photo');
	    $ar['Master_Skpd_Id'] = $this->input->post('Master_Skpd_Id');
	    $ar['no_urut'] = $this->buku_tamu->getNoUrutHariIni($this->input->post('unit_tujuan'));
	    	

	    if($this->db->insert('buku_tamu', $ar)){
	    	$ar['mengantri'] = $this->buku_tamu->ambilJumlahAntrian($this->input->post('unit_tujuan')) - 1;
	    	$data['konten'] = view('user/berhasil_buku_tamu', $ar, true);
			return view('templates/isi', $data);

	    }
	    else{
	    	return redirect('bukutamu/isi');
	    }

	}

	public function lihatBukuTamu(){
		
		$this->user_m->checkLogin();


		$data['user'] = $this->user_m->getDetailLoginUser();
		
		$data['jmlAntrian'] = $this->db->from('buku_tamu')
								->where('unit_tujuan', $data['user']['Slug_Jabatan'])
								->where('SUBSTR(created_at, 1, 10) = ', date('Y-m-d'))
								->where_in('status', array('mengantri', 'pending'))
								->get()->num_rows();
		$data['master_skpd'] = $this->db->from('master_skpd')->get()->result_array();

		$data['jabatan_sistem'] = $this->db->from('jabatan_sistem')
									->where('status', 1)
									->where('Slug_Jabatan <>', $data['user']['Slug_Jabatan'])
									->get()->result_array();


		$ar['konten'] = view('user/lihat_buku_tamu', $data, true);
		return view('templates/isi', $ar);

	}


	public function masukanrespon(){

		$this->user_m->checkLogin('bukutamu');

		$ar['rating'] = $this->input->post('rating');
		$ar['isi_respon'] = $this->input->post('isi_respon');


		$this->db->insert('kepuasan', $ar);

		$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Respon pelayanan berhasil disimpan'));
		return redirect('bukutamu/isi');
	}


	public function disposisiBukuTamu(){

		$this->user_m->checkLogin();

		$id_buku_tamu = $this->input->post('id_buku_tamu');


		$this->db->where('id_buku_tamu', $id_buku_tamu);
		$this->db->update('buku_tamu', array('unit_tujuan' => $this->input->post('target_disposisi')));
		$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Pengunjung berhasil didisposisi'));
		return redirect('bukutamu/lihat');
	}

	public function simpanEditStatusPengunjung(){
		
		$this->user_m->checkLogin();


		$this->db->where('id_buku_tamu', $this->input->post('id_buku_tamu'));
		$this->db->update('buku_tamu', array('status' => $this->input->post('status')));
		$this->session->set_flashdata('pesan', array('tipe' => 'info', 'isi' => 'Status pengujung berhasil disimpan'));
		return redirect('bukutamu/lihat');
	}

	public function simpanEditDetailPengunjung(){
		$this->db->where('id_buku_tamu', $this->input->post('id_buku_tamu'));

		$ar['nama'] = $this->input->post('nama');
	    $ar['nip_noktp'] = $this->input->post('nip_noktp');
	    $ar['instansi'] = $this->input->post('instansi');
	    $ar['no_telp'] = $this->input->post('no_telp');
	    $ar['email'] = $this->input->post('email');
	    $ar['unit_tujuan'] = $this->input->post('unit_tujuan');
	    $ar['keperluan'] = $this->input->post('keperluan');
	    $ar['catatan'] = $this->input->post('catatan');

		$this->db->update('buku_tamu', $ar);
		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Catatan pengujung berhasil disimpan'));
		return redirect('bukutamu/lihat');
	}


	public function cetakBukuTamu($tgl){

		$this->user_m->checkLogin();

		$user = $this->user_m->getDetailLoginUser();
		
		$q = $this->db->select('nama, instansi, unit_tujuan, catatan, Nama_Jabatan, foto')
							->from('buku_tamu')
							->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = buku_tamu.unit_tujuan')
							->order_by('created_at', 'asc')
							->where('SUBSTR(created_at, 1, 10) = ', $tgl);

		if ($user['Slug_Jabatan'] == 'admin'){

		}
		else{
			$q = $q->where('unit_tujuan', $user['Slug_Jabatan']);
		}


		$data['buku_tamu'] = $q->get()->result_array();

		

		$v =  view('cetakbukutamu', $data, true);

		$filename = 'buku-tamu';
        pdf_create($v, $filename, 'F4', 'landscape');
	}


	public function cetakBukuTamuBulan(){

		$this->user_m->checkLogin();


		function convertTgl($tgl){
		    $ar_tgl = explode(' - ', $tgl);

		    $mulai = explode('/',$ar_tgl[0]);
		    $selesai = explode('/',$ar_tgl[1]);
		    
		    $ar['mulai'] = $mulai[0].'-'.$mulai[1].'-'.$mulai[2];

		    $ar['selesai'] = $selesai[0].'-'.$selesai[1].'-'.$selesai[2];
		    
		    
		    return $ar;
		}





		$data['tanggal'] = $this->input->post('tanggal');


		$tgl_ar_hasil = convertTgl($data['tanggal']);



		$id_skpd = $this->input->post('Master_Skpd_Id');

		$user = $this->user_m->getDetailLoginUser();
		
		$q = $this->db->select('nama, instansi, unit_tujuan, keperluan, Nama_Jabatan, buku_tamu.jenis, buku_tamu.created_at, foto')
							->from('buku_tamu')
							->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = buku_tamu.unit_tujuan', 'left')
							->order_by('created_at', 'asc')
							->where('SUBSTR(created_at, 1, 10) >= ', $tgl_ar_hasil['mulai'])
							->where('SUBSTR(created_at, 1, 10) <= ', $tgl_ar_hasil['selesai']);



		$data['nama_skpd'] = ''; 

		if ($id_skpd != NULL && $id_skpd != 'Semua') {
			$q = $q->where('Master_Skpd_Id', $id_skpd);
	        
		}


		// if ($user['Slug_Jabatan'] == 'admin'){

		// }
		// else{
		// 	$q = $q->where('unit_tujuan', $user['Slug_Jabatan']);
		// }



		$data['buku_tamu'] = $q->get()->result_array();

		
		if($id_skpd != NULL){
		 	$skpd = $this->db->from('master_skpd')->where('Master_Skpd_Id', $id_skpd)->get()->row_array();
	        $data['nama_skpd'] = $skpd['Nama_Skpd'];
		}

		$v =  view('cetakbukutamu', $data, true);

		$filename = 'buku-tamu';
        pdf_create($v, $filename, 'F4', 'landscape');
	}


	public function respon(){

		$this->user_m->checkLogin();


		$ar['konten'] = view('user/lihat_respon_pengunjung', [], true);
		return view('templates/isi', $ar);
	}


	public function cetak_single_buku($id_buku_tamu){
		$data['buku'] = $this->db->from('buku_tamu')->where('id_buku_tamu', $id_buku_tamu)
						->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = buku_tamu.unit_tujuan')
						->get()->row_array();

		$data['nama_skpd'] = ''; 

		if ($data['buku']['Master_Skpd_Id'] != NULL){
		        $skpd = $this->db->from('master_skpd')->where('Master_Skpd_Id', $data['buku']['Master_Skpd_Id'])->get()->row_array();
		        $data['nama_skpd'] = $skpd['Nama_Skpd'];
		}
		else{
			$data['nama_skpd'] = '';
		}

        
        $v = 'cetak_bukutamu_detail';

        $v =  view($v, $data, true);

		$filename = 'buku-tamu-detail';
        pdf_create($v, $filename, 'F4', 'landscape');

	}
}

