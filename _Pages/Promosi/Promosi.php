<?php
    if($SessionAkses!=="Admin"){
        include "ErrorAkses.php";
    }else{
?>
    <div class="row">
        <div class="col col-md-8">
            <h1 class="h4"><i class="icofont-sale-discount"></i> Promosi</h1>
        </div>
        <div class="col col-md-4 text-right">
            <button class="btn btn-md btn-outline-dark" data-toggle="modal" data-target="#ModalTambahPromosi" title="Tambah Promosi">
                <i class="icofont-sale-discount"></i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 pre-scrollable" id="TampilkanTabelPromosi">
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
                                Klik pada tombol <i>Tambah Promosi</i> untuk menambahkan item Promosi.
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td valign="top">
                                Pada tabel data Promosi anda bisa merubah data Promosi yang ada dengan memilih tombol <i>Edit Promosi</i>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td valign="top">
                                Pada tabel data Promosi anda bisa menghapus data Promosi yang ada dengan memilih tombol <i>Hapus Promosi</i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


