<?php
    date_default_timezone_set("Asia/Jakarta");
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_rincian'])){
        echo '<span class="text-danger">ID Rincian Tidak Boleh Kosong.</span>';
    }else{
        $id_rincian=$_POST['id_rincian'];
        $HapusRincian= mysqli_query($Conn, "DELETE FROM rincian WHERE id_rincian='$id_rincian'") or die(mysqli_error($Conn));
        if($HapusRincian){
            echo '<span class="text-success" id="NotifikasiHapusRincianKeranjang">Berhasil</span>';
        }else{
            echo '<span class="text-danger">Gagal Menghapus Rincian</span>';
        }
    }
?>