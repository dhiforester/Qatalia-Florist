<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //tangkap GET id_transaksi
    if(empty($_POST['id_transaksi'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <span class="text-danger">ID Transaksi Tidak Boleh</span>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">';
        echo '      <i class="icofont-close-circled"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        $Qry = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        //rincian profile user
        $id_akses= $Data['id_akses'];
        $id_ongkir = $Data['id_ongkir'];
        $tanggal = $Data['tanggal'];
        $metode_pembayaran = $Data['metode_pembayaran'];
        if(!empty($Data['no_bukti'])){
            $no_bukti = $Data['no_bukti'];
        }else{
            $no_bukti ="None";
        }
        if(!empty($Data['file_bukti'])){
            $file_bukti = $Data['file_bukti'];
        }else{
            $file_bukti ="None";
        }
        $jumlah_tagihan = $Data['jumlah_tagihan'];
        $alamat = $Data['alamat'];
        $status_pembayaran = $Data['status_pembayaran'];
        $status_pengiriman = $Data['status_pengiriman'];
        //Buka data akses
        $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataAkses = mysqli_fetch_array($QryAkses);
        $Nama= $DataAkses['nama'];
        $email= $DataAkses['email'];
        $username= $DataAkses['username'];
        $password= $DataAkses['password'];
        //Buka data Ongkir
        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'")or die(mysqli_error($Conn));
        $DataOngkir = mysqli_fetch_array($QryOngkir);
        $provinsi= $DataOngkir['provinsi'];
        $kabupaten= $DataOngkir['kabupaten'];
        $kecamatan= $DataOngkir['kecamatan'];
        $desa= $DataOngkir['desa'];
        $ongkir= $DataOngkir['ongkir'];
        $RpOngkir="Rp" . number_format($ongkir,0,',','.');
?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <table>
                    <tr>
                        <td><b>ID.Transaksi</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td><?php echo $id_transaksi;?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td><?php echo $tanggal;?></td>
                    </tr>
                    <tr>
                        <td><b>Metode Pembayaran</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td><?php echo $metode_pembayaran;?></td>
                    </tr>
                    <tr>
                        <td><b>Status Pembayaran</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td>
                            <?php 
                                if($status_pembayaran=="Tidak Valid"){
                                    echo '<b class="text-danger">'.$status_pembayaran.'</b>';
                                }else{
                                    echo $status_pembayaran;
                                }
                                
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>No.Pembayaran</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td>
                            <?php 
                                echo ''.$no_bukti.'';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Bukti Pembayaran</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td>
                            <?php 
                            if(!empty($Data['file_bukti'])){
                                echo '<a href="images/bukti_pembayaran/'.$file_bukti.'" class="text-success" target="_blank">'.$file_bukti.'</a>';
                            }else{
                                echo 'None';
                            }
                                
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Status Pengiriman</b></td>
                        <td class="text-center"><b>:</b></td>
                        <td>
                            <?php 
                                if($status_pengiriman=="Dibatalkan"){
                                    echo '<b class="text-danger">'.$status_pengiriman.'</b>';
                                }else{
                                    echo $status_pengiriman;
                                }
                                
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Alamat Pengiriman</b></td>
                        <td class="text-center"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"><?php echo "$alamat Ds.$desa Kec.$kecamatan Kab.$kabupaten $provinsi";?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3>Rincian Item Barang</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 pre-scrollable">
                <div class="table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center"><b>No</b></th>
                                <th class="text-center"><b>Produk</b></th>
                                <th class="text-center"><b>Qty</b></th>
                                <th class="text-center"><b>Harga</b></th>
                                <th class="text-center"><b>Diskon</b></th>
                                <th class="text-center"><b>Jumlah</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $JumlahTotal=0;
                                //KONDISI PENGATURAN MASING FILTER
                                $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi' ORDER BY id_rincian DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_rincian= $data['id_rincian'];
                                    $id_barang= $data['id_barang'];
                                    $nama_barang= $data['nama_barang'];
                                    $harga= $data['harga'];
                                    $qty= $data['qty'];
                                    $diskon= $data['diskon'];
                                    $jumlah= $data['jumlah'];
                                    $HargaRp="Rp" . number_format($harga,0,',','.');
                                    $DiskonRp="Rp" . number_format($diskon,0,',','.');
                                    $RpJumlah="Rp" . number_format($jumlah,0,',','.');
                                    //Buka nama barang
                                    $Qry = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                    $DataBarang = mysqli_fetch_array($Qry);
                                    $satuan = $DataBarang['satuan'];
                                    //Cek Ketersediaan Reting Untuk Barang Ini
                                    $QryReting = mysqli_query($Conn,"SELECT * FROM reting WHERE id_transaksi='$id_transaksi' AND id_barang='$id_barang'")or die(mysqli_error($Conn));
                                    $DataReting = mysqli_fetch_array($QryReting);
                                    if(!empty($DataReting['id_reting'])){
                                        $reting= $DataReting['reting'];
                                        if($reting=="1"){
                                            $LabelReting='<small class="text-warning"><i class="fas fa-star"></i></small>';
                                        }
                                        if($reting=="2"){
                                            $LabelReting='<small class="text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i></small>';
                                        }
                                        if($reting=="3"){
                                            $LabelReting='<small class="text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></small>';
                                        }
                                        if($reting=="4"){
                                            $LabelReting='<small class="text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></small>';
                                        }
                                        if($reting=="5"){
                                            $LabelReting='<small class="text-warning"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></small>';
                                        }
                                    }else{
                                        $LabelReting='';
                                    }
                                    echo '  <tr>';
                                    echo '      <td class="text-center" valign="Top">'.$no.'</td>';
                                    echo '      <td class="text-left" valign="Top">'.$nama_barang.' '.$LabelReting.'</td>';
                                    echo '      <td class="text-center" valign="Top">'.$qty.' '.$satuan.'</td>';
                                    echo '      <td class="text-right" valign="Top">'.$HargaRp.'</td>';
                                    echo '      <td class="text-right" valign="Top">'.$DiskonRp.'</td>';
                                    echo '      <td class="text-right" valign="Top">'.$RpJumlah.'</td>';
                                    echo '  </tr>';
                                    $JumlahTotal=$JumlahTotal+$jumlah;
                                    $no++;
                                }
                                $RpJumlahTotal="Rp " . number_format($JumlahTotal,0,',','.');
                                $JumlahTotalTagihan=$JumlahTotal+$ongkir;
                                $RpJumlahTotalTagihan="Rp" . number_format($JumlahTotalTagihan,0,',','.');
                                $RpOngkir="Rp" . number_format($ongkir,0,',','.');
                                echo '  <tr>';
                                echo '      <td class="text-left" valign="Top"></td>';
                                echo '      <td class="text-left" valign="Top" colspan="4"><b>Jumlah Order</b></td>';
                                echo '      <td class="text-right" valign="Top"><b>'.$RpJumlahTotal.'</b></td>';
                                echo '  </tr>';
                                echo '  <tr>';
                                echo '      <td class="text-left" valign="Top"></td>';
                                echo '      <td class="text-left" valign="Top" colspan="4"><b>Biaya Ongkir</b></td>';
                                echo '      <td class="text-right" valign="Top"><b>'.$RpOngkir.'</b></td>';
                                echo '  </tr>';
                                echo '  <tr>';
                                echo '      <td class="text-left" valign="Top"></td>';
                                echo '      <td class="text-left" valign="Top" colspan="4"><b>Jumlah Total</b></td>';
                                echo '      <td class="text-right" valign="Top"><b>'.$RpJumlahTotalTagihan.'</b></td>';
                                echo '  </tr>';
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-info">
        <?php
            if($status_pembayaran=="Menunggu Validasi"){
                if($status_pengiriman=="Dikirim"){
                    echo '<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalVerifikasiSelesai" data-id="'.$id_transaksi.'">';
                    echo ' <i class="icofont-checked"></i> Transaksi Selesai';
                    echo '</button>';
                }else{
                    echo '<button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#ModalBatalkanTransaksi" data-id="'.$id_transaksi.'">';
                    echo '  <i class="icofont-undo"></i> Batalkan Transaksi';
                    echo '</button>';
                }
            }else{
                if($status_pengiriman=="Dikirim"){
                    echo '<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalVerifikasiSelesai" data-id="'.$id_transaksi.'">';
                    echo ' <i class="icofont-checked"></i> Transaksi Selesai';
                    echo '</button>';
                }else{
                    if($status_pengiriman=="Sampai Tujuan"){
                        //Cek apakah transaksi ini sudah ada testimoni
                        $QryTestimoni = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                        $DataTestimoni = mysqli_fetch_array($QryTestimoni);
                        $id_testimoni = $DataTestimoni['id_testimoni'];
                        if(empty($DataTestimoni['id_testimoni'])){
                            echo '<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalFormTestimoni" data-id="'.$id_transaksi.'">';
                            echo ' <i class="icofont-checked"></i> Kirim Testimoni';
                            echo '</button>';
                        }
                    }else{
                        
                    }
                }
            }
        ?>
        <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
            <i class="icofont-close-circled"></i> Tutup
        </button>
    </div>
<?php } ?>