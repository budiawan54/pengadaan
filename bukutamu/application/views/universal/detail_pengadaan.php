<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/plugins/editable/bootstrap3-editable/css/bootstrap-editable.css') ?>">

<?php
    $progress_pengajuan = $pengajuan['Progress'];
    $slug_posisi = $pengajuan['Slug_Posisi'];
    if (
            ($slug_posisi == 'fo' && $userLogin['Slug_Jabatan'] == 'fo' && $progress_pengajuan == 'fo') 
            ||
            ($slug_posisi == 'ksb_ren' && $userLogin['Slug_Jabatan'] == 'ksb_ren' && $progress_pengajuan == 'terima_fo') 
        ){
        $isiCatatanKelengkapan = true;

        if ($slug_posisi == 'fo'){
            echo '<form action="'.base_url('fo/pengajuan/cek_kelengkapan'). '" method="POST" id="form-catatan-fo">';
        }
        if ($slug_posisi == 'ksb_ren'){
            echo '<form action="'.base_url('ksb_ren/pengajuan/cek_kelengkapan') .'" method="POST" id="form-dek" enctype="multipart/form-data">';
        }

        
    }
    else{
        $isiCatatanKelengkapan = false;
    }

    // form catatan untuk anggota_pokja
    if ($slug_posisi == 'pokja' && $userLogin['Slug_Jabatan'] == 'anggota_pokja' && $pengajuan['Progress'] == 'setuju_seleksi'){
        echo '<form action="'.base_url('anggota_pokja/pengajuan/isi_catatan') .'" method="POST" id="form-anggota-pokja" enctype="multipart/form-data">';
    }

    // form catatan untuk pokja
    if ($slug_posisi == 'pokja' && $userLogin['Slug_Jabatan'] == 'pokja' && $pengajuan['Progress'] == 'setuju_seleksi'){
        echo '<form action="'.base_url('pokja/pengajuan/isi_catatan') .'" method="POST" id="form-catatan-pokja" enctype="multipart/form-data">';
    }



?>


