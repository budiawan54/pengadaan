<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {

    private $userLogin;

    function __construct() {
        parent::__construct();

        $this->user_m->checkLogin('ppk');
        $this->load->model('pengajuan_m');
        $this->load->model('user_m');
        $this->load->model('Realisasi_m','realisasi');
        $this->userLogin = $this->user_m->getDetailLoginUser();
    }

    public function index() {
        $data['realisasi']= $this->db->from('realisasi')->get()->result_array();
        $data['konten'] = view('ppk/realisasi/daftar_realisasi', $data, true);
        return view('templates/head', $data);
    }

    public function add() {
        //$this->user_m->createLog('Masuk ke halaman tambah pengajuan');
        //$ar['kelengkapan'] = $this->db->from('kelengkapan')->get()->result_array();
        $tampil['bulan'] = $this->pengajuan_m->show_bulan();
        $data['konten'] = view('ppk/realisasi/add',$tampil, true);
        return view('templates/head', $data);
    }

    //tampil data lelang
    public function tampil_data_lelang() {
        $lelang = $this->security->xss_clean($this->input->post('lelang', TRUE));
        $tahun  = $this->security->xss_clean($this->input->post('tahun', TRUE));
        $bulan  = $this->security->xss_clean($this->input->post('bulan', TRUE));
        $data = array();
        $url = 'https://inaproc.lkpp.go.id/isb/api/0ce36ab5-a795-4c60-be59-92a6d7ef4ef8/json/22113253/LelangSelesaiSPSELPSE/tipe/4:4:4/parameter/'.$tahun.':'.$bulan.':553';
        $content = file_get_contents($url); // varibel untuk konten
        if ($content) {
            $content_lelang = json_decode($content, true); // decode json
            foreach ($content_lelang as $tampil) {
                if ($tampil['kd_lelang'] == $lelang) {
					          $data['kd_lelang'] = $tampil['kd_lelang'];
                    $data['nama_paket'] = $tampil['nama_paket'];
                    $data['sumber_dana'] = $tampil['sumber_dana'];
                    $data['kd_satker'] = $tampil['kd_satker'];
                    $data['jum_pagu'] = $tampil['jum_pagu'];
                    $data['nama_pemenang'] = $tampil['nama_pemenang'];
                    $data['npwp_penyedia'] = $tampil['npwp_penyedia'];
                    $data['nilai_penawaran3'] = $tampil['nilai_penawaran3'];
					          $data['nilai_penawaran'] = $tampil['nilai_penawaran'];
                    $data['status'] = 'berhasil';

                }
            }
        } else {
            $data['status'] = 'bermasalah';
        }
        echo json_encode($data);
    }

	public function simpan_realisasi(){
			$input=$this->input->post(null,TRUE);
			if($this->db->insert('realisasi',$input)){
				redirect (base_url("ppk/realisasi"));
        //echo"<script>alert('data berhasil disimpan')</script>";
			}
      else{

      }
	}

public function edit($id=null){
  $data = $this->db->where('id_realisasi',$id)->get('realisasi')->row_array();
  if(!$data){
    redirect();
  }
  if(!$_POST){
    $tampil['input'] = $data;
  }
  else{
    $data=$this->input->post(null,TRUE);
    if($this->db->where('id_realisasi',$id)->update('realisasi',$data)){
      redirect(base_url("ppk/realisasi"));
    }
    else{
    }
  }
  $tampil['form_action']=base_url("ppk/realisasi/edit/$id");
  $tampil['bulan'] = $this->pengajuan_m->show_bulan();
  $data['konten'] = view('ppk/realisasi/edit',$tampil, true);
  return view('templates/head', $data);

}


public function hapus($id=null){
  $data=$this->db->where('id_realisasi',$id)->get('realisasi')->row();
  if($data){
    $input=$this->input->post(null,TRUE);
    if($this->db->where('id_realisasi',$id)->from('realisasi')->delete()){
      redirect(base_url('ppk/realisasi'));
    }
    else{
      redirect();
    }
  }
  else{

  }
}




}
