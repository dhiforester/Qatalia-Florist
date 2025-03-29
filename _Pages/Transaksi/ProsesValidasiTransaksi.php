<?php
    date_default_timezone_set("Asia/Jakarta");
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['status_pembayaran'])){
            echo '<span class="text-danger">Status Pembayaran Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['status_pengiriman'])){
                echo '<span class="text-danger">Status Pengiriman Tidak Boleh Kosong</span>';
            }else{
                $id_transaksi=$_POST['id_transaksi'];
                $status_pembayaran=$_POST['status_pembayaran'];
                $status_pengiriman=$_POST['status_pengiriman'];
                //Update Transaksi
                $UpdateTransaksi = mysqli_query($Conn,"UPDATE transaksi SET 
                    status_pembayaran='$status_pembayaran',
                    status_pengiriman='$status_pengiriman'
                WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                if($UpdateTransaksi){
                    $_SESSION ["NotifikasiSwal"]="Update Transaksi Berhasil";
                    echo '<span class="text-success" id="NotifikasiValidasiTransaksiBerhasil">Berhasil</span>';
                }else{
                    echo '<span class="text-danger">Gagal Update Transaksi</span>';
                }
            }
        }
    }
?>