<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Hasil Lelang</h3>
	</div>
		
		<div class="panel-body">
			<div class="alert alert-info">
				<h4 class="title semibold">Hasil Lelang</h4>
				<p>Berikut hasil lelang dari POKJA</p>
			</div>
		<?php
			$pengadaan_hasil_lelang = $this->db->from('pengadaan_hasil_lelang')
									->where('Id_Pengajuan_Pengadaan', $pengajuan['Id_Pengajuan_Pengadaan'])
									->get()->row_array();
			$pengadaan_hasil_lelang_file = $this->db->from('pengadaan_hasil_lelang_file')
											->where('Id_Pengajuan_Pengadaan', $pengajuan['Id_Pengajuan_Pengadaan'])
											->get()->result_array();
			$config_kelangkapan = $this->config_m->kelengkapanBerkasHasilLelang();
		?>

			<table class="table">
				<tr>
					<td width="250px;">Tanggal Pengumuman</td>
					<td width="5px;">:</td>
					<td><?php echo $pengadaan_hasil_lelang['Tanggal_Pengumuman'] ?></td>
				</tr>
				<tr>
					<td>Nilai Penawaran Setelah Koreksi</td>
					<td width="5px;">:</td>
					<td><?php echo $pengadaan_hasil_lelang['Nilai_Penawaran_Hasil'] ?></td>
				</tr>
				<tr>
					<td>NPWP</td>
					<td width="5px;">:</td>
					<td><?php echo $pengadaan_hasil_lelang['NPWP'] ?></td>
				</tr>
				<tr>
					<td>Metode Pemilihan Penyedia</td>
					<td width="5px;">:</td>
					<td><?php echo $pengadaan_hasil_lelang['Metode_Pemilihan_Penyedia'] ?></td>
				</tr>
			</table>

			<table class="table">
				<thead>
					<tr>
						<th>Deksripsi</th>
						<th>File</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($pengadaan_hasil_lelang_file as $key => $value) {
							?>
								<tr>
									<td><?php echo $config_kelangkapan[$value['index']]['isi'] ?></td>
									<td><a href="<?php echo base_url('storage/hasil_lelang/' . $value['filename']) ?>" class="label label-info" target="_BLANK">Lihat File</a></td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>

		</div>

</div>