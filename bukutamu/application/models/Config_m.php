<?php

class Config_m extends CI_Model{

	public function proses_pengajuan(){
		$config['proses'] = array(
	
			'draft' => array('isi' => 'Pengajuan masih disimpan dan belum dikirim ke Frontoffice', 'tipe' => 'info'),
			'blm_lengkap' => array('isi' => 'Berkas kurang lengkap', 'tipe' => 'warning'),
			'fo' => array('isi' => "Pengajuan diperiksa Frontoffice", 'tipe' => 'info'),
			'tolak_fo' => array('isi' => 'Pengajuan kurang lengkap dan di tolak Frontoffice', 'tipe' => 'danger'),
			'terima_fo' => array('isi' => 'Pengajuan diterima Frontoffice dan di review Kepala Sub Bagian Perencanaan Pengadaan', 'tipe' => 'success'),
			'tolak_ksb_ren' => array('isi' => 'Pengajuan kurang lengkap dan ditolak Kepala Sub Bagian Perencanaan Pengadaan. Mohon dibuatkan surat pengembalian dan upload pada bagian bawah halaman ini', 'tipe' => 'danger'),
			'terima_ksb_ren' => array('isi' => 'Pengajuan di Validasi Kepala Sub Bagian Perencanaan Pengadaan dan di Review KSB Pelelangan', 'tipe' => 'success'),
			'usul_ke_kabag_peng' => array('isi' => 'Pengajuan di Usulkan ke Kabag Pelayanan Pengadaan (dalam Proses Seleksi atau Lelang)', 'tipe' => 'info'),
			'setuju_seleksi' => array('isi' => 'Pengajuan disetujui dalam proses seleksi dan ditugaskan ke POKJA', 'tipe' => 'info'),
			'pengkajian' => array('isi' => 'Pokja mengkaji kelengkapan dokumen dan RPP', 'tipe' => 'info'),
			'lelang' => array('isi' => 'Melakukan Pelelangan di LPSE', 'tipe' => 'info'),
			'pokja_kirim_lelang' => array('isi' => 'Pokja mengirim hasil lelang ke Kasubag Monev', 'tipe' => 'info'),
			'validasi_kabag' => array('isi' => 'Pengajuan direview Kabag', 'tipe' => 'info'),
			'lelang_diterima' => array('isi' => 'Hasil pengajuan telah selesai', 'tipe' => 'success'),
			'baru' => array('isi' => 'Usulan pengajuan baru', 'tipe' => 'info'),

		);

		return $config['proses'];
	}


	public function kelengkapanBerkasHasilLelang(){
		$config = array(
				array('isi' => 'Berita Acara Penjelasan Pekerjaan'),
				array('isi' => 'Berita Acara Pembukaan Penawaran'),
				array('isi' => 'Berita Acara Evaluasi Penawaran'),
				array('isi' => 'Berita Acara Evaluasi dan Pembuktian Kualifikasi'),
				array('isi' => 'Berita Acara Hasil Pelelangan'),
				array('isi' => 'Dokumen Penawaran Pemenang'),
				array('isi' => 'Dokumen Pengadaan'),
				array('isi' => 'Dokumen Lain')

			);

		return $config;
	}

	public function sumber_dana(){
		$c = array(
				'APBN',
				'APBD'
			);
		return $c;
	}

	public function jenis_barang(){
		$ar = array(
				'Barang', 'Konstruksi', 'Jasa Konsultasi', 'Jasa Lainnya'
			);
		return $ar;
	}

	public function jenis_kontrak(){
		$ar = array(
				'Kontrak harga satuan', 'Lumpsum', 'Gabungan (harga satuan dan lumpsum)', 'Lainnya'
			);
		return $ar;
	}
}