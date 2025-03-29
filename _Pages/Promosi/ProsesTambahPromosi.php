<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['id_barang'])){
        echo "<span class='text-danger'>Barang/Produk Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['diskon'])){
            echo "<span class='text-danger'>Diskon Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['periode_awal'])){
                echo "<span class='text-danger'>Periode Awal Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['periode_akhir'])){
                    echo "<span class='text-danger'>Periode Akhir Tidak Boleh Kosong!!</span>";
                }else{
                    $id_barang=$_POST['id_barang'];
                    $diskon=$_POST['diskon'];
                    $periode_awal=$_POST['periode_awal'];
                    $periode_akhir=$_POST['periode_akhir'];
                    //Validasi Hanya angka
                    if(!preg_match("/^[0-9]*$/", $diskon)){
                        echo "<span class='text-danger'>Diskon Hanya Boleh Diisi Angka!!</span>";
                    }else{
                        $entry="INSERT INTO diskon (
                            id_barang,
                            periode_awal,
                            periode_akhir,
                            diskon
                        ) VALUES (
                            '$id_barang',
                            '$periode_awal',
                            '$periode_akhir',
                            '$diskon'
                        )";
                        $Input=mysqli_query($Conn, $entry);
                        if($Input){
                            echo "<span class='text-success' id='NotifikasiTambahPromosiBerhasil'>Tambah Promosi Berhasil</span>";
                        }else{
                            echo "<span class='text-danger'>Tambah Ongkir Gagal!!</span>";
                        }
                    }
                }
            }
        }
    }
?>