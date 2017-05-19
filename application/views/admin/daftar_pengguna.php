
<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar User Pengguna Sistem</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" >
                    <strong>Petunjuk. </strong>Berikut merupakan daftar Pengguna dalam Sistem
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($pengguna as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?php echo $value['Nama_Lengkap'] ?></td>
                                            <td><?php echo $value['Username'] ?></td>
                                            <td><?php echo $value['Nama_Jabatan'] ?></td>
                                            <td>
                                                <?php
                                                    if ($value['IsActive'] == 1){
                                                        echo '<label class="label label-info">Aktif</label>';
                                                    }
                                                    else{
                                                        echo '<label class="label label-danger">Non Aktif</label>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('/admin/manajemen/pengguna/'.$value['Id_User']) ?>" class="label label-success">Detail</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a href="<?php echo base_url('admin/manajemen/pengguna/tambah') ?>" class="btn btn-primary">Tambah Pengguna</a>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('table').DataTable();
    });
</script>