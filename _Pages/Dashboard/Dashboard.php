<?php
    $JumlahPelanggan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan'"));
    $JumlahDataOngkir = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM ongkir WHERE ongkir!=''"));
    $JumlahAdmin = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Admin'"));
    $JumlahProduk = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
    $JumlahTransaksi= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
    $JumlahTestimoni= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni"));
    //Menghitung Jumlah Pendapatan
    $BulanIni=date('Y-m');
    $Sql = mysqli_query($Conn, "SELECT SUM(jumlah_tagihan) FROM transaksi WHERE tanggal like '%$BulanIni%'");
    while($data = mysqli_fetch_array($Sql)) {
        $JumlahPendapatan="Rp." . number_format($data['SUM(jumlah_tagihan)']) ;
    }

    
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="h4"><i class="fas fa-chart-line"></i> Dashboard</h1>
    </div>
</div>
<div class="row mb-3">
    <div class="col col-md-8 mb-3">
        <div class="card border-dark">
            <div class="card-header bg-dark">
                <h4 class="card-title text-white">
                    Garfik Penjualan
                </h4>
            </div>
            <div class="card-body table-responsive">
                <canvas id="myChart" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col col-md-4 mb-3">
        <div class="card border-dark">
            <div class="card-header bg-dark">
                <h4 class="card-title text-white">
                    Penjualan Produk
                </h4>
            </div>
            <div class="card-body pre-scrollable">
                <?php
                   //Mencari Rank ------------------------------------------------------
                    $hasil_ranks=array();
                    $SqlProduk = "SELECT * FROM barang limit 10";
                    $ResultProduk = mysqli_query($Conn, $SqlProduk);
                    while($RowProduk = mysqli_fetch_assoc($ResultProduk)){
                        $IdBarang = $RowProduk['id_barang'];
                        $SqlJumlahPenjualan = "SELECT SUM(jumlah) FROM rincian WHERE id_barang='$IdBarang'";
                        $QryJumlahPenjualan = mysqli_query($Conn, $SqlJumlahPenjualan);
                        $HasilPenjualanBarang = mysqli_fetch_row($QryJumlahPenjualan);
                        if(empty($HasilPenjualanBarang[0])){
                            $jumlah_penjualan =0;
                        }else{
                            $jumlah_penjualan = $HasilPenjualanBarang[0];
                        }
                        
                        $hasil_rank['IdBarang'] = $IdBarang;
                        $hasil_rank['jumlah_penjualan'] = $jumlah_penjualan;
                        array_push($hasil_ranks,$hasil_rank);
                    }
                    asort($hasil_ranks);
                    foreach ($hasil_ranks as $rank) {
                        $IdBarang=$rank['IdBarang'];
                        $jumlah_penjualan=$rank['jumlah_penjualan'];
                        //Buka data barang
                        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$IdBarang'")or die(mysqli_error($Conn));
                        $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
                        $nama = $DataDetailproduk['nama_barang'];
                        $harga = $DataDetailproduk['harga'];
                        $satuan = $DataDetailproduk['satuan'];
                        $stok = $DataDetailproduk['stok'];
                        $keterangan = $DataDetailproduk['keterangan'];
                        $kategori = $DataDetailproduk['kategori'];
                        $gambar = $DataDetailproduk['gambar'];
                        $hasil_rupiah = "Rp " . number_format($harga,0,',','.');
                        echo '<div class="row">';
                        echo '  <div class="col col-md-6">'.$nama.'</div>';
                        echo '  <div class="col col-md-6 text-right"><small>'.$hasil_rupiah.'</small></div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card border-info">
            <div class="card-body bg-info">
                <div class="row">
                    <div class="col col-md-4 text-center">
                        <i class="icofont-users-alt-2 icofont-4x text-white"></i>
                    </div>
                    <div class="col col-md-8">
                        <h1 class="mb-1 text-white">Pelanggan</h1>
                        <i class="mb-1 text-white"><?php echo "$JumlahPelanggan Orang";?></i><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-success">
            <div class="card-body bg-success">
                <div class="row">
                    <div class="col col-md-4 text-center">
                        <i class="icofont-google-map icofont-4x text-white"></i>
                    </div>
                    <div class="col col-md-8">
                        <h1 class="mb-1 text-white">Jangkauan</h1>
                        <i class="mb-1 text-white"><?php echo "$JumlahDataOngkir Wilayah";?></i><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-warning">
            <div class="card-body bg-warning">
                <div class="row">
                    <div class="col col-md-4 text-center">
                            <i class="icofont-flora-flower icofont-4x text-white"></i>
                    </div>
                    <div class="col col-md-8">
                        <h1 class="mb-1 text-white">Produk</h1>
                        <i class="mb-1 text-white"><?php echo "$JumlahProduk Item";?></i><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-danger">
            <div class="card-body bg-danger">
                <div class="row">
                    <div class="col col-md-4 text-center">
                        <i class="icofont-cart icofont-4x text-white"></i>
                    </div>
                    <div class="col col-md-8">
                        <h1 class="mb-1 text-white">Transaksi</h1>
                        <i class="mb-1 text-white"><?php echo "$JumlahTransaksi Transaksi";?></i><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-dark">
            <div class="card-body bg-dark">
                <div class="row">
                    <div class="col col-md-4 text-center">
                        <i class="icofont-comment icofont-4x text-white"></i>
                    </div>
                    <div class="col col-md-8">
                        <h1 class="mb-1 text-white">Testimoni</h1>
                        <i class="mb-1 text-white"><?php echo "$JumlahTestimoni Pesan";?></i><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-primary">
            <div class="card-body bg-primary">
                <div class="row">
                    <div class="col col-md-4 text-center">
                        <i class="icofont-money icofont-4x text-white"></i>
                    </div>
                    <div class="col col-md-8">
                        <h1 class="mb-1 text-white">Pendapatan</h1>
                        <i class="mb-1 text-white"><?php echo "$JumlahPendapatan";?></i><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>