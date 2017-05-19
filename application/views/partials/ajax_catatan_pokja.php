<table class="table">
        <tr>
                <th>Nama Pokja</th>
                <th>Catatan</th>
                <?php
                        if ($loginUser['Slug_Jabatan'] == 'pokja'){
                                echo "<th>Aksi</th>";
                        }
                ?>
        </tr>
<?php
foreach ($ar_catatan as $key => $value) {
        echo '
            <tr>
                <td>'.$value['Nama_Lengkap'].'</td>
                <td>'.$value['Isi_Catatan'].'</td>
                <td>
                    <a href="'. base_url('pokja/pengajuan/hapuscatatan/' . $value['Id_Catatan'].'/'. $Id_Pengajuan_Pengadaan) .'" title="Hapus" data-toggle="tooltip" class="btn btn-xs btn-danger"><i class="ico-trash"></i></a>

                </td>
            </tr>
        ';
}
?>

</table>