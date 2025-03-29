<div class="about-box-main">
    <div class="container">
        <?php
            if(empty($_GET['SubPage'])){
                include "_Pages/Dashboard/Dashboard.php";
            }else{
                $SubPage=$_GET['SubPage'];
                if($SubPage=="Akses"){
                    include "_Pages/Akses/Akses.php";
                }else{
                    if($SubPage=="Produk"){
                        include "_Pages/Produk/Produk.php";
                    }else{
                        if($SubPage=="Transaksi"){
                            include "_Pages/Transaksi/Transaksi.php";
                        }else{
                            if($SubPage=="Ongkir"){
                                include "_Pages/Ongkir/Ongkir.php";
                            }else{
                                if($SubPage=="Promosi"){
                                    include "_Pages/Promosi/Promosi.php";
                                }else{
                                    if($SubPage=="Chatting"){
                                        include "_Pages/Chatting/Chatting.php";
                                    }else{
                                        if($SubPage=="Testimoni"){
                                            include "_Pages/Testimoni/Testimoni.php";
                                        }else{
                                            if($SubPage=="DetailChatting"){
                                                include "_Pages/Chatting/DetailChatting.php";
                                            }else{
                                                include "_Pages/Dashboard/Dashboard.php";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        ?>
    </div>
</div>