<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //tangkap GET id_transaksi
    if(!empty($_POST['id_Transaksi'])){
        $id_transaksi=$_POST['id_Transaksi'];
        $Qry = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        //rincian profile user
        $id_akses= $Data['id_akses'];
        $id_ongkir = $Data['id_ongkir'];
        $tanggal = $Data['tanggal'];
        $metode_pembayaran = $Data['metode_pembayaran'];
        if(!empty($Data['no_bukti'])){
            $no_bukti = $Data['no_bukti'];
            $file_bukti = $Data['file_bukti'];
        }else{
            $no_bukti ="None";
            $file_bukti ="";
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
<div class="modal-body pre-scrollable">
    <small class="mb-3 mb-lg-0">
        <p class="mb-0">
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
        </p>
    </small>
    <div class="row">
        <div class="col-md-12 mt-4">
            <h3>Rincian Item Barang</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-bordered">
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
                                $keterangan= $data['keterangan'];
                                $HargaRp="Rp" . number_format($harga,0,',','.');
                                $DiskonRp="Rp" . number_format($diskon,0,',','.');
                                $RpJumlah="Rp" . number_format($jumlah,0,',','.');
                                //Buka nama barang
                                $Qry = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($Qry);
                                $satuan = $DataBarang['satuan'];
                                echo '  <tr>';
                                echo '      <td class="text-left" valign="top">';
                                echo '          <h3>'.$no.'. '.$nama_barang.'</h3>';
                                echo '          <b>Harga : </b>'.$HargaRp.' X '.$qty.' '.$satuan.' = '.$RpJumlah.'<br>';
                                echo '          '.$keterangan.'<br>';
                                echo '      </td>';
                                echo '  </tr>';
                                $JumlahTotal=$JumlahTotal+$jumlah;
                                $no++;
                            }
                            $RpJumlahTotal="Rp " . number_format($JumlahTotal,0,',','.');
                            $JumlahTotalTagihan=$JumlahTotal+$ongkir;
                            $RpJumlahTotalTagihan="Rp" . number_format($JumlahTotalTagihan,0,',','.');
                            $RpOngkir="Rp" . number_format($ongkir,0,',','.');
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6"><h3>Jumlah Order</h3></div>
        <div class="col col-md-6 text-right"><?php echo '<h3>'.$RpJumlahTotal.'</h3>';?></div>
    </div>
    <div class="row">
        <div class="col col-md-6"><h3>Biaya Ongkir</h3></div>
        <div class="col col-md-6 text-right"><?php echo '<h3>'.$RpOngkir.'</h3>';?></div>
    </div>
    <div class="row">
        <div class="col col-md-6"><h3>Jumlah Total</h3></div>
        <div class="col col-md-6 text-right"><?php echo '<h3>'.$RpJumlahTotalTagihan.'</h3>';?></div>
    </div>
</div>
<div class="card-footer bg-info text-right">
    <div class="row">
        <div class="col-md-6">
            <?php
                if($status_pengiriman=="Menunggu Validasi"){
                    echo '<button type="button" class="btn btn-md btn-primary mb-2 mt-2 mr-2 btn-block" data-toggle="modal" data-target="#ModalValidasiTransaksi">';
                    echo '  <i class="icofont-check-circled"></i> Validasi Transaksi';
                    echo '</button>';
                }
            ?>
        </div>
        <div class="col-md-3">
            <?php
                echo '<button type="button" class="btn btn-md btn-danger mb-2 mt-2 mr-2 btn-block" data-toggle="modal" data-target="#ModalDeleteTransaksi">';
                echo '  <i class="icofont-ui-delete"></i> Hapus';
                echo '</button>';
            ?>
        </div>
        <div class="col-md-3">
            <?php
                echo '<button type="button" class="btn btn-md btn-dark mb-2 mt-2 mr-2 btn-block" data-dismiss="modal">';
                echo '  <i class="icofont-close-circled"></i> Tutup';
                echo '</button>';
            ?>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_transaksi="";
    }
?>