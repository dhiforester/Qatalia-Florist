<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_barang
    if(!empty($_POST['id_barang'])){
        $id_barang=$_POST['id_barang'];
        //Buka data askes
        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
        $nama = $DataDetailproduk['nama_barang'];
        $harga = $DataDetailproduk['harga'];
        $satuan = $DataDetailproduk['satuan'];
        $stok = $DataDetailproduk['stok'];
        $keterangan = $DataDetailproduk['keterangan'];
        $kategori = $DataDetailproduk['kategori'];
        $gambar = $DataDetailproduk['gambar'];
?>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo "$id_barang"; ?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div>
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $nama;?>" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div>
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" list="ListKategori" value="<?php echo $kategori;?>" required>
                <datalist id="ListKategori">
                    <?php
                        include "../../_Config/Connection.php";
                        //Buka data kategori
                        $QryKategoriProduk = mysqli_query($Conn, "SELECT DISTINCT kategori FROM barang ORDER BY kategori ASC");
                        while ($DataKategoriProduk = mysqli_fetch_array($QryKategoriProduk)) {
                            $kategori= $DataKategoriProduk['kategori'];
                            echo '<option value="'.$kategori.'">';
                        }
                    ?>
                </datalist>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div>
                <label for="last_name">Harga (Rp)</label>
                <input type="number" min="0" class="form-control" id="harga" name="harga" value="<?php echo $harga;?>">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div>
                <label for="first_name">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $stok;?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div>
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" list="ListSatuan" value="<?php echo $satuan;?>" required>
                <datalist id="ListSatuan">
                    <?php
                        //Buka data satuan
                        $QrySatuan = mysqli_query($Conn, "SELECT DISTINCT satuan FROM barang ORDER BY satuan ASC");
                        while ($DataSatuan = mysqli_fetch_array($QrySatuan)) {
                            $satuan= $DataSatuan['satuan'];
                            echo '<option value="'.$satuan.'">';
                        }
                    ?>
                </datalist>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="filegambar">Gambar Produk</label>
            <input type="file" class="form-control" id="filegambar" name="filegambar">
            <?php
                if(!empty($gambar)){
                    echo '<a href="images/produk/'.$gambar.'" class="text-primary" target="_blank">Image :'.$gambar.'</a>';
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div>
                <label for="keterangan">Deskprisi Produk</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"><?php echo "$keterangan"; ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div id="NotifikasiEditProduk">
                <span class="text-primary">Pastikan perubahan data yang anda input sudah benar!</span>
            </div>
        </div>
    </div>
    <?php
        }else{
            $id_produk="";
            echo '<div class="row">';
            echo '  <div class="col-md-12 align-center">';
            echo '      <h2>Maaf Tidak Ada Data Produk Yang Dipilih</h2>';
            echo '  </div>';
            echo '</div>';
            echo '<div class="row">';
            echo '  <div class="col-md-12 align-center">';
            echo '      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>';
            echo '  </div>';
            echo '</div>';
        }
    ?>