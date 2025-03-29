<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<?php
    //Variabel Koneksi
    include "_Config/Connection.php";
    //Session
    include "_Config/Session.php";
    if($SessionAkses=="Pelanggan"){
        $JumlahInboxBaru=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAkses' AND kategori='Admin To Pelanggan' AND status='Terkirim'"));
        $JumlahKeranjangBaru=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'"));
        $JumlahTransaksiDikirim=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses' AND status_pengiriman='Dikirim'"));
        //Menghitung jumlah transaksi yang sudah selesai namun belum ada reting dan testimoni
        $JumlahTransaksiBelumtestimoni=0;
        $QryHitungTransaksi = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAkses' AND status_pengiriman='Sampai Tujuan' ORDER BY id_transaksi DESC");
        while ($DataHitungTransaksi = mysqli_fetch_array($QryHitungTransaksi)) {
            $IdTransaksiHitungTesti= $DataHitungTransaksi['id_transaksi'];
            //Cek apakah ada testimoni dan reting
            $QryTestimoniCek = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_transaksi='$IdTransaksiHitungTesti'")or die(mysqli_error($Conn));
            $DataTestimoniCek = mysqli_fetch_array($QryTestimoniCek);
            if(empty($DataTestimoniCek['id_testimoni'])){
                $JumlahTransaksiBelumtestimoni=$JumlahTransaksiBelumtestimoni+1;
            }else{
                $JumlahTransaksiBelumtestimoni=$JumlahTransaksiBelumtestimoni+0;
            }
        }
        $JumlahNotifikasiTransaksi=$JumlahTransaksiDikirim+$JumlahTransaksiBelumtestimoni;
        $JumlahNotifikasi=$JumlahInboxBaru+$JumlahKeranjangBaru+$JumlahNotifikasiTransaksi;
    }else{
        if($SessionAkses=="Admin"){
            $JumlahInboxBaru=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE kategori='Pelanggan To Admin' AND status='Terkirim'"));
            $JumlahTransaksiBaru=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE status_pembayaran='Menunggu Validasi' AND status_pengiriman='Menunggu Validasi'"));
            $JumlahNotifikasi=$JumlahInboxBaru+$JumlahTransaksiBaru;
        }else{
            $JumlahNotifikasi=0;
        }
    }
    $tahun=date('Y');
    $bulan=date('m');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>Qatalia Floris</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="icofont/icofont.min.css">
    <script type="text/javascript" src="cartjs/Chart.min.js"></script>
