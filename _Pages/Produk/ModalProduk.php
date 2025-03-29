<div class="modal fade" id="ModalTambahProduk" tabindex="-1" role="dialog" aria-labelledby="ModalTambahProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="javascript:void(0);" method="POST" id="ProsesTambahProduk" autocomplete="off">
                <div class="modal-header bg-info">
                    <h3 class="text-white"><i class="fa fa-plus"></i> Tambah Produk</h3> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="FormTambahProduk">
                    <!-- Form Tambah Produk Disini -->
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-md btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditProduk" tabindex="-1" role="dialog" aria-labelledby="ModalEditProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="javascript:void(0);" method="POST" id="ProsesEditProduk">
                <div class="modal-header bg-info">
                    <h4 class="text-light">Edit Produk</h4> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="card border-light p-4">
                        <div id="FormEditProduk">

                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-md btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeleteProduk" tabindex="-1" role="dialog" aria-labelledby="ModalLoginBerhasil" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content bg-gradient-primary text-white">
            <div class="modal-body" id="DeleteProduk">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDetailBarang" tabindex="-1" role="dialog" aria-labelledby="ModalDetailBarang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="FormDetailProduk">
            
        </div>
    </div>
</div>
<div class="modal fade" id="ModalAddToCart" tabindex="-1" role="dialog" aria-labelledby="ModalAddToCart" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="javascript:void(0);" method="POST" id="ProsesAddToCart">
                <div class="modal-header bg-primary">
                    <h4 class="text-light"><i class="icofont-cart-alt"></i> Add To Cart</h4> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="FormAddToCart">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-md btn-info">
                        <i class="icofont-cart-alt"></i> Add
                    </button>
                    <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTidakPunyaAKsesChat" tabindex="-1" role="dialog" aria-labelledby="ModalTidakPunyaAKsesChat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content bg-gradient-primary text-danger">
            <div class="modal-body">
                <div class="py-3 text-center">
                    <span class="modal-icon display-2-lg">
                        <img src="images/question.gif" width="100%">
                    </span></span>
                    <p>Anda Tidak Punya Akses Untuk Mengirim Pesan! Silahkan Login Menggunakan Akun Pelanggan</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <a href="_Pages/Login/ProsesLogout.php" class="btn btn-md btn-primary">Logout</a>
                    <a href="javascript:void(0);" class="btn btn-md btn-danger" data-dismiss="modal">Tidak</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalTidakPunyaAKsesChat2" tabindex="-1" role="dialog" aria-labelledby="ModalTidakPunyaAKsesChat2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content bg-gradient-primary text-danger">
            <div class="modal-body">
                <div class="py-3 text-center">
                    <span class="modal-icon display-2-lg">
                        <img src="images/question.gif" width="100%">
                    </span></span>
                    <p>Silahkan Lakukan Login Atau Mendaftar </p>
                </div>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <a href="index.php?Pages=Login" class="btn btn-md btn-primary">Login</a>
                    <a href="index.php?Pages=Daftar" class="btn btn-md btn-info">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalAddToCartBerhasil" tabindex="-1" role="dialog" aria-labelledby="ModalAddToCartBerhasil" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content bg-gradient-primary text-danger">
            <div class="modal-body">
                <div class="py-3 text-center">
                    <span class="modal-icon display-2-lg">
                        <img src="images/success.gif" width="100%">
                    </span></span>
                    <p>Berhasil Memasukan pesanan Ke Keranjang</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <a href="index.php?Pages=Keranjang" class="btn btn-md btn-primary">Lihat Keranjang</a>
                </div>
            </div>
        </div>
    </div>
</div>