<?php
    if($SessionAkses!=="Pemilik"){
        include "ErrorAkses.php";
    }else{
?>
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h1 class="h4"><i class="icofont-cart-alt"></i> Histori Transaksi</h1>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="periode_1" id="periode_1" class="form-control">
                                    <small for="periode_1">Periode Awal</small>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="periode_2" id="periode_2" class="form-control">
                                    <small for="periode_1">Periode Akhir</small>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-md btn-block btn-primary" id="ClickTampilkanLaporan">
                                        <i class="icofont-calendar"></i> Tampilkan
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive" id="TabelLaporan">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <span class="text-danger">Silahkan Pilih periode Laporan Yang Ingin Ditampilkan</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-2" id="TombolCetak">
                                    <button type="button" class="btn btn-md btn-block btn-dark" id="ClickTampilkanLaporan">
                                        <i class="icofont-printer"></i> Cetak
                                    </button>
                                </div>
                            </div>
                        </div>
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
        </div> 
    </div> 
<?php } ?>
