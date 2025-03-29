<?php
    //KONEKSI KE DATABASE SQL
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //TANGKAP VARIABEL DARI FORMULIR LOGIN.PHP
    $PilihKabupaten=$_POST["PilihKabupaten"];
    echo '<option>-Pilih Kecamatan-</option>';
    $QryKabupaten = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$PilihKabupaten' ORDER BY kecamatan ASC");
    while ($DataKabupaten = mysqli_fetch_array($QryKabupaten)) {
        $id_ongkir= $DataKabupaten['id_ongkir'];
        $kecamatan= $DataKabupaten['kecamatan'];
        if(!empty($DataKabupaten['kecamatan'])){
            echo '<option value="'.$kecamatan.'">'.$kecamatan.'</option>';
        }
    }
?>