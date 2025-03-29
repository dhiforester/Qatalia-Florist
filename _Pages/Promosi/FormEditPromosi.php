<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_diskon'])){
        echo '<div class="row"><div class="col-md-12 mb-3">ID Diskon Tidak Ada</div></div>';
    }else{
        $id_diskon=$_POST['id_diskon'];
        //Buka data Ongkir
        $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_diskon='$id_diskon'")or die(mysqli_error($Conn));
        $DataDiskon= mysqli_fetch_array($QryDiskon);
        $id_barang= $DataDiskon['id_barang'];
        $periode_awal= $DataDiskon['periode_awal'];
        $periode_akhir= $DataDiskon['periode_akhir'];
        $diskon= $DataDiskon['diskon'];
        echo '<input type="hidden" name="id_diskon" id="id_diskon" value="'.$id_diskon.'">';
?>
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
                        $id_barang_list= $DataBarang['id_barang'];
                        $nama_barang= $DataBarang['nama_barang'];
                        //Buka data diskon
                        $QryPromosi = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_barang='$id_barang_list'")or die(mysqli_error($Conn));
                        $DataPromosi= mysqli_fetch_array($QryPromosi);
                        $id_diskon= $DataPromosi['id_diskon'];
                        if(!empty($DataBarang['id_barang'])){
                            if(!empty($DataPromosi['id_diskon'])){
                                if($id_barang==$id_barang_list){
                                    echo '<option selected value="'.$id_barang_list.'">'.$nama_barang.'</option>';
                                }else{
                                    echo '<option value="'.$id_barang_list.'">'.$nama_barang.'</option>';
                                }
                            }
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="diskon">Diskon (%)</label>
            <input type="text" class="form-control" id="diskon" name="diskon"  value="<?php echo "$diskon"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="periode_awal">Periode Mulai</label>
            <input type="date" class="form-control" id="periode_awal" name="periode_awal" value="<?php echo "$periode_awal"; ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="periode_akhir">Periode Selesai</label>
            <input type="date" class="form-control" id="periode_akhir" name="periode_akhir" value="<?php echo "$periode_awal"; ?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div id="NotifikasiEditPromosi">
                <span class="text-primary">Pastikan data promosi yang anda input sudah benar</span>
            </div>
        </div>
    </div>
<?php } ?>