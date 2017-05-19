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
            <h4 class="semibold">Selamat Datang Kepala Sub Bagian MOnev</h4>
            <p class="mb10">
            <ol>
                <li>Daftar Pengajuan Pengadaan yang telah masuk dapat dilihat di halaman Daftar Pengajuan</li>
                <li>Mohon menjaga username dan password</li>
                <li>Terakhir Login pada <?php echo $user['Last_Login'] ?> dan terakhir Logout pada <?php echo $user['Last_Logout'] ?></li>
            </ol>
            </p>
        </div>

    </div>
</div>
<?php $this->load->view('universal/daftar_pengajuan_table'); ?>
