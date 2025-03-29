<?php
    if($SessionAkses!=="Admin"){
        include "ErrorAkses.php";
    }else{
        //Hitung data keranjang
        $JumlahKeranjang= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'"));
?>
<div class="card">
    <div class="card-header">
        <div class="col col-md-6">
            <h1 class="h4"><i class="fas fa-money-bill"></i> Data Transaksi</h1>
        </div>
        <div class="col col-md-6 text-right">
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col col-md-12 mb-4" id="TampilkanTabelTransaksi">
                
            </div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
            <div class="col col-md-12 mb-4"></div>
        </div>
    </div>
</div> 
<?php } ?>