<?php
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['PilihDesa'])){
        echo 'Rp 0';
    }else{
        $id_ongkir=$_POST['PilihDesa'];
        //CARI ONGKIR
        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'")or die(mysqli_error($Conn));
        $dataOngkir = mysqli_fetch_array($QryOngkir);
        $ongkir= $dataOngkir['ongkir'];
        $JumlahTotal=0;
        $QryKeranjang= mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0' ORDER BY id_rincian ASC");
        while ($DataKeranjang = mysqli_fetch_array($QryKeranjang)) {
            $id_rincian= $DataKeranjang['id_rincian'];
            $id_barang= $DataKeranjang['id_barang'];
            $nama_barang= $DataKeranjang['nama_barang'];
            $harga= $DataKeranjang['harga'];
            $qty= $DataKeranjang['qty'];
            $diskon= $DataKeranjang['diskon'];
            $jumlah= $DataKeranjang['jumlah'];
            $keterangan= $DataKeranjang['keterangan'];
            //Buka data produk
            $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
            $nama_barang = $DataDetailproduk['nama_barang'];
            $harga = $DataDetailproduk['harga'];
            $satuan = $DataDetailproduk['satuan'];
            $JumlahTotal=$jumlah+$JumlahTotal;
        }
        $JumlahTagihan=$ongkir+$JumlahTotal;
        $JumlahTagihan = "Rp " . number_format($JumlahTagihan,0,',','.');
        echo "$JumlahTagihan";
    }
?>