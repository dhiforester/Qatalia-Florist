<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Validasi Form Data
    if(empty($_POST['nama_produk'])){
        echo "<span class='text-danger'>Nama Produk Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['satuan'])){
            echo "<span class='text-danger'>Satuan Produk Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['keterangan'])){
                echo "<span class='text-danger'>Keterangan/Deskripsi Produk Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['kategori'])){
                    echo "<span class='text-danger'>Kategori Produk Tidak Boleh Kosong!!</span>";
                }else{
                    if(empty($_FILES['filegambar']['name'])){
                        echo "<span class='text-danger'>Gambar Produk Tidak Boleh Kosong!!</span>";
                    }else{
                        if(empty($_POST['harga'])){
                            $harga=0;
                        }else{
                            $harga=$_POST['harga'];
                        }
                        if(empty($_POST['stok'])){
                            $stok=0;
                        }else{
                            $stok=$_POST['stok'];
                        }
                        $nama_produk=$_POST['nama_produk'];
                        $satuan=$_POST['satuan'];
                        $keterangan=$_POST['keterangan'];
                        $kategori=$_POST['kategori'];
                        //Validasi Hanya angka
                        if(!preg_match("/^[0-9]*$/", $harga)){
                            echo "<span class='text-danger'>Form Harga Hanya Boleh Diisi Angka!!</span>";
                        }else{
                            if(!preg_match("/^[0-9]*$/", $stok)){
                                echo "<span class='text-danger'>Form Stock Hanya Boleh Diisi Angka!!</span>";
                            }else{
                                //nama gambar
                                $nama_gambar=$_FILES['filegambar']['name'];
                                //ukuran gambar
                                $ukuran_gambar = $_FILES['filegambar']['size']; 
                                //tipe
                                $tipe_gambar = $_FILES['filegambar']['type']; 
                                //sumber gambar
                                $tmp_gambar = $_FILES['filegambar']['tmp_name'];
                                //Buat Nama File
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
                                        //apabila syarat terpenuhi lakukan input
                                        $entry="INSERT INTO barang (
                                            nama_barang,
                                            harga,
                                            satuan,
                                            stok,
                                            keterangan,
                                            kategori,
                                            gambar
                                        ) VALUES (
                                            '$nama_produk',
                                            '$harga',
                                            '$satuan',
                                            '$stok',
                                            '$keterangan',
                                            '$kategori',
                                            '$NamaBaru'
                                        )";
                                        $Input=mysqli_query($Conn, $entry);
                                        if($Input){
                                            echo "<span class='text-success' id='NotifikasiTambahProdukBerhasil'>Tambah Produk Berhasil</span>";
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
    }
?>