</head>
<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        
                    </div>
                    <div class="our-link">
                        <ul>
                            <!--- <li><a href="#">Login/Logout</a></li> --->
                            <?php
                                if(empty($SessionIdAkses)){
                                    echo '<li><a href="index.php">Beranda</a></li>';
                                    echo '<li><a href="index.php?Pages=Login">Login</a></li>';
                                    echo '<li><a href="index.php?Pages=Daftar">Daftar</a></li>';
                                }else{
                                    if($SessionAkses=="Pelanggan"){
                                        echo '<li><a href="index.php">Beranda</a></li>';
                                        echo '<li><a href="index.php?Pages=Profile">Hi, '.$SessionUsername.'</a></li>';
                                        echo '<li><a href="javascript:void(0);" data-toggle="modal" data-target="#ModalLogout">Logout</a></li>';
                                    }else{
                                        echo '<li><a href="index.php">Beranda</a></li>';
                                        echo '<li><a href="index.php?Pages=Profile">Hi, '.$SessionUsername.'</a></li>';
                                        echo '<li><a href="javascript:void(0);" data-toggle="modal" data-target="#ModalLogout">Logout</a></li>';
                                    }
                                    
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active">JL. Cigadung No. 410 Cigugur, Kabupaten Kuningan, Jawa Barat 45561</li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <div class="attr-nav">
                    <a href="javascript:void(0);" class="btn btn-md btn-outline-dark" data-toggle="modal" data-target="#ModalMenuAdmin">
                        <i class="fa fa-bars"></i> 
                        <?php
                            if(!empty($JumlahNotifikasi)){
                                echo '<span class="badge badge-danger">'.$JumlahNotifikasi.'</span>';
                            }
                        ?>
                    </a>
                </div>
                
            </div>
            <!-- Start Side Menu -->
            <!-- <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="index.php">Beranda</a>
                        </li>
                        <li>
                            <a href="#">Produk</a>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">Login</a>
                            <a href="#" class="btn btn-default hvr-hover btn-cart">Daftar</a>
                        </li>
                        <li class="total">
                            
                        </li>
                    </ul>
                </li>
            </div> -->
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <div class="preloader bg-soft flex-column justify-content-center align-items-center">
        <div class="loading">
            <div class="products-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="images/loading.gif" width="70%">
                            <p>Harap Tunggu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(empty($_GET['Pages'])){
            include "Home.php";
        }else{
            $Pages=$_GET['Pages'];
            if($Pages=="Tentang"){
                include "Tentang.php";
            }else{
                if($Pages=="KontakLokasi"){
                    include "Lokasi.php";
                }else{
                    if($Pages=="Login"){
                        include "_Pages/Login/Login.php";
                    }else{
                        if($Pages=="Daftar"){
                            include "_Pages/Daftar/Daftar.php";
                        }else{
                            if($Pages=="FAQ"){
                                include "FAQ.php";
                            }else{
                                if($Pages=="Admin"){
                                    include "Admin.php";
                                }else{
                                    if($Pages=="Profile"){
                                        include "_Pages/Profile/Profile.php";
                                    }else{
                                        if($Pages=="Chatting"){
                                            include "_Pages/Chatting/Chatting.php";
                                        }else{
                                            if($Pages=="ChattingPelanggan"){
                                                include "_Pages/ChattingPelanggan/ChattingPelanggan.php";
                                            }else{
                                                if($Pages=="Keranjang"){
                                                    include "_Pages/Keranjang/Keranjang.php";
                                                }else{
                                                    if($Pages=="HistoriTransaksi"){
                                                        include "_Pages/HistoriTransaksi/HistoriTransaksi.php";
                                                    }else{
                                                        if($Pages=="Laporan"){
                                                            include "_Pages/Laporan/Laporan.php";
                                                        }else{
                                                            include "Home.php";
                                                        }
                                                    }
                                                }
                                            }
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
    <?php
        include "Modal.php";
    ?>
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="https://www.facebook.com/rizkidefenz">
                            <img src="images/facebook.png" width="60px">
                        </a>
                        <a href="https://www.instagram.com/rsubagja666/">
                            <img src="images/instagram.png" width="60px">
                        </a>
                        <a href="https://web.whatsapp.com/">
                            <img src="images/whatsapp.png" width="60px">
                        </a>
                        <a href="https://www.eloraflorist.com/tokobungadepok/?gclid=CjwKCAjwgb6IBhAREiwAgMYKRqOgKktcCN03zUAa5G7Bty9Pgj1I79471LQ6tgsnvZYXJEXhUnsfZhoC7cYQAvD_BwE">
                            <img src="images/tokopedia.png" width="60px">
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">Fakultas Ilmu Komputer UNIKU &copy; 2021 Created By : <a href="">Rizki Subagja</a></p>
    </div>
    <!-- End copyright  -->

    <a href="javascript:void(0);" id="back-to-top" title="Back to top" style="display: none;">
        <i class="icofont-arrow-up"></i>
    </a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <!-- <script src="js/inewsticker.js"></script> -->
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <?php include "_Pages/Dashboard/DashboardJs.php"; ?>
    <script>
		
	</script>
    <script type="text/javascript" src="./_Pages/Dashboard/Dashboard.js"></script>
    <script type="text/javascript" src="./_Pages/Daftar/Daftar.js"></script>
    <script type="text/javascript" src="./_Pages/Login/Login.js"></script>
    <script type="text/javascript" src="./_Pages/MyProfile/MyProfile.js"></script>
    <script type="text/javascript" src="./_Pages/Akses/Akses.js"></script>
    <script type="text/javascript" src="./_Pages/Produk/Produk.js"></script>
    <script type="text/javascript" src="./_Pages/Ongkir/Ongkir.js"></script>
    <script type="text/javascript" src="./_Pages/Transaksi/Transaksi.js"></script>
    <script type="text/javascript" src="./_Pages/Promosi/Promosi.js"></script>
    <script type="text/javascript" src="./_Pages/Profile/Profile.js"></script>
    <script type="text/javascript" src="./_Pages/Chatting/Chatting.js"></script>
    <script type="text/javascript" src="./_Pages/ChattingPelanggan/ChattingPelanggan.js"></script>
    <script type="text/javascript" src="./_Pages/Keranjang/Keranjang.js"></script>
    <script type="text/javascript" src="./_Pages/HistoriTransaksi/HistoriTransaksi.js"></script>
    <script type="text/javascript" src="./_Pages/Testimoni/Testimoni.js"></script>
    <script type="text/javascript" src="./_Pages/Laporan/Laporan.js"></script>
    
    <?php
        include "NotifikasiSwal.php";
    ?>
</body>
</html>