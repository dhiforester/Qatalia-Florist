<?php
    date_default_timezone_set("Asia/Jakarta");
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $HapusKeranjang= mysqli_query($Conn, "DELETE FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'") or die(mysqli_error($Conn));
    if($HapusKeranjang){
        $_SESSION ["NotifikasiSwal"]="Hapus Keranjang Berhasil";
        echo '<span class="text-success" id="NotifikasiHapusKeranjangBerhasil">Berhasil</span>';
    }else{
        echo '<span class="text-danger">Gagal Menghapus Keranjang</span>';
    }
?>