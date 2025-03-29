<?php
    date_default_timezone_set("Asia/Bangkok");
    $Sekarang=date('Y-m-d');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $hasil_ranks=array();
    $SqlProduk = "SELECT * FROM barang";
    $ResultProduk = mysqli_query($Conn, $SqlProduk);
    while($RowProduk = mysqli_fetch_assoc($ResultProduk)){
        $IdBarang = $RowProduk['id_barang'];
        $SqlReting = "SELECT SUM(reting) FROM reting WHERE id_barang='$IdBarang'";
        $QryReting = mysqli_query($Conn, $SqlReting);
        $HasilReting = mysqli_fetch_row($QryReting);
        if(empty($HasilReting[0])){
            $NilaiReting =0;
        }else{
            $NilaiReting = $HasilReting[0];
        }
        $hasil_rank['IdBarang'] = $IdBarang;
        $hasil_rank['NilaiReting'] = $NilaiReting;
        array_push($hasil_ranks,$hasil_rank);
    }
    asort($hasil_ranks);
    foreach ($hasil_ranks as $rank) {
        $IdBarang=$rank['IdBarang'];
        $NilaiReting=$rank['NilaiReting'];
        //Buka data barang
        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$IdBarang'")or die(mysqli_error($Conn));
        $data = mysqli_fetch_array($QryDetailproduk);
        $id_barang= $data['id_barang'];
        $nama_barang= $data['nama_barang'];
        $harga= $data['harga'];
        $satuan= $data['satuan'];
        $stok= $data['stok'];
        $keterangan= $data['keterangan'];
        $kategori= $data['kategori'];
        $gambar= $data['gambar'];
        $hasil_rupiah = "Rp " . number_format($harga,0,',','.');
        if($kategori=="Hand Buket"){
            $label="sale";
        }else{
            if($kategori=="Standing Flower"){
                $label="new";
            }else{
                if($kategori=="Board Flowers"){
                    $label="hijau";
                }else{
                    if($kategori=="Table Flowers"){
                        $label="new";
                    }else{
                        $label="instagram";
                    }
                }
            }
            
        }
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
    <div class="col-md-3 mt-3">
        <div class="card">
            <div class="thumbnail">
                <img src="images/produk/<?php echo $gambar;?>" alt="<?php echo $nama_barang;?>" width="100%" height="242">
            </div>
            <div class="card-body">
                <div class="caption">
                    <h3><?php echo $nama_barang;?></h3>
                    <?php
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
                        for ( $i=1; $i<=5; $i++ ){
                            if($i<=$RataRataBulat){
                                echo '<i class="icofont-star text-warning"></i>';
                            }else{
                                echo '<i class="icofont-star text-dark"></i>';
                            }
                        }
                    ?>
                    <p>
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
                    </p>
                    <p>
                        <?php if($SessionAkses=="Pelanggan"){ ?>
                            <a href="javascript:void(0);" class="btn btn-primary mr-2" data-toggle="modal" data-target="#ModalAddToCart" data-id="<?php echo $id_barang;?>">
                                <i class="icofont-cart-alt"></i> Add
                            </a> 
                        <?php }else{ ?>
                            <a href="javascript:void(0);" class="btn btn-primary mr-2" data-toggle="modal" data-target="#ModalTidakPunyaAKsesChat2">
                                <i class="icofont-cart-alt"></i> Add
                            </a>
                        <?php } ?>
                        <a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#ModalDetailBarang" data-id="<?php echo $id_barang;?>">
                            <i class="icofont-info"></i> Detail
                        </a> 
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>