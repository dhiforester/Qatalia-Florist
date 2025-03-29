<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Update Transaksi
        $status_pengiriman="Sampai Tujuan";
        $UpdateTransaksi = mysqli_query($Conn,"UPDATE transaksi SET 
            status_pengiriman='$status_pengiriman'
        WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
        if($UpdateTransaksi){
            echo '<span class="text-success" id="NotifikasiKonfirmasiTransaksiSelesaiBerhasil">Berhasil</span>';
        }else{
            echo '<span class="text-danger">Gagal Update Transaksi</span>';
        }
    }
?>