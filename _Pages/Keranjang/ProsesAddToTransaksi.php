<?php
    date_default_timezone_set("Asia/Jakarta");
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $query_max=mysqli_query($Conn, "SELECT max(id_transaksi) as maksimal FROM transaksi ")or die(mysqli_error($Conn));
    while($DataMax=mysqli_fetch_array($query_max)){
        $maksimal=$DataMax['maksimal'];
    }
    $id_transaksi=$maksimal+1;
    $tanggal=date('Y-m-d');
    //Hitung apakah ada keranjang
    $JumlahKeranjang= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'"));
    if(empty($JumlahKeranjang)){
        echo '<span class="text-danger">Maaf, keranjang masih kosong.</span>';
    }else{
        if(empty($_POST['Provinsi'])){
            echo '<span class="text-danger">Provinsi Tidak Boleh Kosong.</span>';
        }else{
            if(empty($_POST['Kabupaten'])){
                echo '<span class="text-danger">Kabupaten Tidak Boleh Kosong.</span>';
            }else{
                if(empty($_POST['Kecamatan'])){
                    echo '<span class="text-danger">Kecamatan Tidak Boleh Kosong.</span>';
                }else{
                    if(empty($_POST['Desa'])){
                        echo '<span class="text-danger">Desa Tidak Boleh Kosong.</span>';
                    }else{
                        if(empty($_POST['alamat'])){
                            echo '<span class="text-danger">Informasi Alamat Tidak Boleh Kosong.</span>';
                        }else{
                            if(empty($_POST['metode_pembayaran'])){
                                echo '<span class="text-danger">Metode Pembayaran Tidak Boleh Kosong.</span>';
                            }else{
                                //Inisiasi Variabel yang wajib
                                $Provinsi=$_POST['Provinsi'];
                                $Kabupaten=$_POST['Kabupaten'];
                                $Kecamatan=$_POST['Kecamatan'];
                                $id_ongkir=$_POST['Desa'];
                                $alamat=$_POST['alamat'];
                                $metode_pembayaran=$_POST['metode_pembayaran'];
                                if($metode_pembayaran=="Transfer"){
                                    //Buka variabel tidak wajib
                                    if(empty($_POST['no_bukti'])){
                                        $ValidasiMetode="Nomor Bukti Pembayaran Harus Diisi";
                                    }else{
                                        if(empty($_FILES['file_bukti']['name'])){
                                            $ValidasiMetode="Silahkan Upload Bukti Transfer Terlebih Dulu";
                                        }else{
                                        //nama gambar
                                            $nama_gambar=$_FILES['file_bukti']['name'];
                                            //ukuran gambar
                                            $ukuran_gambar = $_FILES['file_bukti']['size']; 
                                            //tipe
                                            $tipe_gambar = $_FILES['file_bukti']['type']; 
                                            //sumber gambar
                                            $tmp_gambar = $_FILES['file_bukti']['tmp_name'];
                                            //Buat Nama File
                                            $milliseconds = round(microtime(true) * 1000);
                                            $Pecah = explode("." , $nama_gambar);
                                            $BiasanyaNama=$Pecah[0];
                                            $Ext=$Pecah[1];
                                            $NamaBaru = "$milliseconds.$Ext";
                                            //Simpan Gambar di
                                            $path = "../../images/bukti_pembayaran/".$NamaBaru;
                                            if($tipe_gambar == "image/jpeg" || $tipe_gambar == "image/png" || $tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"){
                                                if(move_uploaded_file($tmp_gambar, $path)){
                                                    $no_bukti=$_POST['no_bukti'];
                                                    $ValidasiMetode="Valid";
                                                }
                                            }else{
                                                $ValidasiMetode="Format File Bukti Transfer Yang Anda Kirim Tidak Sesuai (Gunakan jpg, jpeg, png, gif)";
                                            }
                                        }
                                    }
                                }else{
                                    $ValidasiMetode="Valid";
                                    $no_bukti="";
                                    $NamaBaru="";
                                }
                                $JumlahTotal=0;
                                $QryKeranjang= mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0' ORDER BY id_rincian ASC");
                                while ($DataKeranjang = mysqli_fetch_array($QryKeranjang)) {
                                    $id_rincian= $DataKeranjang['id_rincian'];
                                    $id_barang= $DataKeranjang['id_barang'];
                                    $nama_barang= $DataKeranjang['nama_barang'];
                                    $harga= $DataKeranjang['harga'];
                                    $qty= $DataKeranjang['qty'];
                                    $diskon= $DataKeranjang['diskon'];
                                    $jumlah= $DataKeranjang['jumlah'];
                                    //Buka data produk
                                    $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                    $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
                                    $nama_barang = $DataDetailproduk['nama_barang'];
                                    $harga = $DataDetailproduk['harga'];
                                    $stok = $DataDetailproduk['stok'];
                                    $satuan = $DataDetailproduk['satuan'];
                                    $StokBaru=$stok-$qty;
                                    //Update stok
                                    $UpdateBarang = mysqli_query($Conn,"UPDATE barang SET stok='$StokBaru' WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                    $JumlahTotal=$jumlah+$JumlahTotal;
                                }
                                if($ValidasiMetode=="Valid"){
                                    $status_pembayaran="Menunggu Validasi";
                                    $status_pengiriman="Menunggu Validasi";
                                    $entry_transaksi="INSERT INTO transaksi (
                                        id_transaksi,
                                        id_akses,
                                        id_ongkir,
                                        tanggal,
                                        metode_pembayaran,
                                        jumlah_tagihan,
                                        no_bukti,
                                        file_bukti,
                                        alamat,
                                        status_pembayaran,
                                        status_pengiriman
                                    ) VALUES (
                                        '$id_transaksi',
                                        '$SessionIdAkses',
                                        '$id_ongkir',
                                        '$tanggal',
                                        '$metode_pembayaran',
                                        '$JumlahTotal',
                                        '$no_bukti',
                                        '$NamaBaru',
                                        '$alamat',
                                        '$status_pembayaran',
                                        '$status_pengiriman'
                                    )";
                                    $InputTransaksi=mysqli_query($Conn, $entry_transaksi);
                                    if($InputTransaksi){
                                        //Edit Rincian
                                        $UpdateRincian = mysqli_query($Conn,"UPDATE rincian SET id_transaksi='$id_transaksi' WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'") or die(mysqli_error($Conn)); 
                                        echo "<span class='text-success' id='NotifikasiSimpanTransaksiBerhasil'>Berhasil</span>";
                                    }else{
                                        echo '<span class="text-danger">Proses Input Data Transaksi Gagal</span>';
                                    }
                                }else{
                                    echo '<span class="text-danger">'.$ValidasiMetode.'</span>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>