<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Metode</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Pembayaran</th>
            <th class="text-center">Pengiriman</th>
            <th class="text-center">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "../../_Config/Connection.php";
            include "../../_Config/Session.php";
            //Membuka jumalh data transaksi
            $JumlahTransaksi= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses'"));
            if(empty($JumlahTransaksi)){
                echo '<tr><td colspan="7" class="text-center text-danger">Belum Ada Transaksi</td></tr>';
            }else{
                $no = 1;
                //KONDISI PENGATURAN MASING FILTER
                $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses' ORDER BY id_transaksi DESC");
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
                    if($status_pembayaran=="Menunggu Validasi"){
                        $status_pembayaran='<span class="badge badge-warning">Menunggu Validasi</b>';
                    }else{
                        if($status_pembayaran=="Lunas"){
                            $status_pembayaran='<span class="badge badge-success">Lunas</b>';
                        }else{
                            if($status_pembayaran=="Dikembalikan"){
                                $status_pembayaran='<span class="badge badge-danger">Dibatalkan</b>';
                            }else{
                                $status_pembayaran='<span class="badge badge-danger">Tidak Valid</b>';
                            }
                        }
                    }
                    if($status_pengiriman=="Menunggu Validasi"){
                        $LabelStatusPengiriman='<span class="badge badge-warning">Menunggu Validasi</b>';
                    }else{
                        if($status_pengiriman=="Dikirim"){
                            $LabelStatusPengiriman='<span class="badge badge-info">Dikirim</b>';
                        }else{
                            if($status_pengiriman=="Sampai Tujuan"){
                                $LabelStatusPengiriman='<span class="badge badge-success">Sampai Tujuan</b>';
                            }else{
                                if($status_pengiriman=="Dibatalkan"){
                                    $LabelStatusPengiriman='<span class="badge badge-danger">Dibatalkan</b>';
                                }else{
                                    if($status_pengiriman=="Dikembalikan"){
                                        $LabelStatusPengiriman='<span class="badge badge-danger">Dikembalikan</b>';
                                    }else{
                                        $LabelStatusPengiriman='<span class="badge badge-success">Selesai</b>';
                                    }
                                }
                            }
                        }
                    }
                    echo '  <tr>';
                    echo '      <td class="text-center">'.$no.'</td>';
                    echo '      <td>'.$tanggal.'</td>';
                    echo '      <td>'.$metode_pembayaran.'</td>';
                    echo '      <td class="text-right">'.$jumlah_tagihan.'</td>';
                    echo '      <td class="text-center">'.$status_pembayaran.'</td>';
                    echo '      <td class="text-center">'.$LabelStatusPengiriman.'</td>';
                    echo '      <td class="text-center">';
                    echo '          <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalDetailHistoriTransaksi" data-id="'.$id_transaksi.'">';
                    echo '              <i class="icofont-info-circle"></i> Detail';
                    if($status_pengiriman=="Dikirim"){
                        echo '          <span class="badge badge-danger"><i class="icofont-warning-alt"></i></span>';
                    }else{
                        if($status_pengiriman=="Sampai Tujuan"){
                            //Cek apakah transaksi ini sudah ada testimoni
                            $QryTestimoni = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                            $DataTestimoni = mysqli_fetch_array($QryTestimoni);
                            $id_testimoni = $DataTestimoni['id_testimoni'];
                            if(empty($DataTestimoni['id_testimoni'])){
                                echo '<span class="badge badge-danger"><i class="icofont-warning-alt"></i></span>';
                            }
                        }
                    }
                    echo '          </button>';
                    echo '      </td>';
                    echo '  </tr>';
                    $no++;
                }
            }
        ?>
    </tbody>
</table>