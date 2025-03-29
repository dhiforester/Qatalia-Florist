<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menghitung Notifikasi Transaksi
    $ItemKeranjang = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'"));
    //Membuka ketersediaan data transaksi yang belum selesai
    $TransaksiBelumSelesai = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses' AND status_pengiriman!='Selesai' AND status_pengiriman!='Dikembalikan'"));
    $TransaksiSampaiTujuan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses' AND status_pengiriman='Sampai Tujuan'"));
    $Chating= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAkses' AND status='Terkirim' AND balasan!=''"));
    $JumlahTotalNotifikasi=$ItemKeranjang+$TransaksiBelumSelesai+$TransaksiSampaiTujuan+$Chating;
?>
<div class="row">
    <div class="col col-md-12">
        <?php
            if(empty($JumlahTotalNotifikasi)){
                echo "Anda tidak memiliki notifikasi yang dapat ditampilkan";
            }
        ?>
    </div>
</div>