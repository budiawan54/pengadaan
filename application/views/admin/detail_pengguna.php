
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Detail Pengguna</h4>
    </div>
    <div class="page-header-section">
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Pengguna</a></li>
                <li class="active">Detail</li>
            </ol>
        </div>
    </div>
</div>

<div class="section-header mb15">
    <h5 class="semibold">Detail Profil Pengguna</h5>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a href="#popular" data-toggle="tab">Profil User</a></li>
    <li><a href="#comments" data-toggle="tab">Reset Password User</a></li>
</ul>


<div class="tab-content panel">
    <div class="tab-pane active np" id="popular">
        <div class="panel-body">
            
            <table class="table">
                <tr>
                    <td>Status Pengguna</td>
                    <td>:</td>
                    <td>
                        <?php
                            if ($User['IsActive'] == 1){
                                echo '<label class="label label-info">Aktif</label>';
                            }
                            else{
                                echo '<label class="label label-danger">Non Aktif</label>';
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="200px;">Nama Lengkap</td>
                    <td width="5px;">:</td>
                    <td><?php echo $User['Nama_Lengkap'] ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><?php echo $User['Username'] ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $User['Nama_Jabatan'] ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?php echo $User['NIP_User'] ?></td>
                </tr>
                <tr>
                    <td>No Ktp</td>
                    <td>:</td>
                    <td><?php echo $User['No_Ktp'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $User['Email'] ?></td>
                </tr>
                <tr>
                    <td>WA</td>
                    <td>:</td>
                    <td><?php echo $User['No_WA'] ?></td>
                </tr>
                <tr>
                    <td>Telegram</td>
                    <td>:</td>
                    <td><?php echo $User['No_Telegram'] ?></td>
                </tr>

                <tr>
                    <td>Surat Tugas</td>
                    <td>:</td>
                    <td>
                        <?php
                            if ($User['Surat_tugas'] != null){
                        ?>
                            <a target="_BLANK" href="<?php echo base_url('/storage/surat_tugas_user/'. $User['Surat_tugas']) ?>" class="label label-primary">Lihat Surat Tugas</a></td>
                        <?php
                            }
                            else{
                                echo '<i>Surat tugas masih kosong</i>';
                            }
                        ?>
                </tr>
            </table>   
            
            <?php
                if ($User['IsActive'] == 1){
            ?>
                    <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#nonAktifModal">Non Aktifkan</a>

            <?php
                }
                else{
            ?>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAktifUser" class="btn btn-primary">Aktivasi User</a>
            <?php
                }
            ?>

        </div>
    </div>


    



    <div class="tab-pane np" id="comments">
        <div class="panel-body">
            <form action="<?php echo base_url('admin/manajemen/pengguna/reset/'.$User['Id_User']) ?>" method="POST" class="form-horizontal">
                
               
                <div class="form-group">
                    <label class="control-label col-md-3">Password Baru</label>
                    <div class="col-md-6">
                        <input type="password" name="Password" class="form-control" required="">
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



<!-- Modal -->
<div id="nonAktifModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Non Aktifkan User</h4>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url('admin/manajemen/pengguna/nonaktif') ?>" method="POST" id="form-pokja-kaji" enctype="multipart/form-data">
            <input type="hidden" name="Id_User" value="<?php echo $User['Id_User'] ?>">
            
            <p>Apakah anda yakin akan menonaktifkan pengguna ini?</p>

            <input type="submit" class="btn btn-success" value="Ya"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            
        </form> 
    </div>
    </div>
  </div>
</div>

<!-- modalAktifUser -->

<div id="modalAktifUser" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Aktivasi User</h4>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url('admin/manajemen/pengguna/aktif') ?>" method="POST" id="form-pokja-kaji" enctype="multipart/form-data">
            <input type="hidden" name="Id_User" value="<?php echo $User['Id_User'] ?>">
            
            <p>Apakah anda yakin akan mengaktifkan kembali pengguna ini?</p>

            <input type="submit" class="btn btn-success" value="Ya"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            
        </form> 
    </div>
    </div>
  </div>
</div>
