<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Pindahkan Proses Paket</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url('admin/pengajuan/updateprogress') ?>" method="POST"">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Proses</label>
                      <div class="col-sm-10">
                            <input type="text" class="hidden" name="Id_Pengajuan_Pengadaan" value="<?php echo $pengajuan['Id_Pengajuan_Pengadaan'] ?>">
                            <select class="form-control select2" style="width: 100%;" name="progress_pengajuan">


            <?php
            $config_ar = $this->config_m->proses_pengajuan();
              foreach ($proses as $proses) {
                $config_used = $config_ar[$proses['Progress']];
              echo '<option value="'.$proses['id'].'">'.$proses['Slug_Jabatan'].' -- '.$config_used['isi'].' </option>';
              }
            ?>
          </select>
                            <button type="submit" class="btn btn-info" style="margin-top: 10px">Pindahkan Proses</button>
                      </div>
                    </div>

                  </div>
                </form>
            </div>
        </div>
</div>