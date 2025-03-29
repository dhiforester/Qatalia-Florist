<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Form Data
    if(empty($_POST['id_ongkir'])){
        echo "<span class='text-danger'>ID Ongkir Tidak Boleh Kosong!!</span>";
    }else{
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
                        $id_ongkir=$_POST['id_ongkir'];
                        $provinsi=$_POST['provinsi'];
                        $kabupaten=$_POST['kabupaten'];
                        $kecamatan=$_POST['kecamatan'];
                        $desa=$_POST['desa'];
                        //Validasi Hanya angka
                        if(!preg_match("/^[0-9]*$/", $ongkir)){
                            echo "<span class='text-danger'>Form Ongkir Hanya Boleh Diisi Angka!!</span>";
                        }else{
                            $UpdateOngkir = mysqli_query($Conn,"UPDATE ongkir SET 
                                provinsi='$provinsi',
                                kabupaten='$kabupaten',
                                kecamatan='$kecamatan',
                                desa='$desa',
                                ongkir='$ongkir'
                            WHERE id_ongkir='$id_ongkir'") or die(mysqli_error($Conn)); 
                            if($UpdateOngkir){
                                echo "<span class='text-success' id='NotifikasiEditOngkirBerhasil'>Update Berhasil</span>";
                            }else{
                                echo "<span class='text-danger'>Update Produk Gagal</span>";
                            }
                        }
                    }
                }
            }
        }
    }
?>