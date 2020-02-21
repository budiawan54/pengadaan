<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
        private $userLogin;

	function __construct()
	{
		parent::__construct();
		$this->user_m->checkLogin();
		$this->load->model('pengajuan_m');
		$this->load->model('user_m');
                $this->userLogin = $this->user_m->getDetailLoginUser();

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
                $this->datatables->select('Nama_Kegiatan, Paket_Pengadaan, pengajuan_pengadaan.Created_At, pengajuan_pengadaan.Updated_At, Progress, Nama_Jabatan, Id_Pengajuan_Pengadaan, pengajuan_pengadaan.Deleted_At, Id_Pengajuan_Pengadaan as Id_parent, (SELECT Isi FROM pengajuan_pengadaan_catatan WHERE Id_Pengajuan_Pengadaan = Id_parent ORDER BY Pengajuan_Pengadaan_Catatan_Id DESC LIMIT 1 ) AS last_catatan, Nama_Skpd');

                $this->datatables->from('pengajuan_pengadaan');
                $this->datatables->join('jabatan_sistem', 'jabatan_sistem.Slug_Jabatan = pengajuan_pengadaan.Slug_Posisi');
                $this->datatables->join('user', 'pengajuan_pengadaan.Id_User = user.Id_User');

                $this->datatables->join('master_skpd', 'master_skpd.Master_Skpd_Id = user.Master_Skpd_Id');
                

                $posisi_input = $this->input->get('posisi');

                if ($posisi_input == 'posisi_saya'){
                        if($userLogin['Slug_Jabatan'] == 'anggota_pokja'){
                                $this->datatables->where('Slug_Posisi', 'pokja');
                                $this->datatables->where('pengajuan_pengadaan.Id_Pokja', $userLogin['Id_Pokja']);
                        }
                        elseif($userLogin['Slug_Jabatan'] == 'pokja'){
                                $this->datatables->join('akses_pengadaan','akses_pengadaan.Pengajuan_Pengadaan_Id=pengajuan_pengadaan.Id_Pengajuan_Pengadaan');
                                $this->datatables->where('pengajuan_pengadaan.Slug_Posisi', 'pokja');
                                $this->datatables->where('akses_pengadaan.User_Id', $userLogin['Id_User']);
                        }
                        else{
                              //  $this->datatables->from('pengajuan_pengadaan');
                                $this->datatables->where('Slug_Posisi', $userLogin['Slug_Jabatan']);
                        }
                }

                

                if ($Slug_Posisi == 'ppk'){
                       // $this->datatables->from('pengajuan_pengadaan');
                        $this->datatables->where('pengajuan_pengadaan.Id_User', $userLogin['Id_User']);
                }

                // if ($Slug_Posisi == 'pokja'){
                //      $this->datatables->where('Id_Pokja', $userLogin['Id_User']);
                // }

                if ($Slug_Posisi != 'admin'){
                        
                        $this->datatables->where('pengajuan_pengadaan.Deleted_At', null);
                        $this->datatables->add_column('aksi', '<a data-toggle="tooltip" href="'.$detailUrl.'" title="Lihat detail Pengajuan" class="label label-info">Lihat Detail</a>', 'Id_Pengajuan_Pengadaan');
                }
                if ($Slug_Posisi == 'admin'){
                      //  $this->datatables->from('pengajuan_pengadaan');
                        
                        $this->datatables->add_column('aksi', '<a data-toggle="tooltip" href="'.$detailUrl.'" title="Lihat detail Pengajuan" class="label label-info">Lihat Detail</a><a data-toggle="tooltip" href="javascript:void(0)" onclick="hapusPengajuan(\''.base_url('admin/pengajuan/$1/hapus').'\')" title="Hapus" class="label label-danger">Hapus</a>', 'Id_Pengajuan_Pengadaan');
                }
                
                echo $this->datatables->generate();

        }

        public function lihatcatatanpokja($id_catatan_kelengkapan, $Id_Pengajuan_Pengadaan){
                $ar_catatan = $this->db->from('pengajuan_pengadaan_kelengkapan_catatan')
                                ->where('Id_Pengajuan_Pengadaan_Kelengkapan', $id_catatan_kelengkapan)
                                ->join('user', 'user.Id_User = pengajuan_pengadaan_kelengkapan_catatan.Id_User')
                                ->get()
                                ->result_array();

                $data['ar_catatan'] = $ar_catatan;
                $data['loginUser'] = $this->userLogin;
                $data['Id_Pengajuan_Pengadaan'] = $Id_Pengajuan_Pengadaan;

                $v = view('partials/ajax_catatan_pokja', $data, true);

                echo $v;
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

}