
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Log Activiry</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Log Activiry</h3>
            </div>
            <div class="panel-body">
                
                <div class="alert alert-info">Halaman berikut menampilkan log activity yang dilakukan user</div>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Kegiatan</th>
                                <th>IP Address</th>
                                <?php
                                    if ($user['Slug_Jabatan'] == 'admin'){
                                        echo '<th>User</th>';
                                    }
                                ?>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var TableData = $('table').DataTable({
        "processing": true,
        "serverSide": true,
         "order": [[ 0, "desc" ]],
        "ajax": {
            "url" : "<?php echo base_url('logactivity') ?>",
            "type" : "POST"
        },
        fnDrawCallback: function (oSettings) {
            $('[data-toggle="tooltip"]').tooltip(); 
        },
        columns : [
            {data : "Created_At"},
            {data : "Kegiatan"},
            {data : "Ip_Address"},
            <?php
                if ($user['Slug_Jabatan'] == 'admin'){
                    echo '{data : "Nama_Lengkap"}';
                }
            ?>
            
        ]
    });

</script>