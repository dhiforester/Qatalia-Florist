<?php
    //Koneksi dan SessionLogin
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['id_diskon'])){
        echo "<span class='text-danger'>ID Promosi Tidak Boleh Kosong</span>";
    }else{
        $id_diskon=$_POST['id_diskon'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM diskon WHERE id_diskon='$id_diskon'") or die(mysqli_error($Conn));
        if($query) {
            echo "<span class='text-success' id='NotifikasiHapusPromosiBerhasil'>Hapus Berhasil</span>";
        }else{
            echo "<span class='text-danger'>Terjadi Kesalahan Pada Saat Menghapus Data</span>";
        }
    }
?>