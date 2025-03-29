<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Validasi Form Data
    if(empty($_POST['id_barang'])){
        echo "<span class='text-danger'>ID Produk Tidak Boleh Kosong</span>";
    }else{
        if(empty($_POST['nama_produk'])){
            echo "<span class='text-danger'>Nama Produk Tidak Boleh Kosong</span>";
        }else{
            if(empty($_POST['satuan'])){
                echo "<span class='text-danger'>Satuan Produk Tidak Boleh Kosong</span>";
            }else{
                if(empty($_POST['keterangan'])){
                    echo "<span class='text-danger'>Keterangan Produk Tidak Boleh Kosong</span>";
                }else{
                    if(empty($_POST['kategori'])){
                        echo "<span class='text-danger'>Kategori Produk Tidak Boleh Kosong</span>";
                    }else{
                        $id_barang=$_POST['id_barang'];
                        $nama_produk=$_POST['nama_produk'];
                        $satuan=$_POST['satuan'];
                        $keterangan=$_POST['keterangan'];
                        $kategori=$_POST['kategori'];
                        if(empty($_POST['stok'])){
                            $harga=0;
                        }else{
                            $stok=$_POST['stok'];
                        }
                        if(empty($_POST['harga'])){
                            $harga=0;
                        }else{
                            $harga=$_POST['harga'];
                        }
                        //Apabila Tidak Ada File Gambar Maka LAngsung Update
                        if(empty($_FILES['filegambar']['name'])){
                            $Updatebarang = mysqli_query($Conn,"UPDATE barang SET 
                                nama_barang='$nama_produk',
                                harga='$harga',
                                satuan='$satuan',
                                stok='$stok',
                                keterangan='$keterangan',
                                kategori='$kategori'
                            WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                            if($Updatebarang){
                                echo "<span class='text-success' id='NotifikasiEditProdukBerhasil'>Update Berhasil</span>";
                            }else{
                                echo "<span class='text-danger'>Update Produk Gagal</span>";
                            }
                        }else{
                            //Sebaliknya apabila ada file gambar maka inisiasi terlebih dulu
                            //nama gambar
                            $nama_gambar=$_FILES['filegambar']['name'];
                            //ukuran gambar
                            $ukuran_gambar = $_FILES['filegambar']['size']; 
                            //tipe
                            $tipe_gambar = $_FILES['filegambar']['type']; 
                            //sumber gambar
                            $tmp_gambar = $_FILES['filegambar']['tmp_name'];
                            //Simpan Gambar di
                            $milliseconds = round(microtime(true) * 1000);
                            $Pecah = explode("." , $nama_gambar);
                            $BiasanyaNama=$Pecah[0];
                            $Ext=$Pecah[1];
                            $NamaBaru = "$milliseconds.$Ext";
                            //Simpan Gambar di
                            $path = "../../images/produk/".$NamaBaru;
                            //Validasi tipe gambar
                            if($tipe_gambar == "image/jpeg" || $tipe_gambar == "image/png" || $tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"){
                                //Upload file
                                if(move_uploaded_file($tmp_gambar, $path)){
                                    //Buka File lama
                                    $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                    $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
                                    $GambarLama = $DataDetailproduk['gambar'];
                                    $path_gambar_lama = "../../images/produk/".$GambarLama;
                                    //Hapus Gambar lama
                                    unlink($path_gambar_lama); 
                                    //apabila syarat terpenuhi lakukan update
                                    $Updatebarang = mysqli_query($Conn,"UPDATE barang SET 
                                        nama_barang='$nama_produk',
                                        harga='$harga',
                                        satuan='$satuan',
                                        stok='$stok',
                                        keterangan='$keterangan',
                                        kategori='$kategori',
                                        gambar='$NamaBaru'
                                    WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                    if($Updatebarang){
                                        echo "<span class='text-success' id='NotifikasiEditProdukBerhasil'>Update Berhasil</span>";
                                    }else{
                                        echo "<span class='text-danger'>Update Produk Gagal</span>";
                                    }
                                }else{
                                    echo "<span class='text-danger'>Terjadi Kesalahan Pada Saat Upload File Gambar Produk!!</span>";
                                }
                            }else{
                                echo "<span class='text-danger'>Format File Gambar Produk Tidak Didukung, Pastikan Format File Yang Digunakan Adalah jpeg, jpg, gif, png!!</span>";
                            }
                        }
                    }
                }
            }
        }
    }
    
    
?>