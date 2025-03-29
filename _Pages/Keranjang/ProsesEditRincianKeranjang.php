<?php
    date_default_timezone_set("Asia/Jakarta");
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_rincian'])){
        echo '<span class="text-danger">ID Rincian Tidak Boleh Kosong.</span>';
    }else{
        if(empty($_POST['qty'])){
            echo '<span class="text-danger">Jumlah QTY Tidak Boleh Kosong.</span>';
        }else{
            $id_rincian=$_POST['id_rincian'];
            $qty=$_POST['qty'];
            //Simpan perubahan
            $UpdateRincian = mysqli_query($Conn,"UPDATE rincian SET qty='$qty' WHERE id_rincian='$id_rincian'") or die(mysqli_error($Conn)); 
            if($UpdateRincian){
                echo '<span class="text-success" id="NotifikasiEditRincianBerhasil">Berhasil</span>';
            }else{
                echo '<span class="text-danger">Gagal melakukan Update Rincian Keranjang</span>';
            }
        }
    }
?>