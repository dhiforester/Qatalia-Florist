<?php
    date_default_timezone_set("Asia/Bangkok");
    $Sekarang=date('Y-m-d');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_barang
    if(!empty($_POST['id_barang'])){
        $id_barang=$_POST['id_barang'];
        //Buka data askes
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
        //Buka Data Diskon
        $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_barang='$id_barang' AND periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'")or die(mysqli_error($Conn));
        $DataDiskon = mysqli_fetch_array($QryDiskon);
        if(!empty($DataDiskon['id_diskon'])){
            $id_diskon = $DataDiskon['id_diskon'];
            $diskon = $DataDiskon['diskon'];
        }else{
            $id_diskon ="";
            $diskon =0;
        }
        if(!empty($diskon)){
            $potongan=($diskon/100)*$harga;
            $potongan_rp= "Rp " . number_format($potongan,0,',','.');
            $harga_setelah_potongan=$harga-$potongan;
        }
?>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo "$id_barang"; ?>">
    <div class="row">
        <div class="col-md-4 mt-3">
            <img src="images/produk/<?php echo "$gambar";?>" alt="<?php echo "$nama_barang";?>" width="100%">
        </div>
        <div class="col-md-8 mt-3">
            <table width="100%">
                <tr>
                    <td valign="top"><b>Produk</b></td>
                    <td valign="top"><b>:</b></td>
                    <td valign="top"><?php echo "$nama_barang";?></td>
                </tr>
                <tr>
                    <td valign="top"><b>Kategori</b></td>
                    <td valign="top"><b>:</b></td>
                    <td valign="top"><?php echo "$kategori";?></td>
                </tr>
                <tr>
                    <td valign="top"><b>Stok</b></td>
                    <td valign="top"><b>:</b></td>
                    <td valign="top"><?php echo "$stok $satuan";?></td>
                </tr>
                <tr>
                    <td valign="top"><b>Harga</b></td>
                    <td valign="top"><b>:</b></td>
                    <td valign="top">
                        <?php 
                            if(!empty($diskon)){
                                $potongan=($diskon/100)*$harga;
                                $harga_setelah_potongan=$harga-$potongan;
                                $harga_setelah_potongan_rp= "Rp " . number_format($harga_setelah_potongan,0,',','.');
                                echo "<s>$hasil_rupiah</s> <i class='text-success'>$harga_setelah_potongan_rp</i>";
                            }else{
                                echo "$hasil_rupiah";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><b>Diskon</b></td>
                    <td valign="top"><b>:</b></td>
                    <td valign="top">
                        <?php 
                            echo "$diskon %";
                        ?>
                    </td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="qty">QTY</label>
                    <input type="number" min="1" max="<?php echo "$stok";?>" name="qty" id="qty" class="form-control" value="1">
                </div>
                <div class="col-md-12 mt-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
                    <small id="NotifikasiAddToCart">Silahkan Isi keterangan pemesanan</small>
                </div>
            </div>
        </div>
    </div>
<?php
    }else{
        $id_barang="";
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