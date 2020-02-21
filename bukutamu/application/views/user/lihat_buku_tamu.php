
<div class="row bg-light" style="min-height: 500px;">
    <div class="col-md-12 text-center">
        <h2 class="font-size-normal">
            Daftar Buku Tamu
            <small class="heading heading-solid center-block"></small>
        </h2>
    </div>
    <div class="col-md-8 col-md-offset-2 text-center">
    <?php
        if ($user['Slug_Jabatan'] != 'admin'){
    ?>

        <p class="lead">
            Hari ini <?php echo date('Y-m-d') ?> ada <?php echo $jmlAntrian ?> antrian yang menunggu anda
        </p>

    <?php
        }
    ?>
    </div>

    <div class="col-md-12 " >
        
        <div class="well">
            <form class="form-inline" id="formTgl">
                <div class="form-group">
                    <input type="text" id="tgl_input" class="form-control input-sm datepicker" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>">
                    <button type="submit" class="button button-rounded button-sm button-pasific" style="margin-top: 5px;"><i class="fa fa-filter"></i> Saring</button>
                    <a data-toggle="modal" data-target="#myModalCetak" class="button button-rounded button-sm button-success" href="javascript:void(0)" style="margin-top: 5px;"><i class="fa fa-print"></i> Cetak</a>
                 </div>
            </form>
        </div>
        <div class="table-responsive">
        <table class="table " id="tableBuku">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Waktu Datang</th>
                    <?php
                        if ($user['Slug_Jabatan'] == 'admin'){
                    ?>
                        <th>Unit Tujuan</th>
                    <?php
                        }
                    ?>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        </div>
    </div>
</div>


<div class="modal fade " id="modalUbahStatusM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog">
    <form action="<?php echo base_url('home/simpanEditStatusPengunjung') ?>" method="POST">

       <div class="modal-content " style="top: 20px;">
            <div class="modal-header">
                Edit Status Pengunjung
            </div>
           <div class="modal-body">
                <div id="modalUbahStatusFormTarget"></div>
           </div>
           <div class="modal-footer">
                <button type="submit" class="button button-rounded button-pasific"><i class="fa fa-save"></i> Simpan</button>
           </div>
       </div>
    </form>
   </div>
</div>

<div class="modal fade " id="modalDisposisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog">
    <form action="<?php echo base_url('home/disposisiBukuTamu') ?>" method="POST">

       <div class="modal-content " style="top: 20px;">
            <div class="modal-header">
                Disposisi Buku Tamu
            </div>
           <div class="modal-body">
                <p>Disposisi buku tamu ke akun lain</p>
                <select class="form-control" name="target_disposisi">
                    <?php
                        foreach ($jabatan_sistem as $key => $value) {
                            echo '<option value="'.$value['Slug_Jabatan'].'">'.$value['Nama_Jabatan'].'</option>';
                        }
                    ?>

                </select>

                <input type="hidden" name="id_buku_tamu" id="id_buku_tamu_disposisi">
           </div>
           <div class="modal-footer">
                <button type="submit" class="button button-rounded button-pasific"><i class="fa fa-save"></i> Simpan</button>
           </div>
       </div>
    </form>
   </div>
</div>


<div class="modal fade " id="modalUbahDetailM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog modal-lg">
    <form action="<?php echo base_url('home/simpanEditDetailPengunjung') ?>" method="POST">

       <div class="modal-content " style="top: 20px;" id="detail_pengunjung_target_cetak">
            <div class="modal-header">
                Detail Pengunjung
            </div>
           <div class="modal-body">
                <div id="modalUbahDetailFormTarget"></div>
           </div>
           <div class="modal-footer">
                <button type="submit" class="button button-rounded button-pasific"><i class="fa fa-save"></i> Simpan</button>
                <a href="javascript:void(0)" onclick="cetakSection()" class="button button-rounded button-success">Cetak</a>
           </div>
       </div>
    </form>
   </div>
</div>


