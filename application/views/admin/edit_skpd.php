
<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit OPD</h3>
            </div>
            <div class="panel-body">

				<form action="<?php echo base_url('admin/masterskpd/edit/'.$skpd['Master_Skpd_Id']) ?>" method="POST" class="form-horizontal">
				    
				    <div class="form-group">
				        <label class="control-label col-md-3">Nama OPD</label>
				        <div class="col-md-4">
				            <input type="text" name="Nama_Skpd" class="form-control" value="<?php echo $skpd['Nama_Skpd'] ?>" required>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">Alamat</label>
				        <div class="col-md-6">
				            <textarea name="Alamat" class="form-control"><?php echo $skpd['Alamat'] ?></textarea>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3">Email</label>
				        <div class="col-md-4">
				            <input type="text" name="Email_Skpd" class="form-control" value="<?php echo $skpd['Email_Skpd'] ?>">
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