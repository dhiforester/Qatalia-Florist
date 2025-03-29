<?php
    //Koneksi dan SessionLogin
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_produk'])){
        echo "<span class='text-danger'>ID Produk Tidak Boleh Kosong</span>";
    }else{
        $id_barang=$_POST['id_produk'];
        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
        if(empty($DataDetailproduk['gambar'])){
            echo "<span class='text-danger'>Produk Tidak Ditemukan</span>";
        }else{
            $gambar=$DataDetailproduk['gambar'];
            $path_gambar_lama = "../../images/produk/".$gambar;
            //Proses hapus data
            $query = mysqli_query($Conn, "DELETE FROM barang WHERE id_barang='$id_barang'") or die(mysqli_error($Conn));
            if($query) {
                //Hapus Gambar
                unlink($path_gambar_lama); 
                echo "<span class='text-success' id='NotifikasiHapusProdukBerhasil'>Hapus Berhasil</span>";
            }else{
                echo "<span class='text-danger'>Terjadi Kesalahan Pada Saat Menghapus Data</span>";
            }
        }
    }
?>