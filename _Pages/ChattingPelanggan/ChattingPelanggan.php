<?php
    if($SessionAkses!=="Pelanggan"){
        include "ErrorAkses.php";
    }else{
?>
    <div class="about-box-main">
        <div class="container">
            <?php
                if(!empty($_GET['Sub'])){
                    $Sub=$_GET['Sub'];
                    if($Sub=="DetailChattingProduk"){
                        include "_Pages/ChattingPelanggan/DetailChattingProduk.php";
                    }else{
                        include "_Pages/ChattingPelanggan/ChattingPelangganHome.php";
                    }
                }else{
                    include "_Pages/ChattingPelanggan/ChattingPelangganHome.php";
                }
            ?>
        </div> 
    </div> 
<?php } ?>