<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Detail Pengadaan</h4>
    </div>
    <div class="page-header-section">
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Pengajuan</a></li>
                <li class="active">Daftar</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data Umum Pengajuan</h3>
                
                <?php
                    if ($slug_posisi == 'ppk'){
                        if ($progress_pengajuan == 'draft'
                            || $progress_pengajuan == 'blm_lengkap'
                            || $progress_pengajuan == 'tolak_fo'
                            || $progress_pengajuan == 'pengkajian'){

                ?>
                
                            <div class="panel-toolbar text-right">
                                <a href="<?php echo base_url('ppk/pengajuan/'.$pengajuan['Id_Pengajuan_Pengadaan'].'/edit') ?>" class="btn btn-sm btn-info">Edit Pengadaan</a>
                            </div>

                <?php
                        }
                    }
                ?>

            </div>
            <div class="panel-body">
                <?php
                    $config_ar = $this->config_m->proses_pengajuan();
                    $config_used = $config_ar[$pengajuan['Progress']];
                ?>

                <div class="alert alert-<?php echo $config_used['tipe'] ?>">
                    <h4 class="semibold title">Status Pengajuan Pengadaan</h4>
                    <p>
                        <?php echo $config_used['isi'] ?>
                    </p>
                    
                        <?php
                            if ($pengajuan['Progress'] == 'blm_lengkap' && $pengajuan['Surat_Pengembalian'] != null){
                                echo '<a style="margin-top: 10px;" target="_BLANK" href="'.base_url('storage/surat/'.$pengajuan['Surat_Pengembalian']).'" class="btn btn-warning">Lihat Surat Pengembalian</a>';
                            }

                            

                            if ($pengajuan['Progress'] == 'lelang_diterima' && /*$userLogin['Slug_Jabatan'] == 'ppk' && */ $userLogin['Id_User'] == $pengajuan['Id_User']){
                                echo '<a href="'.base_url('ppk/pengajuan/cetak/hasilpokja/'.$pengajuan['Id_Pengajuan_Pengadaan']).'" class="btn btn-success" target="_BLANK" style="margin-top: 10px;">Cetak Hasil Lelang POKJA</a>';
                            }

                        ?>
                </div>

                <table class="table">
                    <tr class="success">
                        <td width="200px;">Posisi Pengajuan</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php echo $pengajuan['Nama_Jabatan'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">PIN</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|PIN', $pengajuan['Id_Pengajuan_Pengadaan'], '#'.$pengajuan['PIN'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Nama Kegiatan</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Nama_Kegiatan', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Nama_Kegiatan'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Paket Pengadaan</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Paket_Pengadaan', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Paket_Pengadaan'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Sumber Dana</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Sumber_Dana', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Sumber_Dana'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Pagu Anggaran</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Pagu_Anggaran', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Pagu_Anggaran'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">HPS</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|HPS', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['HPS'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Kode Rekening/MAK</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Kode_Rekening_Max', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Kode_Rekening_Max'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Kode RUP</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Kode_RUP', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Kode_RUP'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Jenis Kontrak</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Jenis_Kontrak', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Jenis_Kontrak'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px;">Jenis Pengadaan</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php 
                                echo tampil_editable('pengajuan_pengadaan|Id_Pengajuan_Pengadaan|Jenis_Barang', $pengajuan['Id_Pengajuan_Pengadaan'], $pengajuan['Jenis_Barang'], 'text', 'editable_pengajuan'); 
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="150px;">Nama Pengaju</td>
                        <td width="5px;">:</td>
                        <td><?php echo $pengajuan['Nama_Lengkap'] ?></td>
                    </tr>

                    <tr>
                        <td width="150px;">File Verifikasi</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php
                                if ($pengajuan['File_Verifikasi'] != null){
                                    echo '<a target="_BLANK" href="'.base_url('storage/lembarverifikasi/'.$pengajuan['File_Verifikasi']).'" class="btn btn-primary btn-xs">Lihat file verifikasi</a>';
                                }
                                else{
                                    echo '<i>Lembar verifikasi belum dimasukan</i>';
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Surat Tugas Pokja</td>
                        <td>:</td>
                        <td>
                            <?php

                                if ($pengajuan['Surat_Tugas_Pokja'] != null){
                                    echo '<a target="_BLANK" href="'.base_url('storage/surat/'.$pengajuan['Surat_Tugas_Pokja']).'" class="btn btn-primary btn-xs">Lihat Surat Tugas Pokja</a>';
                                }
                                else{
                                    echo '<i>Surat Tugas belum dimasukan</i>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="150px;">Jumlah Sanggahan Monev</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php
                                if ($pengajuan['Jumlah_Sanggahan_Monev'] != null){
                                    echo $pengajuan['Jumlah_Sanggahan_Monev'];
                                }
                                else{
                                    echo '<i>Jumlah Sanggahan belum dimasukan</i>';
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="150px;">File Pendukung dari Monev</td>
                        <td width="5px;">:</td>
                        <td>
                            <?php
                                if ($pengajuan['File_Pendukung_Monev'] != null){
                                    echo '<a target="_BLANK" href="'.base_url('storage/file_pendukung_monev/'.$pengajuan['File_Pendukung_Monev']).'" class="btn btn-primary btn-xs">Lihat file pendukung</a>';
                                }
                                else{
                                    echo '<i>File Pendukung masih kosong</i>';
                                }
                            ?>
                        </td>
                    </tr>

                </table>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Kelengkapan Pengajuan</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <h4 class="title semibold">Petunjuk</h4>
                    <p>Silahkan klik deskripsi kelengkapan untuk melihat file yang telah di upload. Anda juga bisa melihat catatan dari Frontoffice dan KSB Perencanaan dengan mengklik tombol <code>Lihat Catatan</code> pada masing-masing kelengkapan.</p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table  table-condensed table-striped">
                    
                    <?php

                        $fileDownload = '';
                        $icon = '';

                        foreach ($kelengkapan as $key => $value) {
                            if (isset($value['isian'])){
                                if ($value['isian']['Nama_File'] != ''){
                                    $fileDownload = base_url('storage/kelengkapan').'/'. $value['isian']['Nama_File'];
                                }
                                else{
                                    $fileDownload = '';
                                }
                                
                            }                            
                            else{
                                $fileDownload = '';
                            }
                    ?>
                            <tr>
                                <?php


                                    if ($isiCatatanKelengkapan){
                                        
                                        if (isset($value['isian'])){
                                            if ($slug_posisi == 'fo'){
                                                $fieldChPosisi = $value['isian']['Ch_Fo'];
                                            }
                                            elseif ($slug_posisi == 'ksb_ren'){
                                                $fieldChPosisi = $value['isian']['Ch_Ksb_Ren'];
                                            }

                                            if ($fieldChPosisi == 1){
                                                $ch = 'checked=""';
                                            }
                                            else{
                                                $ch = '';
                                            }
                                        }
                                        else{
                                            $ch = '';
                                        }


                                        echo '<td>
                                                <input type="checkbox" '.$ch.' name="chc_Kelengkapan['.$value['Id_Kelengkapan'].']" class="chc_kelengkapan_item" data-isrequired="'.$value['Is_Required'].'">
                                            </td>';
                                    }
                                ?>
                                <td>
                                    <?php 
                                        if ($fileDownload != ''){
                                            echo '<a title="Kelengkapan dipenuhi" data-toggle="tooltip" href="'.$fileDownload.'" target="_BLANK">'.$value['Deskripsi'].'</a>';


                                        }
                                        else{
                                            echo '<a href="javascript:void(0)" data-toggle="tooltip" title="Kelengekapan tidak dipenuhi" class="text-danger">'.$value['Deskripsi'].'</a>';
                                        }

                                        if ($value['Is_Required'] == '1'){
                                            echo '&nbsp;<span class="text-danger">*<span>';
                                        }   

                                    ?>
                                </td>

                                <?php
                                    if ($isiCatatanKelengkapan){



                                        echo '<td>
                                                <input type="text" placeholder="Catatan" class="form-control" name="Catatan_Kelengkapan['.$value['Id_Kelengkapan'].']">
                                            </td>';
                                    

                                    }
                                ?>

                                <td>
                                    <?php

                                        $warna_btn = 'success';

                                        if (isset($value['isian'])){
                                            if ($value['isian']['Ch_Fo'] == 0 || $value['isian']['Ch_Ksb_Ren'] == 0){
                                                $warna_btn = 'danger';
                                            }
                                            else if ($value['isian']['Ket_Fo'] = '' || $value['isian']['Ket_Ksb_Ren'] == ''){
                                                $warna_btn = 'warning';
                                            }
                                        }
                                        

                                        


                                        if (isset($value['isian'])){

                                            if ($value['isian']['Ket_Ksb_Ren'] != '' && $value['isian']['Ket_Fo'] != '')
                                            {

                                    ?>

                                            <a href="javascript:void(0)" 
                                                data-description="<?php echo $value['Deskripsi'] ?>" 
                                                data-chcfo="<?php echo $value['isian']['Ch_Fo'] ?>" 
                                                data-chcren="<?php echo $value['isian']['Ch_Ksb_Ren'] ?>" 
                                                data-catfo="<?php echo $value['isian']['Ket_Fo'] ?>" 
                                                data-catren="<?php echo $value['isian']['Ket_Ksb_Ren'] ?>" 
                                                class="btn btn-<?php echo $warna_btn; ?> btn-xs lihatDetailCatatanPopup" title="Lihat Catatan dari Frontoffice dan KSB Perencanaan yang sudah masuk" data-toggle="tooltip">Lihat Catatan</a>
                                    <?php
                                            }

                                        }
                                    ?>
                                </td>


                                <td>
                                    <?php
                                        if (isset($value['isian'])){
                                            if (isset($value['jumlah_cat_pokja']) && $value['jumlah_cat_pokja'] != 0){

                                    ?>
                                                <a href="javascript:void(0)" onclick="lihatCatatanPokja(<?php echo $value['isian']['Id_Pengajuan_Pengadaan_Kelengkapan'] ?>, '<?php echo $value['Deskripsi'] ?>')" title="Catatan pokja" data-toggle="tooltip" class="btn btn-warning btn-xs">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</a>
                                    <?php
                                            }
                                        }
                                    ?>
                                </td>
                                
                                <?php
                                    if ($userLogin['Slug_Jabatan'] == 'anggota_pokja' || $userLogin['Slug_Jabatan'] == 'pokja'){
                                        
                                        if (isset($value['isian'])){

                                            if (isset($value['catatan_anggota_personal']) && $value['catatan_anggota_personal'] != null){
                                                $value_personal_cat = $value['catatan_anggota_personal']['Isi_Catatan'];
                                            }
                                            else{
                                                $value_personal_cat = "";
                                            }

                                            echo '<td style="min-width: 200px;">
                                                    <input type="text" placeholder="Catatan Pokja" class="form-control" value="'.$value_personal_cat.'" name="Catatan_Kelengkapan_Pokja['.$value['isian']['Id_Pengajuan_Pengadaan_Kelengkapan'].']">
                                                </td>';
                                        }
                                    }   
                                ?>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-minimal">
            <div class="panel-heading"><h5 class="panel-title"><i class="ico-health mr5"></i>History Catatan</h5></div>
            
            <ul class="media-list media-list-feed nm" style="max-height: 1000px; overflow: auto;">
                <?php
                    foreach ($catatan as $key => $value) {
                        $title = 'Catatan penerimaan dari '.$value['Nama_Jabatan'];
                        $color = '';

                        if ($value['Tipe'] == 0){
                            $color = 'text-danger';
                            $title = 'Catatan Penolakan dari '.$value['Nama_Jabatan'];
                        }
                ?>

                        <li class="media" title="<?php echo $title ?>" data-toggle="tooltip">
                            <div class="media-object pull-left">
                                <i class="ico-pencil bgcolor-default"></i>
                            </div>
                            <div class="media-body">
                                <p class="media-heading <?php echo $color ?>">
                                    <?php echo $value['Nama_Jabatan'] ?> <i class="fa fa-arrow-right"></i> <?php echo $this->pengajuan_m->getNameJabatan($value['Slug_Jabatan_Target']); ?>
                                </p>
                                <p class="media-text"><?php echo $value['Isi'] ?></p>
                                <p class="media-meta"><?php echo $value['Created_At'] ?></p>
                            </div>
                        </li>
                
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>

</div>

<div class="row">
    
    <div class="col-md-12">
        <?php

            if ($slug_posisi == 'ppk' && $userLogin['Slug_Jabatan'] == 'ppk'){
                if ($progress_pengajuan == 'draft' || $progress_pengajuan == 'blm_lengkap' || $progress_pengajuan == 'tolak_fo'){
                    $this->load->view('partials/aksi_ppk_kirim_ke_fo');
                }

                if ($progress_pengajuan == 'pengkajian'){
                    $this->load->view('partials/aksi_ppk_hasil_kaji_perbaikan');
                }

                if ($progress_pengajuan == 'lelang_diterima'){
                    $this->load->view('partials/aksi_ppk_lelang_diterima');
                }
            }

            if ($slug_posisi == 'fo' && $userLogin['Slug_Jabatan'] == 'fo'){
                if ($progress_pengajuan == 'fo'){
                    $this->load->view('partials/aksi_fo_kelengkapan');
                }
            }

            if ($slug_posisi == 'ksb_ren' && $userLogin['Slug_Jabatan'] == 'ksb_ren'){
                if ($progress_pengajuan == 'terima_fo'){
                    $this->load->view('partials/aksi_ksb_ren_kelengkapan');

                }
            }

            if ($slug_posisi == 'kabag_peng' && $userLogin['Slug_Jabatan'] == 'kabag_peng'){
                if ($progress_pengajuan == 'tolak_ksb_ren'){
                    $this->load->view('partials/aksi_kabag_peng_pengambalian_berkas');
                }
                if($progress_pengajuan == 'usul_ke_kabag_peng'){
                    $this->load->view('partials/aksi_kabag_peng_hasil_seleksi');
                }
            }
            

            if ($slug_posisi == 'ksb_pel' && $userLogin['Slug_Jabatan'] == 'ksb_pel'){
                if ($progress_pengajuan == 'terima_ksb_ren'){
                    $this->load->view('partials/aksi_ksb_pel_usul_ke_kabag_pengadaan');
                }
            }

            if ($slug_posisi == 'pokja' && $userLogin['Slug_Jabatan'] == 'pokja'){

                // if ($progress_pengajuan == 'setuju_seleksi' || ){
                    $this->load->view('partials/aksi_pokja_kirim_hasil_kaji');
                // }

                // if ($progress_pengajuan == 'setuju_seleksi'){
                //     $this->load->view('partials/aksi_pokja_isi_catatan');
                // }
            }

            if ($slug_posisi == 'pokja' && $userLogin['Slug_Jabatan'] == 'anggota_pokja' && $pengajuan['Progress'] == 'setuju_seleksi'){
                $this->load->view('partials/aksi_anggota_pokja_isi_catatan');
            }

            if ($slug_posisi == 'monev' && $userLogin['Slug_Jabatan'] == 'monev'){
                if ($progress_pengajuan == 'pokja_kirim_lelang'){
                    $this->load->view('partials/aksi_monev_hasil_sanggahan');
                }
            }

            if ($slug_posisi == 'kabag' && $userLogin['Slug_Jabatan'] == 'kabag'){
                if ($progress_pengajuan == 'validasi_kabag'){
                    $this->load->view('partials/aksi_kabag_validasi');
                }
            } 
        ?>
    </div>

</div>
<?php
    if ($isiCatatanKelengkapan){
        echo '</form>';
    }
?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Catatan Kelengkapan <span id="nama_kelengkapan"></span></h4>
      </div>
      <div class="modal-body table-responsive" id="targetKelengkapanDetail">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>



<script src="<?php echo base_url('resources/plugins/editable/bootstrap3-editable/js/bootstrap-editable.js') ?>"></script>
<script type="text/javascript">
    var urlToActive = "<?php echo base_url($userLogin['Slug_Jabatan'].'/pengajuan/'); ?>";
</script>

 <script type="text/javascript">
    
    function lihatCatatanPokja(id_catatan_kelengkapan, desc){
        $.get("<?php echo base_url('ajax/lihatcatatanpokja/') ?>" + id_catatan_kelengkapan, function(ajax_response){
            $('#nama_kelengkapan').html(desc);
            $('#targetKelengkapanDetail').html(ajax_response);
            $('#myModal').modal('show');
        });
    }


    $(function(){
        $('.editable_pengajuan').editable('option', 'disabled', true);

        $('.trigger_editable').on("click", function(){
            var target = $(this).data('editable-target');
            $('.'+target).editable('toggleDisabled');
        });

        $('.lihatDetailCatatanPopup').on("click", function(){
            console.log($(this));

            var chcFo = $(this).data('chcfo');
            var chcRen = $(this).data('chcren');
            
            var catFo = $(this).data('catfo');
            var catRen = $(this).data('catren');

            if (catFo == ''){
                catFo = '<i>Belum ada catatan</i>';
            }

            if (catRen == ''){
                catRen = '<i>Belum ada catatan</i>';
            }


            var description = $(this).data('description');
            $('#nama_kelengkapan').html(description);
            
            var chFo = '<span class="label label-primary">Kelengkapan disetujui</span>';
            if (chcFo == 0){
                chFo = '<span class="label label-danger">Kelengkapan belum disetujui</span>';
            }

            var chRen = '<span class="label label-primary">Kelengkapan disetujui</span>';
            if (chcRen == 0){
                chRen = '<span class="label label-danger">Kelengkapan belum disetujui</span>';
            }

            var result = '<table class="table table-striped">';

            if (catFo != ''){
                result +='<tr><td>Frontoffice</td><td width="50px;">'+ chFo +'</td><td>'+ catFo +'</td></tr>';
            }
            
            if (catRen != ''){
                result += '<tr><td>KSB Perancanaan</td><td>'+ chRen +'</td><td>'+ catRen +'</td></tr></table>';
            }

            $('#targetKelengkapanDetail').html(result);
            $('#myModal').modal("show");
            
        });
    });

    function confBootBox(pesan, callback2){
        bootbox.confirm({
            message: pesan,
            buttons: {
                confirm: {
                    label: 'Ya',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Batal',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                return callback2(result);
            }
        });
    }


</script>