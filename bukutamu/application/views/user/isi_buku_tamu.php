<form action="<?php echo base_url('bukutamu/isi') ?>" method="POST" id="modalIsin">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">

                <div class="panel panel-light">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Isi Buku Tamu
                        </h4>
                        <p>Silahkan isi formulir dibawah ini. Pastikan isian bertanda bintang <span class="text-danger">*</span> terisi. Ambil juga foto anda untuk mempermudah kami dalam antian.</p>
                    </div>
                    <div class="panel-body">
                        
                        <div class="row">
                            
                            <div class="col-md-8">
                                
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Nama <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nama" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">NIP/No KTP</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nip_noktp">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jenis</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="jenis">
                                                <option value="Penyedia">Penyedia</option>
                                                <option value="Instansi">Instansi</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Nama Penyedia/Instansi</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="instansi">
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Skpd</label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="Master_Skpd_Id">
                                                <option></option>
                                                <?php
                                                    foreach ($master_skpd as $key => $value) {
                                                        echo '<option value="'.$value['Master_Skpd_Id'].'">'.$value['Nama_Skpd'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3">No. Telp <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="no_telp" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Unit Tujuan <span class="text-danger">*</span></label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="unit_tujuan" required="">
                                                <?php
                                                    foreach ($user as $key => $value) {
                                                        echo '<option value="'.$value['Slug_Jabatan'].'">'.$value['Nama_Jabatan'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Keperluan <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <textarea name="keperluan" class="form-control" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3"></label>
                                        <div class="col-md-9">
                                            <button class="button button-md button-success button-block"><i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                
                                    <img id="targetGamber" style="width: 100%;">
                                    <textarea id="textGambar" name="photo" style="display: none;"></textarea>

                                    <a href="javascript:void(0)" class="button button-md button-rounded button-blue" style="display: block;" onclick="show_mdl()"><i class="fa fa-photo"></i> Ambil Foto Anda</a>   

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade " id="modalAbsen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" id="modaltar"  style="width: 680px !important; text-align: center;">
        <div class="modal-content " style="top: 20px; text-align: center;">
            <div class="modal-body">
                <video id="video" style="cursor:pointer;" autoplay ></video>
                <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
                <script src="<?php echo base_url('resources') ?>/dist/js/photo.js"></script>
            </div>
            <div class="modal-footer">
                <button type="button" class="button button-md button-rounded button-cyan" onclick="snap();"><i class="fa fa-check"></i> Ambil Foto</button>
                <button type="button" class="button button-md button-rounded button-red" data-dismiss="modal" onclick="clear_photo();">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('#modalIsin').on("submit", function(e){
            if ($('#textGambar').val() == ""){
                alert("Mohon mengambil foto anda terlebih dahulu");
                show_mdl();
                e.preventDefault();
            }
        })
    })
</script>