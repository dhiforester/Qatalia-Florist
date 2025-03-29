<?php
    date_default_timezone_set("Asia/Jakarta");
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_Transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong</span>';
    }else{
        $id_transaksi=$_POST['id_Transaksi'];
        //Hapus Transaksi
        $HapusTransaksi= mysqli_query($Conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
        if($HapusTransaksi){
            $HapusKeranjang= mysqli_query($Conn, "DELETE FROM rincian WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
            if($HapusKeranjang){
                $_SESSION ["NotifikasiSwal"]="Hapus Keranjang Berhasil";
                echo '<span class="text-success" id="NotifikasiHapusTransaksiAdminBerhasil">Berhasil</span>';
            }else{
                echo '<span class="text-danger">Gagal Menghapus Keranjang</span>';
            }
        }else{
            echo '<span class="text-danger">Gagal Menghapus Transaksi</span>';
        }
    }
?>