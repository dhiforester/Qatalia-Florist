<?php
    if(!empty($_POST['id_akses'])){
        $id_akses=$_POST['id_akses'];
?>
<div class="row">
    <div class="col col-md-12 text-center">
        <img src="images/question.gif" alt="Hapus Akses" width="90%">
    </div>
</div>
<div class="row mb-4">
    <div class="col col-md-12 text-center" id="NotifikasiHapusAkses">
        <small class="modal-title my-3">Anda Yakin Ingin Menghapus Data Ini?</small>
    </div>
</div>
<div class="row">
    <div class="col col-md-12 text-center">
        <button type="button" class="btn btn-md btn-primary" id="KonfirmasiHapusAkses">
            <i class="fas fa-check"></i> Ya, Hapus
        </button>
        <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Tidak
        </button>
    </div>
</div>
<?php 
    }else{
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Maaf, Tidak ada data akses yang dipilih.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <button type="button" class="btn btn-md btn-outline-white" data-dismiss="modal">Tutup</button>';
        echo '      </div>';
        echo '  </div>';
    }
?>