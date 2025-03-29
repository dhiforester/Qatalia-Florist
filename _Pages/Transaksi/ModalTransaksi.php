<div class="modal fade" id="ModalDetailTransaksi" tabindex="-1" role="dialog" aria-labelledby="ModalEditProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h2 class="text-light"><i class="fa fa-paperclip"></i> Detail Transaksi</h2> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="DetailTransaksi">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDeleteTransaksi" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteTransaksi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h2 class="text-light">
                    <i class="icofont-undo"></i> Hapus Transaksi
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
                    <div class="col-md-12 text-center" id="NotifikasiHapusTransaksiAdmin">
                        <span class="text-danger">
                            Apakah anda yakin akan menghapus data transaksi ini?
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-md btn-primary" id="KonfirmasiHapusTransaksiAdmin">
                    <i class="icofont-checked"></i> Ya, Hapus
                </button>
                <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                    <i class="icofont-close-circled"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalValidasiTransaksi" tabindex="-1" role="dialog" aria-labelledby="ModalValidasiTransaksi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesValidasiTransaksi">
                <div class="modal-header bg-primary">
                    <h2 class="text-light"><i class="icofont-check-circled"></i> Validasi Transaksi</h2> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="FormValidasiTransaksiAdmin">

                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-md btn-info">
                        <i class="icofont-checked"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                        <i class="icofont-close-circled"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>