<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->user_m->checkLogin();
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');
	}

	public function ambilpengajuan($Slug_Posisi){
                if ($Slug_Posisi == 'anggota_pokja'){
                        $Slug_Posisi = 'pokja';
                        $detailUrl = base_url('anggota_pokja/pengajuan/$1');
                }
                else{

                        $detailUrl = base_url($Slug_Posisi.'/pengajuan/$1');
                }

                $userLogin = $this->user_m->getDetailLoginUser();


                $this->load->library('Datatables');
                $this->datatables->select('Nama_Kegiatan, Paket_Pengadaan, Created_At, Updated_At, Nama_Jabatan, Id_Pengajuan_Pengadaan, Deleted_At, Id_Pengajuan_Pengadaan as Id_parent, (SELECT Isi FROM pengajuan_pengadaan_catatan WHERE Id_Pengajuan_Pengadaan = Id_parent ORDER BY Pengajuan_Pengadaan_Catatan_Id DESC LIMIT 1 ) AS last_catatan');
                $this->datatables->from('pengajuan_pengadaan');
                $this->datatables->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = pengajuan_pengadaan.Slug_Posisi');

                $posisi_input = $this->input->get('posisi');

                if ($posisi_input == 'posisi_saya'){
                        if($userLogin['Slug_Jabatan'] == 'anggota_pokja'){
                                $this->datatables->where('Slug_Posisi', 'pokja');
                        }
                        else{
                                $this->datatables->where('Slug_Posisi', $userLogin['Slug_Jabatan']);
                        }
                }

                if ($Slug_Posisi == 'ppk'){
                	$this->datatables->where('Id_User', $userLogin['Id_User']);
                }

                // if ($Slug_Posisi == 'pokja'){
                // 	$this->datatables->where('Id_Pokja', $userLogin['Id_User']);
                // }

                if ($Slug_Posisi != 'admin'){
                        $this->datatables->where('Deleted_At', null);
                        $this->datatables->add_column('aksi', '<a data-toggle="tooltip" href="'.$detailUrl.'" title="Lihat detail Pengajuan" class="label label-info">Lihat Detail</a>', 'Id_Pengajuan_Pengadaan');
                }
                if ($Slug_Posisi == 'admin'){

                        $this->datatables->add_column('aksi', '<a data-toggle="tooltip" href="'.$detailUrl.'" title="Lihat detail Pengajuan" class="label label-info">Lihat Detail</a><a data-toggle="tooltip" href="javascript:void(0)" onclick="hapusPengajuan(\''.base_url('admin/pengajuan/$1/hapus').'\')" title="Hapus" class="label label-danger">Hapus</a>', 'Id_Pengajuan_Pengadaan');
                }
                
                echo $this->datatables->generate();

	}

        public function lihatcatatanpokja($id_catatan_kelengkapan){
                $ar_catatan = $this->db->from('pengajuan_pengadaan_kelengkapan_catatan')
                                ->where('Id_Pengajuan_Pengadaan_Kelengkapan', $id_catatan_kelengkapan)
                                ->join('user', 'user.Id_User = pengajuan_pengadaan_kelengkapan_catatan.Id_User')
                                ->get()
                                ->result_array();

                $result = '<table class="table">
                                <tr>
                                        <th>Nama Pokja</th>
                                        <th>Catatan</th>
                                </tr>
                        '; 

                foreach ($ar_catatan as $key => $value) {
                        $result .= '
                                <tr>
                                        <td>'.$value['Nama_Lengkap'].'</td>
                                        <td>'.$value['Isi_Catatan'].'</td>
                                </tr>
                        ';
                }
                $result .= '</table>';          
                echo $result;
        }

        public function getLogActivity(){
                $user = $this->user_m->getDetailLoginUser();


                $this->load->library('Datatables');
                $this->datatables->select('log_activity.Created_At, Kegiatan, Ip_Address, Nama_Lengkap');
                $this->datatables->from('log_activity');
                $this->datatables->join('user', 'user.Id_User = log_activity.Id_User');
                if ($user['Slug_Jabatan'] != 'admin'){
                        $this->datatables->where('log_activity.Id_User', $user['Id_User']);
                }
                echo $this->datatables->generate();
                
        }


        public function modalUbahStatus($id_buku_tamu){
                $data['buku'] = $this->db->from('buku_tamu')->where('id_buku_tamu', $id_buku_tamu)->get()->row_array();
                $v = view('user/editStatusBukuTamu', $data, true);
                echo $v;
        }

        public function modalDetailPengunjung($id_buku_tamu){
                $data['buku'] = $this->db->from('buku_tamu')->where('id_buku_tamu', $id_buku_tamu)->get()->row_array();


                $data['nama_skpd'] = ''; 

                if ($data['buku']['Master_Skpd_Id'] != NULL){
                        $skpd = $this->db->from('master_skpd')->where('Master_Skpd_Id', $data['buku']['Master_Skpd_Id'])->get()->row_array();
                        $data['nama_skpd'] = $skpd['Nama_Skpd'];
                }


                $v = view('user/editDetailPengunjungBukuTamu', $data, true);
                echo $v;
        }


        public function getIsiBukuTamu($date){
                $data['user'] = $this->user_m->getDetailLoginUser();
                $this->load->library('Datatables');

                $this->datatables->select('nama, no_urut, instansi, created_at, id_buku_tamu, status, unit_tujuan')
                                ->from('buku_tamu')                
                                ->where('SUBSTR(created_at, 1, 10) = ', $date);
                
                if ($data['user']['Slug_Jabatan'] != 'admin'){

                        $this->datatables->where('unit_tujuan', $data['user']['Slug_Jabatan']);
                }
                                
                echo $this->datatables->generate();


        }


        public function getResponPengunjung($date){
                $this->load->library('Datatables');

                $this->datatables->select('
                                        SUBSTR(created_at, 1, 10) as tgl, 
                                        (SELECT COUNT(rating) FROM kepuasan WHERE SUBSTR(created_at, 1, 10) = tgl AND rating = 4 ) AS rating4, 
                                        (SELECT COUNT(rating) FROM kepuasan WHERE SUBSTR(created_at, 1, 10) = tgl AND rating = 3 ) AS rating3, 
                                        (SELECT COUNT(rating) FROM kepuasan WHERE SUBSTR(created_at, 1, 10) = tgl AND rating = 2 ) AS rating2, 
                                        (SELECT COUNT(rating) FROM kepuasan WHERE SUBSTR(created_at, 1, 10) = tgl AND rating = 1 ) AS rating1, 
                                        SUBSTR(created_at, 1, 10) AS pada
                                ')
                        ->from('kepuasan')
                        ->group_by('SUBSTR(created_at, 1, 10)');

                $this->datatables->add_column('aksi', '<a data-toggle="tooltip" onclick="openDetailModalRespon(\''.base_url('ajax/detailResponHari/?hari=$1').'\')" href="javascript:void(0)" title="Lihat detail per hari" class="label label-info">Lihat Detail</a>', 'pada');

                echo $this->datatables->generate();


        }

        public function detailResponHari(){
                $hari = $this->input->get('hari');

                $data['respon'] = $this->db->from('kepuasan')->where("(SUBSTR(created_at, 1, 10)) = '$hari'")->get()->result_array();

                $v = $this->load->view('user/daftarResponAjax', $data, true);

                echo $v;

        }

}