<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //tangkap GET id_transaksi
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['testimoni'])){
            echo '<span class="text-danger">Testimoni Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['saran_kritik'])){
                echo '<span class="text-danger">Saran Kritik Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['id_barang'])){
                    echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['reting'])){
                        echo '<span class="text-danger">Reting Tidak Boleh Kosong!</span>';
                    }else{
                        $id_transaksi=$_POST['id_transaksi'];
                        $testimoni=$_POST['testimoni'];
                        $saran_kritik=$_POST['saran_kritik'];
                        $id_barang=$_POST['id_barang'];
                        $reting=$_POST['reting'];
                        if(empty(count($id_barang))){
                            echo '<span class="text-danger">ID Barang Tidak ada !</span>';
                        }else{
                            if(empty(count($reting))){
                                echo '<span class="text-danger">Reting Belum Diisi !</span>';
                            }else{
                                //Simpan Testimoni
                                $Entry="INSERT INTO testimoni (
                                    id_transaksi,
                                    id_akses,
                                    testimoni,
                                    saran_kritik,
                                    status
                                ) VALUES (
                                    '$id_transaksi',
                                    '$SessionIdAkses',
                                    '$testimoni',
                                    '$saran_kritik',
                                    'Publikasikan'
                                )";
                                $InputTestimoni=mysqli_query($Conn, $Entry);
                                if($InputTestimoni){
                                    $JumlahBarang=count($id_barang);
                                    $JumlahReting=count($reting);
                                    for($i=0; $i<=$JumlahBarang; $i++ ){
                                        if(!empty($id_barang[$i])){
                                            $GetIdBarang=$id_barang[$i];
                                        }else{
                                            $GetIdBarang=0;
                                        }
                                        if(!empty($reting[$i])){
                                            $GetRetting=$reting[$i];
                                        }else{
                                            $GetRetting=0;
                                        }
                                        //Simpan Ke data retting
                                        $EntryReting="INSERT INTO reting (
                                            id_transaksi,
                                            id_akses,
                                            id_barang,
                                            reting
                                        ) VALUES (
                                            '$id_transaksi',
                                            '$SessionIdAkses',
                                            '$GetIdBarang',
                                            '$GetRetting'
                                        )";
                                        $InputReting=mysqli_query($Conn, $EntryReting);
                                    }
                                    $_SESSION ["NotifikasiSwal"]="Simpan Testimoni Berhasil Berhasil";
                                    echo "<b class='text-success' id='NotifikasiIsiTestimoniBerhasil'>Berhasil</b>";
                                }else{
                                    echo "<b class='text-danger'>Gagal Menyimpan Data Testimoni</b>";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>