<div id="myModalCetak" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cetak</h4>
      </div>
    <form method="POST" action="<?php echo base_url('home/cetakBukuTamuBulan') ?>">
      <div class="modal-body">
            
            <div class="form-group">
                <label class="control-label" style="font-weight: bold !important;">Rentang Tanggal</label>
                <input type="text" class="form-control input-sm" placeholder="" name="tanggal" id="range">
            </div>
            
            <div class="form-group">
                <label class="control-label" style="font-weight: bold !important;">Asal Skpd</label>
                <select class="form-control" name="Master_Skpd_Id">
                    <option>Semua</option>
                    <?php
                        foreach ($master_skpd as $key => $value) {
                            echo '<option value="'.$value['Master_Skpd_Id'].'">'.$value['Nama_Skpd'].'</option>';
                        }
                    ?>
                </select>
                
            </div>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Cetak">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>



<script type="text/javascript">

	var id_buku_tamu_active = '';

    function modalUbahStatus(id_buku_tamu){
        $.get("<?php echo base_url('ajax/modalUbahStatus') ?>/" + id_buku_tamu, function(e){
            $('#modalUbahStatusFormTarget').html(e);
            $('#modalUbahStatusM').modal('show');
        })
    }

    function cetakSection(){
    	var url = "<?php echo base_url('home/cetak_single_buku') ?>/" + id_buku_tamu_active;
    	window.location.href = url;

    }

    function modalDetailPengunjung(id_buku_tamu){
    	id_buku_tamu_active = id_buku_tamu;

        $.get("<?php echo base_url('ajax/modalDetailPengunjung') ?>/" + id_buku_tamu, function(e){
            $('#modalUbahDetailFormTarget').html(e);
            $('#modalUbahDetailM').modal('show');
        })
    }  


    function modalDisposisi(id_buku_tamu){
        $('#id_buku_tamu_disposisi').val(id_buku_tamu);
        $('#modalDisposisi').modal('show');
    }

    

    var master_url = "<?php echo base_url('ajax/getIsiBukuTamu') ?>";

    var result_url = master_url + '/' + "<?php echo date('Y-m-d') ?>";
    var config_status_buku_tamu = <?php echo json_encode(renderStatusBukuTamu()) ?>;

    function cetakBukuTamu(){
        var tgl = $('#tgl_input').val();

        location.href = '<?php echo base_url('home/cetakBukuTamu/') ?>' + '/' + tgl;
    }

    $(function(){

        $('input[name="tanggal"]').daterangepicker({

            locale: {
                cancelLabel: 'Bersihkan',
                format: 'YYYY/MM/DD'
            }
        });

        // $('.datepicker-bulan').datepicker({
        //                 format: 'yyyy-mm',
        //                 startView: "year", 
        //                     minViewMode: "months"
        //               });

        var TableData = $('#tableBuku').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "desc" ]],
            "ajax": {
                "url" : result_url,
                "type" : "POST"
            },
            fnDrawCallback: function (oSettings) {
                $('[data-toggle="tooltip"]').tooltip(); 
            },
            columns : [
                {data : "no_urut"},
                {data : "nama"},
                {data : "instansi"},
                {data : "created_at"},
                <?php
                    if ($user['Slug_Jabatan'] == 'admin'){
                        echo '{data : "unit_tujuan"},';
                    }
                ?>
                {
                    data : "status",
                    render : function(data){
                        return '<label title="'+ data +'" data-toggle="tooltip" class="label label-'+ config_status_buku_tamu[data] +'">'+ data +'</label>';
                    }
                },
                {data : "id_buku_tamu", 
                    render: function(data){

                        return '<a href="javascript:void(0)" onclick="modalUbahStatus('+ data +')" title="Ubah status" data-toggle="tooltip" class="button button-xs button-rounded button-orange">Edit Status</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="modalDetailPengunjung('+ data +')" class="button button-xs button-rounded button-pasific">Detail</a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="modalDisposisi('+ data +')" class="button button-xs button-rounded button-success">Disposisi</a>';
                    }
                }

            ]
        });


        $('#formTgl').on('submit', function(e){

            var tgl = $('#tgl_input').val();
            var url_target = master_url +'/'+ tgl;
            TableData.ajax.url(url_target).load();
            e.preventDefault();

        })

    })
</script>