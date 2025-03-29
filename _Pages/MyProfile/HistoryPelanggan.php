<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menghitung apakah ada data transaksi
    if($SessionAkses=="Pelanggan"){
        $JumlahTransaksiPelanggan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses'"));
    }else{
        $JumlahTransaksiPelanggan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pengiriman WHERE id_kurir='$SessionIdAkses'"));
    }
        //Apakah menangkap id_transaksi
    if(empty($JumlahTransaksiPelanggan)){
        echo '      <div class="row">';
        echo '          <div class="col-12 text-left text-danger">';
        echo '              <b>Maaf!!</b> Anda belum memiliki data transaksi.';
        echo '          </div>';
        echo '      </div>';
    }else{
?>
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="display-2">
                <b class="text-primary"><i class="fas fa-history"></i></b>
                <b class="text-primary">History</b> 
                <b class="text-secondary">Transaksi</b>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">
            <div class="table-responsive">
                <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                    <thead>
                        <tr>
                            <td class="text-center"><b>No</b></td>
                            <td class="text-center"><b>Tanggal</b></td>
                            <td class="text-center"><b>Metode Pembayaran</b></td>
                            <td class="text-center"><b>Jumlah</b></td>
                            <td class="text-center"><b>Status Pembayaran</b></td>
                            <td class="text-center"><b>Status Pengiriman</b></td>
                            <td class="text-center"><b>Opt</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            //KONDISI PENGATURAN MASING FILTER
                            if($SessionAkses=="Pelanggan"){
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses' ORDER BY id_transaksi DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_transaksi= $data['id_transaksi'];
                                    $tanggal= $data['tanggal'];
                                    $jumlah_tagihan= $data['jumlah_tagihan'];
                                    $metode_pembayaran= $data['metode_pembayaran'];
                                    $status_pengiriman= $data['status_pengiriman'];
                                    $status_pembayaran= $data['status_pembayaran'];
                                    if($status_pengiriman=="Menunggu Dipersiapkan"){
                                        $class="text-warning";
                                    }else{
                                        if($status_pengiriman=="Mencari Kurir"){
                                            $class="text-success";
                                        }else{
                                            if($status_pengiriman=="Sampai Tujuan"){
                                                $class="text-success";
                                            }else{
                                                if($status_pengiriman=="Mencari Kurir"){
                                                    $class="text-success";
                                                }
                                            }
                                        }
                                    }
                                    echo '  <tr>';
                                    echo '      <td class="border-0 text-center" valign="Top">'.$no.'</td>';
                                    echo '      <td class="border-0 text-center" valign="Top">'.$tanggal.'</td>';
                                    echo '      <td class="border-0 text-center" valign="Top">'.$metode_pembayaran.'</td>';
                                    echo '      <td class="border-0 text-center" valign="Top">'.$jumlah_tagihan.'</td>';
                                    echo '      <td class="border-0 text-center" valign="Top">'.$status_pembayaran.'</td>';
                                    echo '      <td class="border-0 text-center" valign="Top">'.$status_pengiriman.'</td>';
                                    echo '      <td class="border-0 text-center" valign="Top">';
                                    echo '          <a href="index.php?Page=RincianTransaksi&id_transaksi='.$id_transaksi.'" class="btn btn-sm btn-warning">Lihat</a>';
                                    echo '      </td>';
                                    echo '  </tr>';
                                    $no++;
                                }
                            }else{
                                if($SessionAkses=="Kurir"){
                                    $query = mysqli_query($Conn, "SELECT*FROM pengiriman WHERE id_kurir='$SessionIdAkses' ORDER BY id_transaksi DESC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_transaksi= $data['id_transaksi'];
                                        //Buka data rincian transaksi
                                        $Qry = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                        $Data = mysqli_fetch_array($Qry);       
                                        $tanggal= $Data['tanggal'];
                                        $jumlah_tagihan= $Data['jumlah_tagihan'];
                                        $metode_pembayaran= $Data['metode_pembayaran'];
                                        $status_pengiriman= $Data['status_pengiriman'];
                                        $status_pembayaran= $Data['status_pembayaran'];
                                        if($status_pengiriman=="Menunggu Dipersiapkan"){
                                            $class="text-warning";
                                        }else{
                                            if($status_pengiriman=="Mencari Kurir"){
                                                $class="text-success";
                                            }else{
                                                if($status_pengiriman=="Sampai Tujuan"){
                                                    $class="text-success";
                                                }else{
                                                    if($status_pengiriman=="Mencari Kurir"){
                                                        $class="text-success";
                                                    }
                                                }
                                            }
                                        }
                                        echo '  <tr>';
                                        echo '      <td class="border-0 text-center" valign="Top">'.$no.'</td>';
                                        echo '      <td class="border-0 text-center" valign="Top">'.$tanggal.'</td>';
                                        echo '      <td class="border-0 text-center" valign="Top">'.$metode_pembayaran.'</td>';
                                        echo '      <td class="border-0 text-center" valign="Top">'.$jumlah_tagihan.'</td>';
                                        echo '      <td class="border-0 text-center" valign="Top">'.$status_pembayaran.'</td>';
                                        echo '      <td class="border-0 text-center" valign="Top">'.$status_pengiriman.'</td>';
                                        echo '      <td class="border-0 text-center" valign="Top">';
                                        echo '          <a href="index.php?Page=RincianTransaksiKurir&id_transaksi='.$id_transaksi.'" class="btn btn-sm btn-warning">Lihat</a>';
                                        echo '      </td>';
                                        echo '  </tr>';
                                        $no++;
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>