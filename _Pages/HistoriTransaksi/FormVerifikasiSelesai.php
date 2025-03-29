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
?>
<form action="javascript:void(0);" id="ProsesSimpanTestimoni">
    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
    <div class="modal-body">
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="testimoni">Testimoni</label>
                <textarea name="testimoni" id="testimoni" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="saran_kritik">Saran</label>
                <textarea name="saran_kritik" id="saran_kritik" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>Berikan Reting Produk</b>
            </div>
        </div>
        <?php
            $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi' ORDER BY id_rincian DESC");
            while ($data = mysqli_fetch_array($query)) {
                $id_rincian= $data['id_rincian'];
                $id_barang= $data['id_barang'];
                $nama_barang= $data['nama_barang'];
        ?>
        <input type="hidden" name="id_barang[]" id="id_barang[]" value="<?php echo "$id_barang"; ?>">
        <div class="row mb-3">
            <div class="col col-md-6">
                <label for="reting[]"><?php echo "$nama_barang"; ?></label>
            </div>
            <div class="col col-md-6">
                <select name="reting[]" id="reting[]" class="form-control">
                    <option value="5">Sangat Baik</option>
                    <option value="4">Cukup Baik</option>
                    <option value="3">Sedang</option>
                    <option value="2">Buruk</option>
                    <option value="1">Sangat Buruk</option>
                </select>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12 text-center" id="NotifikasiIsiTestimoni">
                <span class="text-info">
                    Silahkan isi pengalaman anda menggunakan layanan kami.
                </span>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-success">
        <button type="submit" class="btn btn-md btn-primary">
            <i class="icofont-checked"></i> Kirim
        </button>
        <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
            <i class="icofont-close-circled"></i> Tutup
        </button>
    </div>
</form>
<?php } ?>