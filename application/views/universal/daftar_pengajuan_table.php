
<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Pengajuan PPK</h3>
            </div>
            <div class="panel-body">
                

                <div class="alert alert-success">
                    <strong>Pemberitahuan. </strong>Berikut merupakan daftar Pengajuan yang terdata
                </div>

                <div class="form-group well">
                    <label class="radio-inline">
                        <input type="radio" value="posisi_saya" checked="" name="posisi">Posisi Saya
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="keseluruhan" name="posisi">Keseluruhan Pengajuan
                    </label>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <?php
                                    $sort_index = 0;
                                    if (isset($admin) && $admin == true){
                                        $sort_index = 1;
                                        echo '<th>Status Data</th>';
                                    }
                                ?>
                                <th>Tanggal Pengajuan</th>
                                <th>Kegiatan</th>
                                <th>Paket</th>
                                <th>Catatan Terakhir</th>
                                <th>Tanggal Update</th>
                                <th>Posisi</th>
                                <th style="width: 100px;">Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){

        var master_url = "<?php echo $url_datatable ?>";
        var result_url = master_url + '?posisi=posisi_saya';
        var status_config = <?php echo json_encode($this->config_m->proses_pengajuan()) ?>;

        $('input[name=posisi]:radio').on("change", function(){
            var radioVal = $(this).val();
            result_url = master_url + '?posisi=' + radioVal;
            TableData.ajax.url(result_url).load();
        });



        var TableData = $('table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ <?php echo $sort_index; ?>, "desc" ]],
            "ajax": {
                "url" : result_url,
                "type" : "POST"
            },
            fnDrawCallback: function (oSettings) {
                $('[data-toggle="tooltip"]').tooltip(); 
            },
            columns : [
                <?php
                    if (isset($admin) && $admin == true){
                ?>
                    {
                        data : "Deleted_At",
                        render : function(data){
                            if (data == null){
                                return '<label class="label label-success">Aktif</label>';
                            }
                            return '<label class="label label-warning">Tarhapus</label>';
                        }
                    },

                <?php
                    }
                ?>

                {data : "Created_At"},
                {data : "Nama_Kegiatan"},
                {data : "Paket_Pengadaan"},
                {data : "last_catatan"},
                {data : "Updated_At"},
                {data : "Nama_Jabatan"},
                {
                    data : "Progress", 
                    render : function(data){
                        return status_config[data].isi;
                    }
                },
                {data : "aksi"},

            ]
        });



    });

    function hapusPengajuan(link){
        var aler = confirm("Apakah anda yakin akan menghapus data ini?");
        if (aler){
           window.location.href = link;
        }

    }
</script>