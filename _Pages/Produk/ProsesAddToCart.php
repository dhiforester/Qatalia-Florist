<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $lastupdate=date('Y-m-d H:i:s');
    $lastupdate=strtotime($lastupdate);
    $Sekarang=date('Y-m-d');
    if(empty($_POST['id_barang'])){
        echo "<span class='text-danger'>Tidak Ada Item Barang Yang Dipilih</span>";
    }else{
        if(empty($_POST['qty'])){
            echo "<span class='text-danger'>Jumlah Barang Tidak Boleh Kosong</span>";
        }else{
            if(empty($_POST['keterangan'])){
                $keterangan="";
            }else{
                $keterangan=$_POST['keterangan'];
            }
            $qty=$_POST['qty'];
            $id_barang=$_POST['id_barang'];
            $tanggal=date('Y-m-d H:i');
            //Buka Nama Barang
            $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
            $nama_barang = $DataDetailproduk['nama_barang'];
            $harga = $DataDetailproduk['harga'];
            $satuan = $DataDetailproduk['satuan'];
            $stok = $DataDetailproduk['stok'];
            //Buka diskon
            $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_barang='$id_barang' AND periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'")or die(mysqli_error($Conn));
            $DataDiskon = mysqli_fetch_array($QryDiskon);
            if(!empty($DataDiskon['id_diskon'])){
                $id_diskon = $DataDiskon['id_diskon'];
                $diskon = $DataDiskon['diskon'];
                $potongan=($diskon/100)*$harga;
            }else{
                $id_diskon ="";
                $diskon =0;
                $potongan=0;
            }
            $Subtotal=$harga*$qty;
            $Subtotal=$Subtotal-$potongan;
            //Validasi data yang sama
            $QryValidasiDuplikat = mysqli_query($Conn,"SELECT * FROM rincian WHERE lastupdate='$lastupdate'")or die(mysqli_error($Conn));
            $DataValidasiDuplikat = mysqli_fetch_array($QryValidasiDuplikat);
            $id_rincian = $DataValidasiDuplikat['id_rincian'];
            if(empty($DataValidasiDuplikat['id_rincian'])){
                //Simpan data ke keranjang
                $entry="INSERT INTO rincian (
                    id_transaksi,
                    id_barang,
                    id_akses,
                    nama_barang,
                    harga,
                    qty,
                    diskon,
                    jumlah,
                    keterangan,
                    lastupdate
                ) VALUES (
                    '0',
                    '$id_barang',
                    '$SessionIdAkses',
                    '$nama_barang',
                    '$harga',
                    '$qty',
                    '$potongan',
                    '$Subtotal',
                    '$keterangan',
                    '$lastupdate'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    echo "<span class='text-success' id='NotifikasiAddToCartBerhasil'>Berhasil</span>";
                }else{
                    echo "<span class='text-danger'>gagal Memasukan Data Ke Keranjang</span>";
                }
            }else{
                echo "<span class='text-success' id='NotifikasiAddToCartBerhasil'>Berhasil</span>";
            }
        }
    }
?>