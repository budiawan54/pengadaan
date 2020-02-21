
<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Realisasi</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" >
                    <strong>Petunjuk. </strong>Berikut Merupakan Daftar Realisasi
                </div>
                <?php if ($realisasi):?>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed" id="realisasi">
                        <thead>
                            <tr>
                                <th>Paket Pengadaan</th>
                                <th>Sumber Dana</th>
                                <th>Kode RUP</th>
                                <th>Kode Lelang</th>
                                <th>Nama Pemenang</th>
                                <th>Nilai Penawaran</th>
                                <th>No Kontrak</th>
                                <th>Tanggal Kontrak</th>
                                <th>No BAST</th>
                                <th>Tanggal BAST</th>

                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($realisasi as $r): ?>
                            <tr>
                                <td><?= $r['Paket_Pengadaan']?></td>
                                <td><?= $r['Sumber_Dana']?></td>
                                <td><?= $r['Kode_RUP']?></td>
                                <td><?= $r['kd_lelang']?></td>
                                <td><?= $r['Nama_Pemenang']?></td>
                                <td><?= $r['Nilai_Penawaran_Hasil']?></td>
                                <td><?= $r['no_kontrak']?></td>
                                <td><?= $r['tgl_kontrak']?></td>
                                <td><?= $r['no_bast']?></td>
                                <td><?= $r['tgl_bast']?></td>

                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
                </div>
            </div>
            <!-- <div class="panel-footer">
                <a href="<?php echo base_url('ppk/realisasi/tambah') ?>" class="btn btn-primary">Tambah Realisasi</a>
            </div> -->

        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    $(function(){
        $('table').DataTable();
    });
</script> -->

<!-- custom -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#realisasi').DataTable( {
    "lengthChange": true,
    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],


    } );
} );
</script>
