<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //tangkap GET id_rincian
    if(empty($_POST['id_rincian'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <span class="text-danger">ID Rincian Tidak Boleh</span>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">';
        echo '      <i class="icofont-close-circled"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_rincian=$_POST['id_rincian'];
        $Qry = mysqli_query($Conn,"SELECT * FROM rincian WHERE id_rincian='$id_rincian'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        //rincian profile user
        $id_barang= $Data['id_barang'];
        $nama_barang= $Data['nama_barang'];
        $harga = $Data['harga'];
        $qty = $Data['qty'];
        $diskon = $Data['diskon'];
        $jumlah = $Data['jumlah'];
        $keterangan = $Data['keterangan'];
        $HargaRp="Rp" . number_format($harga,0,',','.');
        $DiskonRp="Rp" . number_format($diskon,0,',','.');
        $JumlahRp="Rp" . number_format($jumlah,0,',','.');
        //Buka data barang
        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
        $stok = $DataDetailproduk['stok'];
?>
<form action="javascript:void(0);" id="ProsesEditRincianKeranjang">
    <input type="hidden" name="id_rincian" id="id_rincian" value="<?php echo "$id_rincian"; ?>">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tr>
                        <td><b>ID Rincian</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $id_rincian;?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Produk</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $nama_barang;?></td>
                    </tr>
                    <tr>
                        <td><b>Harga</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $HargaRp;?></td>
                    </tr>
                    <tr>
                        <td><b>Qty</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $qty;?></td>
                    </tr>
                    <tr>
                        <td><b>Diskon</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $DiskonRp;?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $JumlahRp;?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="qty">Qty</label>
                <input type="number" min="1" max="<?php echo $stok;?>" name="qty" id="qty" class="form-control" value="<?php echo "$qty";?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12" id="NotifikasiEditRincian">
                <span class="text-info">Pastikan Perubahan Rincian Transaksi Anda Sudah Benar!</span>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-info">
        <button type="submit" class="btn btn-md btn-primary">
            <i class="icofont-save"></i> Simpan
        </button>
        <button type="button" class="btn btn-md btn-danger" id="ClickHapusRincianKeranjang">
            <i class="icofont-ui-delete"></i> Hapus
        </button>
        <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
            <i class="icofont-close-circled"></i> Tutup
        </button>
    </div>
</form>
<?php } ?>