<?php
    //KONEKSI KE DATABASE SQL
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //TANGKAP VARIABEL DARI FORMULIR LOGIN.PHP
    $username=$_POST["username"];
    $password=$_POST["password"];
    //QUERY MEMANGGIL DATA DARI DATABASE PELANGGAN
    $QueryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE username='$username' AND password='$password'")or die(mysqli_error($conn));
    $DataAkses = mysqli_fetch_array($QueryAkses);
    $MyIdAkses=$DataAkses["id_akses"];
    $MyUsername=$DataAkses["username"];
    $MyLevel=$DataAkses["akses"];

    //CEK APAKAH USERNAME ADA DALAM DATABASE
    if(!empty($DataAkses["id_akses"])){
        //Jika valid-langsung masuk SESSION Siswa
        session_start();
        $_SESSION ["id_akses"]= $MyIdAkses;
        $_SESSION ["NotifikasiSwal"]="Login Berhasil";
        echo "<b class='text-primary' id='NotifikasiLoginBerhasil'>Login Berhasil</b>";
    }else{
        echo "<b class='text-danger' id='NotifikasiLoginBerhasil'>Mohon maaf, informasi akses salah!</b>";
    }	
?>