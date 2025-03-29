<?php
    if(!empty($_POST['id_diskon'])){
        $id_diskon=$_POST['id_diskon'];
?>
<div class="row">
    <div class="col col-md-12 text-center">
        <img src="images/question.gif" width="70%">
    </div>
</div>
<div class="row">
    <div class="col col-md-12 text-center mb-4" id="NotifikasiHapusPromosi">
        <span class="text-danger">Apakah Anda Yakin Ingin Menghapus Data Ini?</span>
    </div>
</div>
<div class="row">
    <div class="col col-md-12 text-center mt-4 mb-4">
        <button type="button" class="btn btn-md btn-outline-info mr-3" id="KonfirmasiHapusPromosi">
            <i class="icofont-check-circled"></i> Ya, Hapus
        </button>
        <button type="button" class="btn btn-md btn-outline-danger" data-dismiss="modal">
            <i class="icofont-close-line-circled"></i> Tidak
        </button>
    </div>
</div>
<?php 
    }else{
        $id_diskon="";
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="my-3 text-danger">Maaf, Tidak ada data Promosi yang dipilih.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <button type="button" class="btn btn-md btn-outline-white" data-dismiss="modal">Tutup</button>';
        echo '      </div>';
        echo '  </div>';
    }
?>