<?php
    //KONEKSI KE DATABASE SQL
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //TANGKAP VARIABEL DARI FORMULIR LOGIN.PHP
    $Provinsi=$_POST["Provinsi"];
    echo '<option>-Pilih Kabupaten-</option>';
    $QryKabupaten = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$Provinsi' ORDER BY kabupaten ASC");
    while ($DataKabupaten = mysqli_fetch_array($QryKabupaten)) {
        $id_ongkir= $DataKabupaten['id_ongkir'];
        $kabupaten= $DataKabupaten['kabupaten'];
        if(!empty($DataKabupaten['kabupaten'])){
            echo '<option value="'.$kabupaten.'">'.$kabupaten.'</option>';
        }
        
    }
?>