 <div class="row pt50 pb50 bg-light">
    <div class="col-md-12">
        <h3 class="text-center">                            
            Penyimpanan Berhasil 
            <small class="heading-desc">
                Terimakasih, Data anda sudah kami simpan
            </small>
            <small class="heading heading-solid center-block"> </small>
        </h3>
    </div>

    <div class="col-md-5">
        <div class="panel panel-light">
            <div class="panel-heading">
                <i class="fa fa-check"></i>Rincian Data
            </div>
            <div class="panel-body">
                <table class="table">
					<tr>
						<td>Nama</td>
						<td><?php echo $nama ?></td>
					</tr>
					<tr>
						<td>NIP/No. KTP</td>
						<td><?php echo $nip_noktp ?></td>
					</tr>
					<tr>
						<td>Jenis</td>
						<td><?php echo $jenis ?></td>
					</tr>
					<tr>
						<td>Nama Penyedia/Instansi</td>
						<td><?php echo $instansi ?></td>
					</tr>
					<tr>
						<td>No. Telp</td>
						<td><?php echo $no_telp ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $email ?></td>
					</tr>
					<tr>
						<td>Unit Tujuan</td>
						<td><?php echo $unit_tujuan ?></td>
					</tr>
					<tr>
						<td>Keperluan</td>
						<td><?php echo $keperluan ?></td>
					</tr>

                </table>
            </div>                                
        </div>
    </div>
	
    <div class="col-md-7">
    	<div style="text-align: center; margin-bottom: 20px;">
    		<img src="<?php echo $foto ?>" style="width: 40%">
    	</div>
		<blockquote>
	        Kode Anda Adalah : <strong class="color-pasific"><?php echo $kode ?></strong><br>
	        Nomor Antrian	: <strong><?php echo $no_urut ?></strong>
	        <footer>Masih Ada <strong class="color-pasific"><?php echo $mengantri ?></strong> Orang yang mengantri. Silahkan menunggu kami panggil</footer>
	    </blockquote>
	    <a href="<?php echo base_url('bukutamu/isi') ?>" class="button button-sm button-rounded button-pasific"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

</div>