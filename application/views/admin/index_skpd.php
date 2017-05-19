
<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar SKPD</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" >
                    <strong>Petunjuk. </strong>Berikut merupakan daftar OPD
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Nama OPD</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($skpd as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?php echo $value['Nama_Skpd'] ?></td>
                                            <td><?php echo $value['Alamat'] ?></td>
                                            <td><?php echo $value['Email_Skpd'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/masterskpd/edit/'.$value['Master_Skpd_Id']) ?>" class="label label-success">Ubah</a>
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
                <a href="<?php echo base_url('admin/masterskpd/tambah') ?>" class="btn btn-primary">Tambah OPD</a>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('table').DataTable();
    });
</script>