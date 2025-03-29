<?php
    if($SessionAkses!=="Admin"){
        include "ErrorAkses.php";
    }else{
?>
    <div class="row">
        <div class="col col-md-8">
            <h1 class="h4"><i class="fas fa-table"></i> Produk</h1>
        </div>
        <div class="col col-md-4 text-right">
            <button class="btn btn-md btn-outline-dark" data-toggle="modal" data-target="#ModalTambahProduk" title="Tambah Produk">
                <i class="icofont-ui-love-add"></i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 pre-scrollable" id="TampilkanTabelProduk">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <b>Keterangan:</b>
                    <table width="100%">
                        <tr>
                            <td valign="top" width="10%">1.</td>
                            <td valign="top">
                                Klik pada tombol <i>Tambah Produk</i> untuk menambahkan item produk.
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td valign="top">
                                Pada tabel data produk anda bisa merubah data produk yang ada dengan memilih tombol <i>Edit Produk</i>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td valign="top">
                                Pada tabel data produk anda bisa menghapus data produk yang ada dengan memilih tombol <i>Hapus Produk</i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
