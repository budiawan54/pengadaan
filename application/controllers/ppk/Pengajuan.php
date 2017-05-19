<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	private $userLogin;


	function __construct()
	{
		parent::__construct();
		
		$this->user_m->checkLogin('ppk');
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');

		$this->userLogin = $this->user_m->getDetailLoginUser();
		
	}

	public function add(){
		$this->user_m->createLog('Masuk ke halaman tambah pengajuan');

		$ar['kelengkapan'] = $this->db->from('kelengkapan')->get()->result_array();
		$data['konten'] = view('ppk/pengajuan/add', $ar, true);
		return view('templates/head', $data);
	
	}

	public function storeAdd(){
		
		$data = $this->input->post(NULL, TRUE);		
		$data['Id_User'] = $this->user_m->getDetailLoginUser()['Id_User'];
		$request = array_exc($data, array('fileUpload', 'tipe', 'Catatan', 'Keterangan_File', 'chc'));

		$kabag_active = $this->user_m->getActiveByJabatan('kabag'); 
		$ksb_ren_active = $this->user_m->getActiveByJabatan('ksb_ren'); 
		
		$request['Progress'] = 'fo';
		$request['Slug_Posisi'] = 'fo';
		$request['PIN'] = getPIN();
		$request['Id_Kabag'] = $kabag_active['Id_User'];
		$request['Id_Ksb_Ren'] = $ksb_ren_active['Id_User'];

		$pesan = 'Data berhasil dikirim ke Frontoffice';


		$this->user_m->createLog('Mengajukan pengadaan baru dengan pin ' 
			. $this->pengajuan_m->renderUrlByPin($request['PIN']));

		$insertPengajuan = $this->db->insert('pengajuan_pengadaan', $request);
		$id = $this->db->insert_id();

		if ($insertPengajuan){
			
			$this->_uploadBerkasKelengkapan($id);


			$catatan = $this->input->post('Catatan');
			if ($catatan != ''){
				$this->db->insert('pengajuan_pengadaan_catatan', array('Id_Pengajuan_Pengadaan' => $id, 'isi' => $catatan, 'Slug_Jabatan' => 'ppk', 'Slug_Jabatan_Target' => 'fo'));
			}
			

			// kirim pesan ke PPK
			$pengajuan = $this->db->select('*, pengajuan_pengadaan.Id_User AS id_pengaju')
						->from('pengajuan_pengadaan')
						->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
						->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
						->where('pengajuan_pengadaan.Deleted_At', null)
						->where('Id_Pengajuan_Pengadaan', $id)
						->get()->row_array();
						
			$this->pengajuan_m->sendNotifEmailToPPk($pengajuan);

			$this->pengajuan_m->sendNotifToBySlug($id, 'fo');

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => $pesan));		
					
			return redirect('ppk/pengajuan/'.$id);

		}
		else{
			$this->session->set_flashdata('pesan', array('tipe' => 'warning', 'isi' => 'Maaf, terjadi kesalahan sistem'));		
			return redirect('ppk/pengajuan');
		}
	}



	private function _getKeyUpload($file){
		$a = $file['name'];
		$b = array();
		foreach ($a as $key => $value) {
			$b[] = $key;
		}
		return $b;
	}

	private function _uploadBerkasKelengkapan($Id_Pengajuan_Pengadaan){
		
		$targetFolder = './storage/kelengkapan/';
			

		// foreach ($this->input->post('chc') as $key => $value) {
		// 	$Id_Kelengkapan = $key;

		// 	if (isset($_FILES['fileUpload']['name'][$key]) && $_FILES['fileUpload']['name'][$key] != ''){

		// 		$path        = $_FILES['fileUpload']['name'][$key];
		// 		$ext         = pathinfo($path, PATHINFO_EXTENSION);
		// 		$tmpFilePath = $_FILES['fileUpload']['tmp_name'][$key];
		// 		$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;

		// 		if (move_uploaded_file($tmpFilePath, $targetFolder.$newFileName)){
		// 			$ar['Nama_File']              = $newFileName;
		// 		}
		// 	}

		// 	$ar['Id_Kelengkapan']         = $Id_Kelengkapan;
		// 	$ar['Id_Pengajuan_Pengadaan'] = $Id_Pengajuan_Pengadaan;
		// 	$ar['Keterangan_File']        = $this->input->post('Keterangan_File')[$key];
		// 	$this->db->insert('pengajuan_pengadaan_kelengkapan', $ar);
		// 	unset($ar);
		// }


		$arI          = $this->_getKeyUpload($_FILES['fileUpload']);

		foreach ($arI as $key => $value) {
			$path        = $_FILES['fileUpload']['name'][$value];
			$ext         = pathinfo($path, PATHINFO_EXTENSION);
			$tmpFilePath = $_FILES['fileUpload']['tmp_name'][$value];
			$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;

			if (move_uploaded_file($tmpFilePath, $targetFolder.$newFileName)){
				$ar['Id_Kelengkapan']         = $value;
				$ar['Nama_File']              = $newFileName;
				$ar['Id_Pengajuan_Pengadaan'] = $Id_Pengajuan_Pengadaan;
				$this->db->insert('pengajuan_pengadaan_kelengkapan', $ar);
			}
		}
	}

	
	public function daftarPengajuan(){

		$this->user_m->createLog('Membuka halaman daftar pengajuan');

		$a['url_datatable'] = base_url('ajax/ambilpengajuan/ppk');
		
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
					->where('pengajuan_pengadaan.Id_User', $this->userLogin['Id_User'])
					->get()->row_array();


		$ar['userLogin'] = $this->userLogin;
		$ar['pengajuan'] = $pengajuan;
		$ar['catatan'] = $this->pengajuan_m->catatanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);

		$data['konten'] = view('universal/detail_pengadaan', $ar, true);
		
		$this->user_m->createLog('Membuka halaman detail pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($pengajuan['PIN']));
		
		return view('templates/head', $data);

	}


	public function editPengajuan($Id_Pengajuan_Pengadaan){
		$ar['pengajuan'] = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('pengajuan_pengadaan.Deleted_At', null)
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->where('pengajuan_pengadaan.Id_User', $this->userLogin['Id_User'])
					->get()->row_array();
		
		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($Id_Pengajuan_Pengadaan);

		$this->user_m->createLog('Membuka halaman edit pengajuan dengan pin '. $this->pengajuan_m->renderUrlByPin($ar['pengajuan']['PIN']));


		$data['konten'] = view('ppk/pengajuan/edit', $ar, true);
		return view('templates/head', $data);
	}

	public function submitEditPengajuan($Id_Pengajuan_Pengadaan){

		$data = $this->input->post(NULL, TRUE);
		$request = array_exc($data, array('fileUpload', 'tipe', 'Catatan', 'Keterangan_File', 'chc'));
		$this->db->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan);
		$this->db->update('pengajuan_pengadaan', $request);

		$this->user_m->createLog('Menyimpan perubahan pengajuan pengadaan pin '. $request['PIN']);

		/**
		 * UPDATE FILE UPLOAD
		 * @var string
		 */
		$targetFolder = './storage/kelengkapan/';
		$arI          = $this->_getKeyUpload($_FILES['fileUpload']);
		
		foreach ($arI as $key => $value) {
			$path        = $_FILES['fileUpload']['name'][$value];
			$ext         = pathinfo($path, PATHINFO_EXTENSION);
			$tmpFilePath = $_FILES['fileUpload']['tmp_name'][$value];
			$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;

			if (move_uploaded_file($tmpFilePath, $targetFolder.$newFileName)){
				$ar['Id_Kelengkapan']         = $value;
				$ar['Nama_File']              = $newFileName;
				$ar['Id_Pengajuan_Pengadaan'] = $Id_Pengajuan_Pengadaan;

				$data_kelengkapan_item_per_id = $this->db->from('pengajuan_pengadaan_kelengkapan')
												->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
												->where('Id_Kelengkapan', $value)->get()->row_array();

				if (sizeof($data_kelengkapan_item_per_id) == 0){
					$this->db->insert('pengajuan_pengadaan_kelengkapan', $ar);
				}
				else{
					$this->db->where('Id_Pengajuan_Pengadaan_Kelengkapan', $data_kelengkapan_item_per_id['Id_Pengajuan_Pengadaan_Kelengkapan']);
					$this->db->update('pengajuan_pengadaan_kelengkapan', $ar);
				}
			}
		}

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Data pengajuan berhasil diubah'));		
				
		return redirect('ppk/pengajuan/'.$Id_Pengajuan_Pengadaan);

	}




	public function kirimKeFo(){

		$ar['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar['Slug_Jabatan'] = 'ppk';
		$ar['Slug_Jabatan_Target'] = 'fo';

		$ar['Isi'] = $this->input->post('Catatan');
		$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'fo');


		// $this->pengajuan_m->UpdateProgress($ar['Id_Pengajuan_Pengadaan'], array('Progress' => 'fo', 'Slug_Posisi' => 'fo', 'File_Verifikasi' => $this->_uploadLembarVerifikasi()));
		$this->pengajuan_m->UpdateProgress($ar['Id_Pengajuan_Pengadaan'], array('Progress' => 'fo', 'Slug_Posisi' => 'fo'));

		$this->db->insert('pengajuan_pengadaan_catatan', $ar);

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan Pengadaan berhasil dikirim ke Frontoffice'));		


		$this->user_m->createLog('Mengirim pengajuan pengadaan ke FO dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($this->input->post['Id_Pengajuan_Pengadaan'])));

		return redirect('ppk/pengajuan/'.$Id_Pengajuan_Pengadaan);
	}


	// ga pakek
	private function _uploadLembarVerifikasi(){
		$dir = './storage/lembarverifikasi/';

		$path        = $_FILES['fileUpload']['name'];
		$ext         = pathinfo($path, PATHINFO_EXTENSION);
		$tmpFilePath = $_FILES['fileUpload']['tmp_name'];
		$newFileName = rand().'_'.sha1(basename($path)).'.'.$ext;

		if (move_uploaded_file($tmpFilePath, $dir.$newFileName)){
			return $newFileName;
		}
		return '';
	}

	public function kirim_ke_pokja(){

		$ar['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
		$ar['Slug_Jabatan'] = 'ppk';
		$ar['Slug_Jabatan_Target'] = 'pokja';
		$ar['Isi'] = $this->input->post('Catatan');

		$this->pengajuan_m->UpdateProgress($ar['Id_Pengajuan_Pengadaan'], array('Progress' => 'lelang', 'Slug_Posisi' => 'pokja'));



		$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'pokja');


		$this->db->insert('pengajuan_pengadaan_catatan', $ar);

		$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan Pengadaan berhasil dikirim ke POKJA'));

		$this->user_m->createLog('Mengirim perubahan pengajuan pengadaan ke Pokja dengan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($ar['Id_Pengajuan_Pengadaan'])));

		return redirect('ppk/pengajuan/'.$Id_Pengajuan_Pengadaan);
	}


	public function ajaxEdit(){
        $tb = $this->input->post('name');
        $id = $this->input->post('pk');
        $value = $this->input->post('value');

        $tb_ar = explode('|', $tb);
        $table = $tb_ar[0];
        $primary = $tb_ar[1];
        $field  = $tb_ar[2];

        $arData = array(
                $field => $value
            );

        $this->db->where($primary, $id);
        $this->db->update($table, $arData);
    }
    
    //ga pakek
    public function downloadLembarVerifikasi($Id_Pengajuan_Pengadaan){
    	$pengajuan = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->where('pengajuan_pengadaan.Id_User', $this->userLogin['Id_User'])
					->get()->row_array();

		$ar['kelengkapan'] = $this->pengajuan_m->kelengkapanPengajuan($pengajuan['Id_Pengajuan_Pengadaan']);
		$ar['pengajuan'] = $pengajuan;


		$v =  view('templates/pdf/lembarVerifikasi', $ar, true);

		$filename = 'lembar-verifikasi';
        pdf_create($v, $filename, 'F4', 'portrait');
    }


    public function cetakHasilPokja($Id_Pengajuan_Pengadaan){
    	$ar['pengajuan'] = $this->db->from('pengajuan_pengadaan')
					->join('jabatan_sistem', 'pengajuan_pengadaan.Slug_Posisi = jabatan_sistem.Slug_Jabatan')
					->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User')
					->where('Id_Pengajuan_Pengadaan', $Id_Pengajuan_Pengadaan)
					->where('pengajuan_pengadaan.Id_User', $this->userLogin['Id_User'])
					->get()->row_array();

		$ar['pokja'] = $this->db->from('user')->where('Id_User', $ar['pengajuan']['Id_Pokja'])->get()->row_array();

		$this->user_m->createLog('Mencetak hasil dari pokja dengan pengajuan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($ar['Id_Pengajuan_Pengadaan'])));


		$this->load->library('ciqrcode');

		//qrcode
		$qrname = './storage/code/'.$ar['pengajuan']['PIN'].'.png';
		$params['data'] = $ar['pengajuan']['PIN'];
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = $qrname;
		$this->ciqrcode->generate($params);

		$imtype = pathinfo($qrname, PATHINFO_EXTENSION);
		$imdata = file_get_contents($qrname);
		$ar['base64'] = 'data:image/' . $imtype . ';base64,' . base64_encode($imdata);

		$v =  view('templates/pdf/hasilpokja', $ar, true);


		$filename = 'hasil-lelang-pokja-'.$ar['pengajuan']['PIN'];
        pdf_create($v, $filename, 'F4', 'portrait');

    }


    public function batalPengajuanStore(){

    	$pas = $this->input->post('Password');
    	$ar['Id_Pengajuan_Pengadaan'] = $this->input->post('Id_Pengajuan_Pengadaan');
    	
    	if (enc($pas) == $this->userLogin['Password']){

			$this->pengajuan_m->UpdateProgress($ar['Id_Pengajuan_Pengadaan'], array('Progress' => 'batal', 'Slug_Posisi' => 'ppk'));

			$ar['Slug_Jabatan'] = 'ppk';
			$ar['Slug_Jabatan_Target'] = 'fo';
			$ar['Isi'] = $this->input->post('Catatan');
			$this->db->insert('pengajuan_pengadaan_catatan', $ar);

			$this->user_m->createLog('PPK membatalkan pengajuan dengan pin'. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($ar['Id_Pengajuan_Pengadaan'])));

			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'fo');
			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'ksb_ren');
			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'ksb_pel');
			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'monev');
			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'pokja');
			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'ksb_ren');
			$this->pengajuan_m->sendNotifToBySlug($ar['Id_Pengajuan_Pengadaan'], 'kabag');

			$this->session->set_flashdata('pesan', array('tipe' => 'success', 'isi' => 'Pengajuan berhasil dibatalkan'));

    	} 
    	else{

			$this->user_m->createLog('PPK membatalkan pengajuan namun salah input password dengan pengajuan pin '. $this->pengajuan_m->renderUrlByPin($this->pengajuan_m->getPIN($ar['Id_Pengajuan_Pengadaan'])));

			$this->session->set_flashdata('pesan', array('tipe' => 'error', 'isi' => 'Maaf, password yang anda masukan salah'));
    	}

    	return redirect('ppk/pengajuan/' . $ar['Id_Pengajuan_Pengadaan']);

    }
}
