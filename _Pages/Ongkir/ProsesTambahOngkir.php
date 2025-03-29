<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['provinsi'])){
        echo "<span class='text-danger'>Provinsi Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['kabupaten'])){
            echo "<span class='text-danger'>Kabupaten Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['kecamatan'])){
                echo "<span class='text-danger'>Kecamatan Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['desa'])){
                    echo "<span class='text-danger'>Desa Tidak Boleh Kosong!!</span>";
                }else{
                    if(empty($_POST['ongkir'])){
                        $ongkir=0;
                    }else{
                        $ongkir=$_POST['ongkir'];
                    }
                    $provinsi=$_POST['provinsi'];
                    $kabupaten=$_POST['kabupaten'];
                    $kecamatan=$_POST['kecamatan'];
                    $desa=$_POST['desa'];
                    //Validasi Hanya angka
                    if(!preg_match("/^[0-9]*$/", $ongkir)){
                        echo "<span class='text-danger'>Form Ongkir Hanya Boleh Diisi Angka!!</span>";
                    }else{
                        $entry="INSERT INTO ongkir (
                            provinsi,
                            kabupaten,
                            kecamatan,
                            desa,
                            ongkir
                        ) VALUES (
                            '$provinsi',
                            '$kabupaten',
                            '$kecamatan',
                            '$desa',
                            '$ongkir'
                        )";
                        $Input=mysqli_query($Conn, $entry);
                        if($Input){
                            echo "<span class='text-success' id='NotifikasiTambahOngkirBerhasil'>Tambah Ongkir Berhasil</span>";
                        }else{
                            echo "<span class='text-danger'>Tambah Ongkir Gagal!!</span>";
                        }
                    }
                }
            }
        }
    }
?>