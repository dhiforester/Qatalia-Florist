<div class="row">
    <div class="col-md-6 mb-3">
        <label for="id_barang">Produk/Barang</label>
        <select name="id_barang" id="id_barang" class="form-control">
            <option value="">Pilih</option>
            <?php
                include "../../_Config/Connection.php";
                //Buka data barang
                $QryBarang = mysqli_query($Conn, "SELECT * FROM barang ORDER BY nama_barang ASC");
                while ($DataBarang = mysqli_fetch_array($QryBarang)) {
                    $id_barang= $DataBarang['id_barang'];
                    $nama_barang= $DataBarang['nama_barang'];
                    //Buka data diskon
                    $QryPromosi = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                    $DataPromosi= mysqli_fetch_array($QryPromosi);
                    $id_diskon= $DataPromosi['id_diskon'];
                    if(!empty($DataBarang['id_barang'])){
                        if(!empty($DataPromosi['id_diskon'])){
                            echo '<option value="'.$id_barang.'">'.$nama_barang.'</option>';
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="diskon">Diskon (%)</label>
        <input type="text" class="form-control" id="diskon" name="diskon">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="periode_awal">Periode Mulai</label>
        <input type="date" class="form-control" id="periode_awal" name="periode_awal" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="periode_akhir">Periode Selesai</label>
        <input type="date" class="form-control" id="periode_akhir" name="periode_akhir" required>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="NotifikasiTambahPromosi">
            <span class="text-primary">Pastikan data promosi yang anda input sudah benar</span>
        </div>
    </div>
</div>