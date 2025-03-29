<?php
    if($SessionAkses!=="Pelanggan"){
        include "ErrorAkses.php";
    }else{
        //Hitung data keranjang
        $JumlahKeranjang= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'"));
?>
    <div class="about-box-main">
        <div class="container">
            <form action="javascript:void(0);" id="ProsesAddToTransaksi">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h4"><i class="icofont-cart-alt"></i> Keranjang</h1>
                    </div>
                    <div class="card-body" id="RincianKeranjang">
                        <!-- Tabel Keranjang -->
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <?php if(!empty($JumlahKeranjang)){ ?>
                                <div class="col col-md-6 mb-3">
                                    <button type="submit" class="btn btn-md btn-primary btn-block">
                                        <i class="icofont-tick-boxed"></i> Lanjutkan Transaksi
                                    </button>
                                </div>
                                <div class="col col-md-6">
                                    <button type="button" class="btn btn-md btn-danger btn-block" data-toggle="modal" data-target="#ModalHapusKeranjang">
                                        <i class="icofont-ui-delete"></i> Hapus Keranjang
                                    </button>
                                </div>
                            <?php }else{ ?>
                                <div class="col col-md-12">
                                    <a href="index.php" class="btn btn-md btn-dark btn-block">
                                        <i class="icofont-arrow-left"></i> Kembali Ke Beranda
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col col-md-12 mb-4">
                        
                    </div>
                    <div class="col col-md-12 mb-4">
                        
                    </div>
                    <div class="col col-md-12 mb-4">
                        
                    </div>
                    <div class="col col-md-12 mb-4">
                        
                    </div>
                    <div class="col col-md-12 mb-4">
                        
                    </div>
                    <div class="col col-md-12 mb-4">
                        
                    </div>
                </div>
            </form>
        </div> 
    </div> 
<?php } ?>
