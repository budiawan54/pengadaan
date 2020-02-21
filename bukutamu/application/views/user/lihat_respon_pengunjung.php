<div class="row bg-light" style="min-height: 500px;">
    <div class="col-md-12 text-center">
        <h2 class="font-size-normal">
            Respon Pengunjung
            <small class="heading heading-solid center-block"></small>
        </h2>
    </div>
    <div class="col-md-8 col-md-offset-2 text-center">
    
    </div>

    <div class="col-md-12 " >
        
        <!-- <div class="well">
            <form class="form-inline" id="formTgl">
                <div class="form-group">
                    <input type="text" id="tgl_input" class="form-control input-sm datepicker" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>">
                    <button type="submit" class="button button-rounded button-sm button-pasific" style="margin-top: 5px;"><i class="fa fa-filter"></i> Saring</button>
                 </div>
            </form>
        </div> -->
        <div class="table-responsive">
        <table class="table " id="tableBuku">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th><img src="<?php echo base_url('image/happy.png') ?>" style="width: 50px;" class="select_image"></th>
                    <th><img src="<?php echo base_url('image/happy.svg') ?>" style="width: 50px;" class="select_image"></th>
                    <th><img src="<?php echo base_url('image/2000px-Emojione_1F605.svg.png') ?>" style="width: 50px;" class="select_image"></th>
                    <th><img src="<?php echo base_url('image/sad.svg') ?>" style="width: 50px;" class="select_image"></th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        </div>
    </div>
</div>


<div class="modal fade " id="modalResponLihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content " style="top: 20px;">
            <div class="modal-header">
                Lihat Respon per Hari
            </div>
            <div class="modal-body">

               
               <div id="target_respon"></div>
               

            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(function(){
    var master_url = "<?php echo base_url('ajax/getResponPengunjung') ?>";

    var result_url = master_url + '/' + "<?php echo date('Y-m-d') ?>";

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
            {data : "tgl"},
            {data : "rating4"},
            {data : "rating3"},
            {data : "rating2"},
            {data : "rating1"},
            {data : "aksi"}
        ]
    });

    $('#formTgl').on('submit', function(e){

        var tgl = $('#tgl_input').val();
        var url_target = master_url +'/'+ tgl;
        TableData.ajax.url(url_target).load();
        e.preventDefault();

    })


});

function openDetailModalRespon(created_at){
    $.get(created_at, function(data){
        $('#target_respon').html(data);
        $('#modalResponLihat').modal('show');
    })
}

</script>
