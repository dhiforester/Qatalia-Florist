<?php
    if(!empty($_POST['id_ongkir'])){
        $id_ongkir=$_POST['id_ongkir'];
?>
<div class="row">
    <div class="col col-md-12 text-center">
        <img src="images/question.gif" width="70%">
    </div>
</div>
<div class="row">
    <div class="col col-md-12 text-center mb-4" id="NotifikasiHapusOngkir">
        <span class="text-danger">Apakah Anda Yakin Ingin Menghapus Data Ini?</span>
    </div>
</div>
<div class="row">
    <div class="col col-md-12 text-center mt-4 mb-4">
        <button type="button" class="btn btn-md btn-outline-info mr-3" id="KonfirmasiHapusOngkir">
            <i class="icofont-check-circled"></i> Ya, Hapus
        </button>
        <button type="button" class="btn btn-md btn-outline-danger" data-dismiss="modal">
            <i class="icofont-close-line-circled"></i> Tidak
        </button>
    </div>
</div>
<?php 
    }else{
        $id_ongkir="";
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="my-3 text-danger">Maaf, Tidak ada data Ongkir yang dipilih.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <button type="button" class="btn btn-md btn-outline-white" data-dismiss="modal">Tutup</button>';
        echo '      </div>';
        echo '  </div>';
    }
?>