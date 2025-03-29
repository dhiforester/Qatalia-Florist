<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        $Qry = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        //rincian profile user
        $id_akses= $Data['id_akses'];
        $id_ongkir = $Data['id_ongkir'];
        $tanggal = $Data['tanggal'];
        $metode_pembayaran = $Data['metode_pembayaran'];
        $no_bukti = $Data['no_bukti'];
        $file_bukti = $Data['file_bukti'];
        $jumlah_tagihan = $Data['jumlah_tagihan'];
        $alamat = $Data['alamat'];
        $status_pembayaran = $Data['status_pembayaran'];
        $status_pengiriman = $Data['status_pengiriman'];
        //Hapus Rincian
        $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi' ORDER BY id_rincian DESC");
        while ($data = mysqli_fetch_array($query)) {
            $id_rincian= $data['id_rincian'];
            $id_barang= $data['id_barang'];
            $nama_barang= $data['nama_barang'];
            $harga= $data['harga'];
            $qty= $data['qty'];
            $diskon= $data['diskon'];
            $jumlah= $data['jumlah'];
            //Buka data barang
            $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
            $stok = $DataDetailproduk['stok'];
            $StokBaru=$stok+$qty;
            //Update Stok
            $UpdateBarang = mysqli_query($Conn,"UPDATE barang SET stok='$StokBaru' WHERE id_barang='$id_barang'") or die(mysqli_error($Conn));
            //Apabila update stok berhasil maka hapus
            if($UpdateBarang){
                $HapusRincian= mysqli_query($Conn, "DELETE FROM rincian WHERE id_rincian='$id_rincian'") or die(mysqli_error($Conn));
            }
        }
        //Hapus Bukti
        if(!empty($file_bukti)){
            $path_gambar_lama = "../../images/bukti_pembayaran/".$file_bukti;
            unlink($path_gambar_lama); 
        }
        //Hapus data transaksi
        $HapusDataTransaksi= mysqli_query($Conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
        if($HapusDataTransaksi){
            $_SESSION ["NotifikasiSwal"]="Batalkan Transaksi Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusTransaksiBerhasil">Berhasil</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Transaksi Gagal!</span>';
        }
    }
?>