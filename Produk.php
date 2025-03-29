<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <?php
                if(empty($_GET['produk'])){

                }else{
                    $produk=$_GET['produk'];
                    if($produk=="produk1"){
                        include "Produk/produk1.php";
                    }
                    if($produk=="produk2"){
                        include "Produk/produk2.php";
                    }
                    if($produk=="produk3"){
                        include "Produk/produk3.php";
                    }
                    if($produk=="produk4"){
                        include "Produk/produk4.php";
                    }
		            if($produk=="produk5"){
                        include "Produk/produk5.php";
                    }
                    if($produk=="produk6"){
                        include "Produk/produk6.php";
                    }
                    if($produk=="produk7"){
                        include "Produk/produk7.php";
                    }
                    if($produk=="produk8"){
                        include "Produk/produk8.php";
                    }
                    if($produk=="produk9"){
                        include "Produk/produk9.php";
                    }
                    if($produk=="produk10"){
                        include "produk10.php";
                    }
                    if($produk=="produk11"){
                        include "Produk/produk11.php";
                    }
                    if($produk=="produk12"){
                        include "Produk/produk12.php";
                    }
                }
            ?>
        </div>
    </div>
</div>