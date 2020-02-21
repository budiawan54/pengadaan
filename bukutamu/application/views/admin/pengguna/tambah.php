
<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-light">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Pengguna Sistem</h3>
            </div>
            <div class="panel-body">

				<form action="<?php echo base_url('pengguna/submit') ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
				    
				    <div class="form-group">
				        <label class="control-label col-md-3">Username</label>
				        <div class="col-md-4">
				            <input type="text" name="Username" class="form-control" required>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">Nama Lengkap</label>
				        <div class="col-md-6">
				            <input type="text" name="Nama_Lengkap" class="form-control" required>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">NIP</label>
				        <div class="col-md-4">
				            <input type="text" name="NIP_User" class="form-control">
				            <span class="help-block">Kosongkan apabila non PNS</span>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">No. KTP</label>
				        <div class="col-md-4">
				            <input type="text" name="No_Ktp" class="form-control">
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">No. HP</label>
				        <div class="col-md-4">
				            <input type="text" name="No_Hp_User" class="form-control">
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">Jabatan Sistem</label>
				        <div class="col-md-4">
							<select name="Slug_Jabatan" class="form-control" required="">
								<?php
									foreach ($ListJabatan as $key => $value) {
										echo '<option value="'.$value['Slug_Jabatan'].'">'.$value['Nama_Jabatan'].'</option>';
									}
								?>
							</select>
				        </div>
				    </div>
					

					<div class="form-group">
					    <label class="control-label col-md-3">Email</label>
					    <div class="col-md-4">
					        <input type="text" name="Email" class="form-control">
					    </div>
					</div>

					<div class="form-group">
					    <label class="control-label col-md-3">WA</label>
					    <div class="col-md-4">
					        <input type="text" name="No_WA" class="form-control">
					    </div>
					</div>

					<div class="form-group">
					    <label class="control-label col-md-3">Telegram</label>
					    <div class="col-md-4">
					        <input type="text" name="No_Telegram" class="form-control">
					    </div>
					</div>


				    <div class="form-group">
				        <label class="control-label col-md-3">Password</label>
				        <div class="col-md-4">
				            <input type="text" name="Password" class="form-control" required="">
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3"></label>
				        <div class="col-md-6">
				            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
				        </div>
				    </div>

				</form>

            </div>
        </div>
    </div>
</div>