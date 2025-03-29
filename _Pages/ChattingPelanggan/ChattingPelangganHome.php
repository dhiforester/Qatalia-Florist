<div class="card">
    <div class="card-header">
        <h1 class="h4"><i class="fa fa-snapchat"></i> List Chatting</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table table-responsive pre-scrollable">
                    <table class="table table-bordered">
                        <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Terkirim</th>
                            <th class="text-center">Masuk</th>
                            <th class="text-center">Option</th>
                        </thead>
                        <tbody>
                            <?php
                                //Hitung Pesan Ke Admin 
                                $JumlahPesan=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAkses'"));
                                if(empty($JumlahPesan)){
                                    echo '<tr><td colspan="5" class="text-center"><span class="text-danger">Belum Ada Pesan</span></td></tr>';
                                }else{
                                    $no=1;
                                    //Buka Data Distinct Pesan Berdasarkan Produk
                                    $QryChattingBarang = mysqli_query($Conn, "SELECT DISTINCT id_barang FROM chat WHERE id_akses='$SessionIdAkses' ORDER BY id_barang ASC");
                                    while ($DataChattingByBarang = mysqli_fetch_array($QryChattingBarang)) {
                                        $id_barang= $DataChattingByBarang['id_barang'];
                                        //Buka Nama Barang
                                        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                        $DataBarang = mysqli_fetch_array($QryBarang);
                                        $nama_barang= $DataBarang['nama_barang'];
                                        //Hitung Jumlah Outbox
                                        $JumlahOutbox=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAkses' AND id_barang='$id_barang' AND kategori='Pelanggan To Admin'"));
                                        //Hitung Inbox
                                        $JumlahInbox=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAkses' AND id_barang='$id_barang' AND kategori='Admin To Pelanggan'"));
                                        //Hitung Inbox Belum Dibaca
                                        $JumlahInboxTerkirim=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAkses' AND id_barang='$id_barang' AND kategori='Admin To Pelanggan' AND status='Terkirim'"));
                                        echo '<tr>';
                                        echo '  <td class="text-center">'.$no.'</td>';
                                        echo '  <td class="text-left">'.$nama_barang.'</td>';
                                        echo '  <td class="text-left">'.$JumlahOutbox.' Pesan</td>';
                                        if(!empty($JumlahInboxTerkirim)){
                                            echo '  <td class="text-left text-danger">'.$JumlahInbox.' Pesan</td>';
                                        }else{
                                            echo '  <td class="text-left text-success">'.$JumlahInbox.' Pesan</td>';
                                        }
                                        echo '  <td class="text-center">';
                                        echo '      <a href="index.php?Pages=ChattingPelanggan&Sub=DetailChattingProduk&id_barang='.$id_barang.'" class="btn btn-md btn-info">';
                                        echo '          <i class="icofont-speech-comments"></i> Chat';
                                        echo '      </a>';
                                        echo '  </td>';
                                        echo '</tr>';
                                        $no++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 