<div class="modal fade" id="ModalTambahPromosi" tabindex="-1" role="dialog" aria-labelledby="ModalTambahPromosi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="javascript:void(0);" method="POST" id="ProsesTambahPromosi" autocomplete="off">
                <div class="modal-header bg-info">
                    <h3 class="text-white"><i class="fa fa-plus"></i> Tambah Promosi</h3> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="FormTambahPromosi">
                    <!-- Form Tambah Promosi Disini -->
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
<div class="modal fade" id="ModalEditPromosi" tabindex="-1" role="dialog" aria-labelledby="ModalEditPromosi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="javascript:void(0);" method="POST" id="ProsesEditPromosi">
                <div class="modal-header bg-info">
                    <h4 class="text-light">Edit Promosi</h4> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="card border-light p-4">
                        <div id="FormEditPromosi">

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
<div class="modal fade" id="ModalDeletePromosi" tabindex="-1" role="dialog" aria-labelledby="ModalDeletePromosi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content bg-gradient-primary text-white">
            <div class="modal-body" id="DeletePromosi">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEditPromosiBerhasi" tabindex="-1" role="dialog" aria-labelledby="ModalEditPromosiBerhasi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content bg-gradient-primary text-white">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mt-4 mb-4 text-center">
                        <img src="images/success.gif" alt="berhasil" width="100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4 mb-4 text-center">
                        <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">
                            <i class="fas fa-times"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>