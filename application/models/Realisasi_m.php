<?php
class Realisasi_m extends CI_Model{
	public function getDefaultValue(){
		return [
						'tahun'=>'',
            'kd_lelang'=> '',
            'nama_paket'=> '',
            'kd_satker'=> '',
            'jum_pagu'=> '',
            'nama_pemenang' => '',
						'npwp_penyedia' => '',
						'nilai_penawaran3'=> '',
						'nilai_penawaran' => '',
						'tgl_pengadaan' => '',
						'no_bast' => '',
						'tgl_bast' => '',
						'no_kontrak' => '',
						'tgl_kontrak' => '',
						'keterangan' => '',
        ];
	}

}
