<?php
    //Koneksi dan SessionLogin
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses Tidak Boleh Kosong!</span>';
    }else{
        //Buat Variabel
        $id_akses=$_POST['id_akses'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM akses WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
        if($query) {
            echo '<span class="text-success" id="NotifikasiHapusAksesBerhasil">Berhasil</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Akses Gagal!</span>';
        }
    }
?>