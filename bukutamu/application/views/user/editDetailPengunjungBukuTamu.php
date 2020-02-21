<div class="row">
	<div class="col-md-6">
        <table class="table">
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="nama" value="<?php echo $buku['nama'] ?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>NIP/No. KTP</td>
				<td>
					<input type="text" name="nip_noktp" value="<?php echo $buku['nip_noktp'] ?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>Nama Skpd</td>
				<td><?php echo $nama_skpd ?></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td><?php echo $buku['jenis'] ?></td>
			</tr>
			<tr>
				<td>Penyedia/Instansi</td>
				<td>
					<input type="text" name="instansi" value="<?php echo $buku['instansi'] ?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>No. Telp</td>
				<td>
					<input type="text" name="no_telp" value="<?php echo $buku['no_telp'] ?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" name="email" value="<?php echo $buku['email'] ?>" class="form-control">
						
				</td>
			</tr>
			<tr>
				<td>Unit Tujuan</td>
				<td><?php echo $buku['unit_tujuan'] ?></td>
			</tr>
			<tr>
				<td>Keperluan</td>
				<td>
					<input type="text" name="keperluan" value="<?php echo $buku['keperluan'] ?>" class="form-control">
				</td>
			</tr>

        </table>
	</div>
	<div class="col-md-6">
		
		<div style="text-align: center; width: 100%">
			<img src="<?php echo $buku['foto'] ?>"style="margin-bottom: 10px; width: 60%; text-align: center;">
		</div>
		<div class="form-group">
			<label class="control-label">Catatan Pengunjung</label>
			<textarea class="form-control" name="catatan"><?php echo $buku['catatan'] ?></textarea>
		</div>

	</div>

	<input type="hidden" name="id_buku_tamu" value="<?php echo $buku['id_buku_tamu'] ?>">
</div>
