<div class="row">
    <div class="col-md-6 mb-3">
        <div>
            <label for="first_name">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="first_name">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori" list="ListKategori" required>
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
<div class="row">
    <div class="col-md-6 mb-3">
        <div>
            <label for="last_name">Harga (Rp)</label>
            <input type="text" class="form-control" id="harga" name="harga">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="stok">Stok</label>
        <input type="text" class="form-control" id="stok" name="stok">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="satuan">Satuan</label>
        <input type="text" class="form-control" id="satuan" name="satuan" list="ListSatuan" required>
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
    <div class="col-md-6 mb-3">
        <label for="first_name">Gambar Produk</label>
        <input type="file" class="form-control" id="filegambar" name="filegambar" required>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div>
            <label for="keterangan">Deskprisi Produk</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="NotifikasiTambahProduk">
            <span class="text-primary">Pastikan data produk bunga yang anda input sudah benar</span>
        </div>
    </div>
</div>