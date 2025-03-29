<?php
    if(empty($_POST['periode_1'])){
        echo '<span class="text-danger">Periode Awal Masih Kosong, Silahkan lengkapi!</span>';
    }else{
        if(empty($_POST['periode_2'])){
            echo '<span class="text-danger">Periode Akhir Masih Kosong, Silahkan lengkapi!</span>';
        }else{
            $periode1=$_POST['periode_1'];
            $periode2=$_POST['periode_2'];
        }
    }
?>
<b>Periode Laporan :</b><?php echo "$periode1 s/d $periode2"; ?>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Metode</th>
            <th class="text-center">Pembayaran</th>
            <th class="text-center">Pengiriman</th>
            <th class="text-center">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "../../_Config/Connection.php";
            include "../../_Config/Session.php";
            //Membuka jumalh data transaksi
            $JumlahTransaksi= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2'"));
            if(empty($JumlahTransaksi)){
                echo '<tr><td colspan="7" class="text-center text-danger">Belum Ada Transaksi</td></tr>';
            }else{
                $no = 1;
                //KONDISI PENGATURAN MASING FILTER
                $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_transaksi DESC");
                while ($data = mysqli_fetch_array($query)) {
                    $id_transaksi= $data['id_transaksi'];
                    $id_akses= $data['id_akses'];
                    $id_ongkir= $data['id_ongkir'];
                    $tanggal= $data['tanggal'];
                    $metode_pembayaran= $data['metode_pembayaran'];
                    $jumlah_tagihan= $data['jumlah_tagihan'];
                    $no_bukti= $data['no_bukti'];
                    $file_bukti= $data['file_bukti'];
                    $alamat= $data['alamat'];
                    $status_pembayaran= $data['status_pembayaran'];
                    $status_pengiriman= $data['status_pengiriman'];
                    //Buka nama pelanggan
                    $QryPelanggan = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                    $DataPelanggn = mysqli_fetch_array($QryPelanggan);
                    $nama = $DataPelanggn['nama'];
                    $jumlah_tagihan="Rp " . number_format($jumlah_tagihan,0,',','.');
                    echo '  <tr>';
                    echo '      <td class="text-center">'.$no.'</td>';
                    echo '      <td>'.$tanggal.'</td>';
                    echo '      <td>'.$metode_pembayaran.'</td>';
                    echo '      <td class="text-center">'.$status_pembayaran.'</td>';
                    echo '      <td class="text-center">'.$status_pengiriman.'</td>';
                    echo '      <td class="text-right">'.$jumlah_tagihan.'</td>';
                    echo '  </tr>';
                    $no++;
                }
            }
        ?>
    </tbody>
</table>