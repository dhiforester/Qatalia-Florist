<?php
    //InfoRekening
    include "../../_Config/InfoRekening.php";
    if(empty($_POST['metode_pembayaran'])){
        echo "";
    }else{
        $metode_pembayaran=$_POST['metode_pembayaran'];
        if($metode_pembayaran=="COD"){
            echo "";
        }else{
            echo '<div class="col-md-12 text-success">';
            echo '  Silahkan lakukan transfer ke rekening berikut ini.<br>';
            echo '  <b>Bank :</b> '.$NamaBank.'<br>';
            echo '  <b>No.Rekening :</b> '.$NomorRekening.'<br>';
            echo '  <b>Atas Nama :</b> '.$AtasNama.'<br>';
            echo '  Setelah melakukan transfer silahkan isi form berikut ini.<br>';
            echo '</div>';
            echo '<div class="col-md-6">';
            echo '  <label for="no_bukti">No.Bukti Transfer</label>';
            echo '  <input type="text" name="no_bukti" id="no_bukti" class="form-control">';
            echo '</div>';
            echo '<div class="col-md-6">';
            echo '  <label for="file_bukti">Bukti Transfer</label>';
            echo '  <input type="file" name="file_bukti" id="file_bukti" class="form-control">';
            echo '</div>';
        }
    }
?>