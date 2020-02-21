<div class="panel panel-light">
    <div class="panel-body">
        
   
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
                
                <form action="<?php echo base_url('home/profilEdit') ?>" method="POST" class="form-horizontal">
                    
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
                            <input type="text" name="No_Ktp" class="form-control" value="<?php echo $user['NIP_User'] ?>">
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
                <form action="<?php echo base_url('home/passwordUbah') ?>" method="POST" class="form-horizontal">

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
 </div>
</div>
