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
            <h4 class="semibold">Selamat Datang Frontoffice</h4>
            <p class="mb10">
            <ol>
                <li>Daftar Pengajuan Pengadaan yang telah masuk dapat dilihat di halaman Daftar Pengajuan</li>
                <li>Mohon menjaga username dan password</li>
                <li>Terakhir Login pada <?php echo $user['Last_Login'] ?> dan terakhir Logout pada <?php echo $user['Last_Logout'] ?></li>
            </ol>
            </p>
        </div>
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
        <a href="<?php echo base_url('fo/pengajuan') ?>">
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

</div>

<?php $this->load->view('universal/daftar_pengajuan_table'); ?>


