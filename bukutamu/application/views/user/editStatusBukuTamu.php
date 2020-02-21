<div class="form-group">
	<label class="control-label">Status Pengunjung</label>
	<select class="form-control" name="status">
		<?php
			foreach (statusBukuTamu() as $key => $value) {
				if ($buku['status'] == $key){
					echo '<option value="'.$key.'" selected>'.$value.'</option>';
				}
				else{
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
			}
		?>
	</select>
	<input type="hidden" name="id_buku_tamu" value="<?php echo $buku['id_buku_tamu'] ?>">
</div>
