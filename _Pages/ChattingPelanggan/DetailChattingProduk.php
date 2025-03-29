<?php
    //Koneksi
    include "_Config/Connection.php";
    if(empty($_GET['id_barang'])){
        $id_barang="";
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h1 class="h4"><i class="fa fa-snapchat"></i> Detail Chatting Pelanggan</h1>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col col-md-12 text-center text-danger">';
        echo '              ID Barang Tidak Boleh Kosong!';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_barang=$_GET['id_barang'];
        //Buka detail Barang
        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
        $nama_barang = $DataDetailproduk['nama_barang'];
        $harga = $DataDetailproduk['harga'];
        $satuan = $DataDetailproduk['satuan'];
        $stok = $DataDetailproduk['stok'];
        $keterangan = $DataDetailproduk['keterangan'];
        $kategori = $DataDetailproduk['kategori'];
        $gambar = $DataDetailproduk['gambar'];
        $hasil_rupiah = "Rp " . number_format($harga,0,',','.');
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h1 class="h4">
                    <i class="fa fa-snapchat"></i> Detail Chatting Pelanggan
                </h1>
                <span id="GetIdBarang"><?php echo $id_barang;?></span>. <b><?php echo $nama_barang;?></b><br>
                <?php echo "$hasil_rupiah";?>
            </div>
            <div class="col-md-2">
                <a href="index.php?Pages=ChattingPelanggan" class="btn btn-md btn-block btn-dark">
                    <i class="icofont-rounded-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <i>Chatting Pelanggan Mengenai Produk <?php echo $nama_barang;?></i>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 pre-scrollable" id="RincianIsiPesanPelanggan">
                <!-- Rincian Isi Pesan Pelanggan -->
            </div>
        </div>
    </div>
    <div class="card-footer">
        <form action="javascript:void(0);" method="POST" id="ProsesKirimPesanPelangganToAdmin">
            <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_barang;?>">
            <input type="hidden" name="id_akses" id="id_akses" value="<?php echo "$SessionIdAkses";?>">
            <input type="hidden" name="kategori" id="kategori" value="Pelanggan To Admin">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="isi_pesan" id="isi_pesan" class="form-control">
                    <Small id="NotifikasiKirimPesanPelangganToAdmin">Isi Pesan</Small>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-md btn-block btn-primary">
                        <i class="icofont-send-mail"></i> Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> 

<?php } ?>