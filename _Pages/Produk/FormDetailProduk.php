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
        //Mencari Sum Reting
        $SumReting=mysqli_fetch_array(mysqli_query($Conn,"SELECT SUM(reting) AS reting FROM reting WHERE id_barang='$id_barang'"));
        $JumlahSumReting=$SumReting['reting'];
        //Mencari Jumlah Data
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_barang='$id_barang'"));
        if(!empty($jml_data)){
            $RataRata=$JumlahSumReting/$jml_data;
            $RataRataBulat=round($RataRata);
        }else{
            $RataRataBulat=0;
        }

?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4 mt-3">
                <img src="images/produk/<?php echo "$gambar";?>" alt="<?php echo "$nama_barang";?>" width="100%" height="242">
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
                    <tr>
                        <td valign="top"><b>Deskripsi</b></td>
                        <td valign="top"><b>:</b></td>
                        <td valign="top"><?php echo "$keterangan";?></td>
                    </tr>
                    <tr>
                        <td valign="top"><b>Reting</b></td>
                        <td valign="top"><b>:</b></td>
                        <td valign="top">
                            <?php 
                                echo "($RataRataBulat)";
                                for ( $i=1; $i<=5; $i++ ){
                                    if($i<=$RataRataBulat){
                                        echo '<i class="icofont-star icofont-2x text-warning"></i>';
                                    }else{
                                        echo '<i class="icofont-star icofont-2x text-dark"></i>';
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <?php if($SessionAkses=="Pelanggan"){ ?>
            <a href="index.php?Pages=ChattingPelanggan&Sub=DetailChattingProduk&id_barang=<?php echo "$id_barang"; ?>" class="btn btn-md btn-outline-info">
                <i class="icofont-chat"></i> Chat
            </a>
        <?php }else{ ?>
            <?php if($SessionAkses=="Admin"||$SessionAkses=="Customer Service"){ ?>
                <a href="javascript:void(0);" class="btn btn-md btn-outline-info" data-toggle="modal" data-target="#ModalTidakPunyaAKsesChat">
                    <i class="icofont-chat"></i> Chat
                </a>
            <?php }else{ ?>
                <a href="javascript:void(0);" class="btn btn-md btn-outline-info" data-toggle="modal" data-target="#ModalTidakPunyaAKsesChat2">
                    <i class="icofont-chat"></i> Chat
                </a>
            <?php } ?>
        <?php } ?>
        <button type="button" class="btn btn-md btn-outline-dark" data-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
        </button>
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