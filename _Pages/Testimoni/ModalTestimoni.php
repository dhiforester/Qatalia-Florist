<div class="modal fade" id="ModalDetailTestimoni" tabindex="-1" role="dialog" aria-labelledby="ModalDetailTestimoni" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h2 class="text-light"><i class="icofont-comment"></i> Detail Testimoni</h2> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="DetailTestimoni">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
            <div class="modal-footer bg-info">
                <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#ModalDeleteTestimoni">
                    <i class="icofont-ui-delete"></i> Hapus
                </button>
                <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                    <i class="icofont-close-circled"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeleteTestimoni" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteTestimoni" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h2 class="text-light">
                    <i class="icofont-ui-delete"></i> Hapus Testimoni
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
                    <div class="col-md-12 text-center" id="NotifikasiHapusTestimoni">
                        <span class="text-danger">
                            Apakah anda yakin akan menghapus testimoni ini?
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-md btn-primary" id="KonfirmasiHapusTestimoni">
                    <i class="icofont-checked"></i> Ya, Hapus
                </button>
                <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                    <i class="icofont-close-circled"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>