<div class="modal fade" id="ModalAdmin" tabindex="-1" role="dialog" aria-labelledby="ModalLoginBerhasil" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title text-white">Admin Area</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="py-3 text-center">
                    <span class="modal-icon display-2-lg">
                        <img src="images/question.gif" width="100%">
                    </span></span>
                </div>
                <b>Apakah anda ingin masuk ke halaman Admin?</b>
            </div>
            <div class="modal-footer bg-info text-center">
                <a href="index.php?Pages=Admin" class="btn btn-md btn-primary">Ya, Masuk</a>
                <a href="javascript:void(0);" class="btn btn-md btn-danger" data-dismiss="modal">Tidak</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalMenuAdmin" tabindex="-1" role="dialog" aria-labelledby="ModalMenuAdmin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h3 class="modal-title text-white"><i class="icofont-navigation-menu"></i> Menu Utama</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0 table-responsive pre-scrollable"> 
                <?php
                    if(empty($SessionAkses)){
                        include "_Pages/Admin/MenuBiasa.php";
                    }else{
                        if($SessionAkses=="Admin"){
                            include "_Pages/Admin/MenuAdmin.php";
                        }else{
                            if($SessionAkses=="Pelanggan"){
                                include "_Pages/Admin/MenuPelanggan.php";
                            }else{
                                if($SessionAkses=="Customer Service"){
                                    include "_Pages/Admin/MenuCs.php";
                                }else{
                                    if($SessionAkses=="Pemilik"){
                                        include "_Pages/Admin/MenuPemilik.php";
                                    }else{
                                        include "_Pages/Admin/MenuBiasa.php";
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>
            <div class="modal-footer bg-dark text-center">
                <a href="javascript:void(0);" class="btn btn-md btn-outline-light" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </a>
            </div>
        </div>
    </div>
</div>