<?php
    if($SessionAkses!=="Pelanggan"){
        include "ErrorAkses.php";
    }else{
?>
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h4"><i class="icofont-cart-alt"></i> Histori Transaksi</h1>
                        </div>
                        <div class="card-body table-responsive" id="TabelHistoryTransaksi">

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
