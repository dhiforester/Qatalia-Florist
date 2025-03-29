<?php
    if(empty($_POST['periode_1'])){
        echo '<span class="text-danger">Periode Awal Masih Kosong, Silahkan lengkapi!</span>';
    }else{
        if(empty($_POST['periode_2'])){
            echo '<span class="text-danger">Periode Akhir Masih Kosong, Silahkan lengkapi!</span>';
        }else{
            $periode1=$_POST['periode_1'];
            $periode2=$_POST['periode_2'];
            echo '<a href="_Pages/Laporan/CetakLaporan.php?periode1='.$periode1.'&periode2='.$periode2.'" target="_blank" class="btn btn-md btn-block btn-dark">';
            echo '  <i class="icofont-printer"></i> Cetak';
            echo '</a>';
        }
    }
?>
