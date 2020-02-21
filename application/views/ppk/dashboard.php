<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Dashboard</h4>
    </div>
    <div class="page-header-section">
        <!-- Toolbar -->
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <!--/ Toolbar -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        
        <div class="alert alert-success">
            <h4 class="semibold">Selamat Datang PPK</h4>
            <p class="mb10">
            <ol>
                <li>Semua proses pengajuan pengadaan harus dilakukan melalui sistem ini</li>
                <li>Segala bentuk aktivitas dan komunikasi terekam melalui sistem ini</li>
                <li>Mohon menjaga username dan password, PPK bertanggung jawab terhasap username dan password masing-masing</li>
                 <li>Terakhir Login pada <?php echo $user['Last_Login'] ?> dan terakhir Logout pada <?php echo $user['Last_Logout'] ?></li>
            </ol>
            </p>
        </div>

        <?php
            if ($user['Nama_Lengkap'] == NULL || $user['Nama_Lengkap'] == ''){
        ?>
                <div class="alert alert-danger">
                    <h4 class="semibold">Perhatian</h4>
                    <p class="mb10">
                        Anda belum melengkapi data akun anda. Mohon memasukannya dengan mengedit detail akun anda di halaman berikut.
                    </p>    
                        <a href="<?php echo base_url('profil') ?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Edit Akun</a>
                </div> 
        <?php
            }
        ?>

    </div>
    

    <div class="col-sm-3">
        <a href="<?php echo base_url('profil') ?>">
            <div class="table-layout">
                <div class="col-xs-3 panel bgcolor-success text-center">
                    <div class="fa fa-user fsize24"></div>
                </div>
                <div class="col-xs-9 panel">
                    <div class="panel-body text-center">
                        <h5 class="semibold text-muted mb0 mt5 ellipsis">Profil Saya</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="<?php echo base_url('ppk/pengajuan') ?>">
            <div class="table-layout">
                <div class="col-xs-3 panel bgcolor-info text-center">
                    <div class="ico-list fsize24"></div>
                </div>
                <div class="col-xs-9 panel">
                    <div class="panel-body text-center">
                        <h5 class="semibold text-muted mb0 mt5 ellipsis">Daftar Pengajuan</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="<?php echo base_url('ppk/pengajuan/tambah') ?>">
            <div class="table-layout">
                <div class="col-xs-3 panel bgcolor-danger text-center">
                    <div class="fa fa-plus fsize24"></div>
                </div>
                <div class="col-xs-9 panel">
                    <div class="panel-body text-center">
                        <h5 class="semibold text-muted mb0 mt5 ellipsis">Pengajuan Baru</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>


<?php $this->load->view('universal/daftar_pengajuan_table'); ?>
