
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Profil Saya</h4>
    </div>
    <div class="page-header-section">
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Profil</a></li>
                <li class="active">Detail</li>
            </ol>
        </div>
    </div>
</div>

<div class="section-header mb15">
    <h5 class="semibold">Detail Profil Pengguna</h5>
</div>

<?php
    if($this->session->flashdata('pesan_pas') != null) {
        
        $pesan      = $this->session->flashdata('pesan_pas');
        $isi_pesan  = $pesan['isi'];
        $tipe_pesan = $pesan['tipe'];

        echo '<div class="alert alert-danger"><h4 class="title semibold">Edit Password Gagal</h4><p>'.$isi_pesan.'</p></div>';
    }

?>

        
<ul class="nav nav-tabs">
    <li class="active"><a href="#popular" data-toggle="tab">Profil User</a></li>
    <li><a href="#comments" data-toggle="tab">Password Pengguna</a></li>
</ul>

<div class="tab-content panel">
    <div class="tab-pane active np" id="popular">
        <div class="panel-body">
            
            <form action="<?php echo base_url('profil') ?>" method="POST" class="form-horizontal">
                
                <div class="form-group">
                    <label class="control-label col-md-3">Username</label>
                    <div class="col-md-6">
                        <input type="text" name="Username" class="form-control" value="<?php echo $user['Username'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input type="text" name="Nama_Lengkap" class="form-control" value="<?php echo $user['Nama_Lengkap'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">NIP</label>
                    <div class="col-md-6">
                        <input type="text" name="NIP_User" class="form-control" value="<?php echo $user['NIP_User'] ?>">
                        <span class="help-block">Kosongkan apabila non PNS</span>
                    </div>
                </div>

        
                <div class="form-group">
                    <label class="control-label col-md-3">No. KTP</label>
                    <div class="col-md-6">
                        <input type="text" name="No_Ktp" class="form-control" value="<?php echo $user['No_Ktp'] ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3">No. HP</label>
                    <div class="col-md-6">
                        <input type="text" name="No_Hp_User" class="form-control" value="<?php echo $user['No_Hp_User'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-6">
                        <input type="text" name="Email" class="form-control" value="<?php echo $user['Email'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">No. WA</label>
                    <div class="col-md-6">
                        <input type="text" name="No_WA" class="form-control" value="<?php echo $user['No_WA'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">No. Telegram</label>
                    <div class="col-md-6">
                        <input type="text" name="No_Telegram" class="form-control" value="<?php echo $user['No_Telegram'] ?>">
                    </div>
                </div>

                <?php
                    if($user['Slug_Jabatan'] == 'ppk'){
                ?>

                    <div class="form-group">
                        <label class="control-label col-md-3">OPD</label>
                        <div class="col-md-4">
                            <select name="Master_Skpd_Id" class="form-control">
                                <option></option>
                                <?php
                                    foreach ($skpd as $key => $value) {
                                        if ($user['Master_Skpd_Id'] == $value['Master_Skpd_Id']){

                                            echo '<option selected value="'.$value['Master_Skpd_Id'].'">'.$value['Nama_Skpd'].'</option>';
                                        }
                                        else{
                                            echo '<option value="'.$value['Master_Skpd_Id'].'">'.$value['Nama_Skpd'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <span class="help-block">Khusus Akun PPK</span>
                        </div>
                    </div>

                <?php
                    }
                ?>

                <div class="form-group">
                    <label class="control-label col-md-3">Surat Tugas</label>
                    <div class="col-md-6">
                        <?php
                            if ($user['Surat_tugas'] != null){
                        ?>
                            <a target="_BLANK" href="<?php echo base_url('/storage/surat_tugas_user/'. $user['Surat_tugas']) ?>" class="label label-primary">Lihat Surat Tugas</a></td>
                        <?php
                            }
                            else{
                                echo '<i>Surat tugas masih kosong</i>';
                            }
                        ?>
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

    <div class="tab-pane np" id="comments">
        <div class="panel-body">
            <form action="<?php echo base_url('profil/password') ?>" method="POST" class="form-horizontal">

                <div class="form-group">
                    <label class="control-label col-md-3">Password Lama</label>
                    <div class="col-md-6">
                        <input type="password" name="Password_l" class="form-control" required="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3">Password Baru</label>
                    <div class="col-md-6">
                        <input type="password" name="Password_n" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Konfirmasi Password Baru</label>
                    <div class="col-md-6">
                        <input type="password" name="Password_k" class="form-control" required="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3"></label>
                    <div class="col-md-6">
                        <button class="btn btn-info" type="submit"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>                
