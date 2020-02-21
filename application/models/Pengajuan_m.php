<?php

// require 'PHPMailer_5.2.0/class.phpmailer.php';
include "PHPMailer-6.0.0/src/PHPMailer.php";
include "PHPMailer-6.0.0/src/SMTP.php";

class Pengajuan_m extends CI_Model{

	private $config_email = Array(
	  	'smtp_user' => 'email@gmail.com',
	  	'smtp_pass' => 'password',
	);

	public function getTelegramAPI(){
		//return '6d214bbe64fe1d790dae429cc86fc1ef';
		return '773744549:AAG3jQBuOyL3D2XlKParUAcFVRPGAsr3hog';
	}

	public function renderUrlByPin($pin){
		return '<a href="' . base_url('/home/pengajuan_pin/') . $pin .'">'.$pin.'</a>';
	}

	public function catatanPengajuan($Id_Pengajuan_Pengadaan){
		$d = $this->db->from("pengajuan_pengadaan_catatan")
				->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
				->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = pengajuan_pengadaan_catatan.Slug_Jabatan')
				->order_by("Pengajuan_Pengadaan_Catatan_Id", 'desc')
				->get()->result_array();
		return $d;
	}

	public function kelengkapanPengajuan($Id_Pengajuan_Pengadaan){
		$daftar_kelengkapan = $this->db->from('kelengkapan')->get()->result_array();

		foreach ($daftar_kelengkapan as $key => $value) {
			$id_kelengkapan = $value['Id_Kelengkapan'];

			$kelengkapan_pengajuan = $this->db->from('pengajuan_pengadaan_kelengkapan')
									->where('Id_Kelengkapan', $id_kelengkapan)
									->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
									->get()
									->row_array();



			// catatan oleh fo dan ksb_ren
			if (sizeof($kelengkapan_pengajuan) > 0){
				$daftar_kelengkapan[$key]['isian'] = $kelengkapan_pengajuan;
				$id_pengajuan_pengadaan_kelengkapan = $kelengkapan_pengajuan['Id_Pengajuan_Pengadaan_Kelengkapan'];
				// status jumlah catatan dari pokja
				$cat_pokja = $this->db->from('pengajuan_pengadaan_kelengkapan_catatan')
							->where('Id_Pengajuan_Pengadaan_Kelengkapan', $id_pengajuan_pengadaan_kelengkapan)
							->get()->num_rows();

				$daftar_kelengkapan[$key]['jumlah_cat_pokja'] = $cat_pokja;
			}



		}

		return $daftar_kelengkapan;

	}

