<?php
    //KONEKSI KE DATABASE SQL
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //TANGKAP VARIABEL DARI FORMULIR LOGIN.PHP
    $PilihKecamatan=$_POST["PilihKecamatan"];
    echo '<option>-Pilih Desa-</option>';
    $QryKabupaten = mysqli_query($Conn, "SELECT*FROM ongkir WHERE kecamatan='$PilihKecamatan' ORDER BY desa ASC");
    while ($DataKabupaten = mysqli_fetch_array($QryKabupaten)) {
        $id_ongkir= $DataKabupaten['id_ongkir'];
        $desa= $DataKabupaten['desa'];
        if(!empty($DataKabupaten['desa'])){
            echo '<option value="'.$id_ongkir.'">'.$desa.'</option>';
        }
    }
?>