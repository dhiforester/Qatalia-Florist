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
        $jumlah_tagihan = $Data['jumlah_tagihan'];
        $alamat = $Data['alamat'];
        $status_pembayaran = $Data['status_pembayaran'];
        $status_pengiriman = $Data['status_pengiriman'];
?>
    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control" required>
                <?php
                    if($status_pembayaran=="Menunggu Validasi"){
                        echo '<option value="Menunggu Validasi">Menunggu Validasi</option>';
                        echo '<option value="Lunas">Lunas</option>';
                        echo '<option value="Tidak Valid">Tidak Valid</option>';
                    }else{
                        echo '<option value="Menunggu Validasi">Menunggu Validasi</option>';
                        echo '<option value="Lunas">Lunas</option>';
                        echo '<option value="Tidak Valid">Tidak Valid</option>';
                    }
                ?>
            
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="status_pengiriman">Status Pengiriman</label>
            <select name="status_pengiriman" id="status_pengiriman" class="form-control" required>
                <?php
                    if($status_pengiriman=="Menunggu Validasi"){
                        echo '<option value="Dikirim">Dikirim</option>';
                        echo '<option value="Sampai Tujuan">Sampai Tujuan</option>';
                        echo '<option value="Dibatalkan">Dibatalkan</option>';
                    }else{
                        echo '<option value="Dikirim">Dikirim</option>';
                        echo '<option value="Sampai Tujuan">Sampai Tujuan</option>';
                        echo '<option value="Dibatalkan">Dibatalkan</option>';
                    }
                ?>
            
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiValidasiTransaksi">
            <span class="text-danger">Pastikan Opsi Validasi Status Transaksi Sudah Sesuai!</span>
        </div>
    </div>
<?php } ?>