	public function UpdateProgress($Id_Pengajuan_Pengadaan, $ar){
		$ar['Updated_At'] = date('Y-m-d h:i:s');
		$this->db->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan);
		return $this->db->update('pengajuan_pengadaan', $ar);
	}

	public function getNameJabatan($slug){
		return $this->db->from('jabatan_sistem')->where('Slug_Jabatan', $slug)->get()->row_array()['Nama_Jabatan'];
	}


	public function addNotif($Id_Pengajuan_Pengadaan, $id_user = false){

		$pengajuan_pengadaan = $this->db->from('pengajuan_pengadaan')->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)->get()->row_array();

		if ($id_user == false){
			$ar['Id_User'] = $pengajuan_pengadaan['Id_User'];
		}
		else{
			$ar['Id_User'] = $id_user;
		}

		$ar['Id_Pengajuan'] = $pengajuan_pengadaan['Id_Pengajuan_Pengadaan'];
		$ar['Progress'] = $pengajuan_pengadaan['Progress'];
		$this->db->insert('pengajuan_notif', $ar);

		$jabatan = $this->db->from('jabatan_sistem')->where('Slug_Jabatan', $pengajuan_pengadaan['Slug_Posisi'])->get()->row_array();

		$id_user = $ar['Id_User'];
		$pengguna = $this->db->from('user')->where('Id_User', $id_user)->get()->row_array();


		// notif config
		$this->load->model('config_m');
		$ar_progress = $this->config_m->proses_pengajuan();
		$full_progress = $ar_progress[$ar['Progress']];

		$text = 'Perbaruan Progress Pengajuan Pengadaan dengan pin '. $this->renderUrlByPin($pengajuan_pengadaan['PIN']);
		$text .= ' yang sekarang dalam proses <strong>' . $full_progress['isi'] .'</strong> pada akun <b>' . $jabatan['Nama_Jabatan'] .'</b>' ;



		// send to telegram

		if ($pengguna['No_Telegram'] != null){
			$chat_id = $pengguna['No_Telegram'];
			$url = implode('', array('https://api.telegram.org/bot', $this->getTelegramAPI(), '/sendMessage?chat_id=', $chat_id, '&parse_mode=HTML&text=', $text));
			//file_get_contents($url);
		}



		if ($pengguna['Email'] != null || $pengguna['Email'] != ''){
			$this->sendEmail($text, $pengguna['Email']);
		}


	}


	public function sendNotifToBySlug($id, $slug_jabatan){

		$pengajuan_pengadaan = $this->db->from('akses_pengadaan')->where('Pengajuan_Pengadaan_Id', $id)->get()->row_array();


		if ($slug_jabatan == 'pokja'){

			$user = $this->db->from('user')->where('Slug_Jabatan', $slug_jabatan)
					->where('Id_User', $pengajuan_pengadaan['User_Id'])
					->get()->result_array();
		}
		else{

			$user = $this->db->from('user')->where('Slug_Jabatan', $slug_jabatan)->get()->result_array();
		}



		foreach ($user as $key => $value) {
			$Id_User = $value['Id_User'];
			$this->addNotif($id, $Id_User);
		}
	}


	public function notifNotRead(){
		$this->load->model('user_m');
		$id_user = $this->user_m->getDetailLoginUser()['Id_User'];
		return $this->db->from('pengajuan_notif')->where('Id_User', $id_user)->where('IsRead', 0)->get()->result_array();
	}

	public function ambilNotif(){
		$this->load->model('user_m');
		$id_user = $this->user_m->getDetailLoginUser()['Id_User'];

		return $this->db->from('pengajuan_notif')
				->order_by('Created_At', 'desc')
				->where('Id_User', $id_user)->get()->result_array();
	}

	public function ambil_config_notif(){
		$this->load->model('config_m');
		return $this->config_m->proses_pengajuan();
	}

	public function reset_notif($Id_Pengajuan){

		$this->load->model('user_m');
		$id_user = $this->user_m->getDetailLoginUser()['Id_User'];

		$this->db->where('Id_Pengajuan', $Id_Pengajuan)->where('Id_User', $id_user);
		return $this->db->update('pengajuan_notif', array('IsRead' => 1));
	}


	public function sendEmail($message, $emailUser, $subject = 'Perbaharuan Proses Pengajuan'){

		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->SMTPAuth   = true;
		$mail->Port       = 587;
		$mail->Host       = "tls://smtp.gmail.com";
		$mail->Username = $this->config_email['smtp_user'];
		$mail->Password = $this->config_email['smtp_pass'];
		$mail->setFrom('email@gmail.com', 'BLP Provinsi Bali');
		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $message;
		$mail->addAddress($emailUser);
		return $mail->send();

	}





	public function sendNotifToUser($pengajuan_id, $slug_jabatan, $f = false){
		$pengajuan_pengadaan = $this->db->from('pengajuan_pengadaan')->where('Id_Pengajuan_Pengadaan', $pengajuan_id)->get()->row_array();

		$message = 'Perbaharuan progres dari pengajuan dengan nomor pin #' + $pengajuan_pengadaan['PIN'];

		if ($f){
			$message = 'Pengajuan Pengadaan baru masuk';
		}

		$user = $this->db->from('user')->where('Slug_Jabatan', $slug_jabatan)->get()->result_array();
		foreach ($user as $key => $value) {
			$email = $value['Email'];
			$this->sendEmail($message, $email);
		}
	}


	public function sendNotifEmailToPPk($pengajuan){
		$skpd = $this->db->from('master_skpd')->join('user', 'user.Master_Skpd_Id = master_skpd.Master_Skpd_Id')
						->where('Id_User', $pengajuan['id_pengaju'])->get()->row_array();


		if ($pengajuan['Email'] == null){
			return true;
		}

		$message = "Pengajuan pengadaan anda dengan detail sbb : \n
					Nama Kegiatan \t: ".$pengajuan['Nama_Kegiatan']."\n
				 Sudah diterima front office BLP Bangli. No Tiket anda adalah ".$this->renderUrlByPin($pengajuan['PIN']) . "\nKami sesegera mungkin akan memproses dan memberikan informasi kembali jika ada berkas yang harus diperbaiki. Mohon selalu memeriksa email anda untuk mendapat informasi lebih lanjut. Terima Kasih\n
\n
Hormat Kami\n
\n
BLP Kabupaten Bangli";

		return $this->sendEmail($message, $pengajuan['Email'], 'Pengajuan Pengadaan no tiket '.$pengajuan['PIN'].' telah terkirim Yth. '.$pengajuan['Nama_Lengkap']. ' '. $skpd['Nama_Skpd']);

	}


	public function getPIN($id_pengajuan){
		$pengajuan = $this->db->from('pengajuan_pengadaan')->where('Id_Pengajuan_Pengadaan', $id_pengajuan)->get()->row_array();
		return $pengajuan['PIN'];
	}


	public function createVerifikasiToken($id_pengajuan){
		return substr(md5($this->getPIN($id_pengajuan) . date('Y-m-d')), 8);
	}


	public function show_bulan() {
        $data = array();
        $data['0'] = '-- Pilih Bulan --';
        $data['1'] = 'Januari';
        $data['2'] = 'Pebruari';
        $data['3'] = 'Maret';
        $data['4'] = 'April';
        $data['5'] = 'Mei';
        $data['6'] = 'Juni';
        $data['7'] = 'Juli';
        $data['8'] = 'Agustus';
        $data['9'] = 'September';
        $data['10'] = 'Oktober';
        $data['11'] = 'November';
        $data['12'] = 'Desember';
        return $data;
    }

	//menamiplkan data where nama kolom
    public function get_data_where($table, $column, $id) {
        $this->db->from($table);
        $this->db->where($column, $id);
        $query = $this->db->get();
        return $query;
    }


}
