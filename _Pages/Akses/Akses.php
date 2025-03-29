<?php
    if($SessionAkses!=="Admin"){
        include "ErrorAkses.php";
    }else{
?>
    <div class="row">
        <div class="col col-md-6 mb-3">
            <h1 class="h4"><i class="fas fa-users"></i> Akses</h1>
        </div>
        <div class="col col-md-6 text-right mb-3">
            <button class="btn btn-md btn-outline-dark" data-toggle="modal" data-target="#ModalTambahAkses" title="Tambah Data Akses">
                <i class="fa fa-user-plus"></i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="TampilkanTabelAkses">
            
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
                                Hak Akses <i>Admin</i> adalah kategori pengguna yang dapat mengakses data user akses, kelola data produk, halaman transaksi, 
                                halaman chatting dan halaman testimoni.
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">2.</td>
                            <td valign="top">
                                Hak Akses <i>Customer Service</i> adalah pengguna yang bertugas untuk melayani pelanggan dengan menggunakan fitur chatting, 
                                data transaksi dan melakukan konfirmasi pembayaran dan pengiriman.
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">3.</td>
                            <td valign="top">
                                Hak Akses <i>Pemilik</i> adalah kaetgori pemilik perusahaan yang dapat mengakses data laporan transaksi dan laporan testimoni pelanggan.
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">4.</td>
                            <td valign="top">
                                Hak Akses <i>Pelanggan</i> dalah pengguna aplikasi yang dapat melakukan order pemesanan.
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>