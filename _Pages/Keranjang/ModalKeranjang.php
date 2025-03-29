<div class="modal fade" id="ModalDetailRincian" tabindex="-1" role="dialog" aria-labelledby="ModalDetailRincian" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h2 class="text-light"><i class="icofont-cart-alt"></i> Detail Keranjang</h2> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="DetailKeranjang">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalHapusKeranjang" tabindex="-1" role="dialog" aria-labelledby="ModalHapusKeranjang" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h2 class="text-light">
                    <i class="icofont-ui-delete"></i> Hapus Keranjang
                </h2> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="images/question.gif" width="70%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center" id="NotifikasiHapusKeranjang">
                        <span class="text-danger">
                            Apakah anda yakin akan menghapus keranjang ini?
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-md btn-primary" id="KonfirmasiHapusKeranjang">
                    <i class="icofont-checked"></i> Ya, Hapus
                </button>
                <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                    <i class="icofont-close-circled"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>