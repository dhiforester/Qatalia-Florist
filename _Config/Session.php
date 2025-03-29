<?php
    include "Connection.php";
    session_start();
    if (isset($_SESSION['id_akses']) || !empty($_SESSION['id_akses'])){
        $SessionIdAkses=$_SESSION['id_akses'];
        //panggil dari database
        $QuerySessionAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
        $DataSessionAkses = mysqli_fetch_array($QuerySessionAkses);
        //rincian profile user
        $SessionEmail= $DataSessionAkses['email'];
        $SessionUsername = $DataSessionAkses['username'];
        $SessionPassword= $DataSessionAkses['password'];
        $SessionAkses= $DataSessionAkses['akses'];
        if($SessionAkses=="Pelanggan"){
            //Panggil Profile Pelanggan
            $QryProfilePelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
            $DataProfilePelanggan = mysqli_fetch_array($QryProfilePelanggan);
            $NamaProfilePelanggan= $DataProfilePelanggan['nama'];
            $IdOngkirProfilePelanggan= $DataProfilePelanggan['id_ongkir'];
            $EmailProfilePelanggan= $SessionEmail;
            $AlamatProfilePelanggan= $DataProfilePelanggan['alamat'];
            $KontakProfilePelanggan= $DataProfilePelanggan['kontak'];
            //membuka data ongkir yang bersangkutan
            $QryProfileOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$IdOngkirProfilePelanggan'")or die(mysqli_error($Conn));
            $DataProfileOngkir = mysqli_fetch_array($QryProfileOngkir);
            $ProvinsiProfilePelanggan= $DataProfileOngkir['provinsi'];
            $KabupatenProfilePelanggan= $DataProfileOngkir['kabupaten'];
            $KecamatanProfilePelanggan= $DataProfileOngkir['kecamatan'];
            $DesaProfilePelanggan= $DataProfileOngkir['desa'];
            $OngkirProfilePelanggan= $DataProfileOngkir['ongkir'];
            $RpOngkir="Rp" . number_format($OngkirProfilePelanggan,0,',','.');
        }else{
            if($SessionAkses=="Kurir"){
                $NamaProfilePelanggan= $DataSessionAkses['nama'];
                $IdOngkirProfilePelanggan="";
                $AlamatProfilePelanggan="";
                $EmailProfilePelanggan=$SessionEmail;
                $AlamatProfilePelanggan="";
                $KontakProfilePelanggan="";
                $KontakProfilePelanggan="";
                $ProvinsiProfilePelanggan="";
                $KabupatenProfilePelanggan="";
                $KecamatanProfilePelanggan="";
                $DesaProfilePelanggan="";
                $OngkirProfilePelanggan="";
                $RpOngkir="";
            }else{
                $NamaProfilePelanggan= $DataSessionAkses['nama'];
                $IdOngkirProfilePelanggan="";
                $AlamatProfilePelanggan="";
                $EmailProfilePelanggan=$SessionEmail;
                $AlamatProfilePelanggan="";
                $KontakProfilePelanggan="";
                $KontakProfilePelanggan="";
                $ProvinsiProfilePelanggan="";
                $KabupatenProfilePelanggan="";
                $KecamatanProfilePelanggan="";
                $DesaProfilePelanggan="";
                $OngkirProfilePelanggan="";
                $RpOngkir="";
            }
        }
    }else{
        $SessionIdAkses="";
        $SessionEmail="";
        $SessionUsername ="";
        $SessionPassword="";
        $SessionAkses="";
    }
?>