<?php
    //Koneksi dan SessionLogin
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['id_ongkir'])){
        echo "<span class='text-danger'>ID Ongkir Tidak Boleh Kosong</span>";
    }else{
        $id_ongkir=$_POST['id_ongkir'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM ongkir WHERE id_ongkir='$id_ongkir'") or die(mysqli_error($Conn));
        if($query) {
            echo "<span class='text-success' id='NotifikasiHapusOngkirBerhasil'>Hapus Berhasil</span>";
        }else{
            echo "<span class='text-danger'>Terjadi Kesalahan Pada Saat Menghapus Data</span>";
        }
    }
?>