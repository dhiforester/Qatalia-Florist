<?php
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Hitung apakah ada keranjang
    $JumlahKeranjang= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'"));
    if(empty($JumlahKeranjang)){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center">';
        echo '      <span class>';
        echo '          <b>Keterangan :</b><br> Belum ada data keranjang!!';
        echo '      </span>';
        echo '  </div>';
        echo '</div>';
    }else{
?>
    <script>
        //Alamat berubah
        $('#PilihProvinsi').change(function(){
            $('#PilihDesa').html("");
            $('#PilihKecamatan').html("");
            $('#PilihKabupaten').html("Loading..");
            var Provinsi = $('#PilihProvinsi').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Pages/Daftar/PilihKabupaten.php',
                data 	:  'Provinsi='+ Provinsi,
                success : function(data){
                    $('#PilihKabupaten').html(data);
                }
            });
        });
        $('#PilihKabupaten').change(function(){
            $('#PilihDesa').html("");
            $('#PilihKecamatan').html("Loading..");
            var PilihKabupaten = $('#PilihKabupaten').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Pages/Daftar/PilihKecamatan.php',
                data 	:  'PilihKabupaten='+ PilihKabupaten,
                success : function(data){
                    $('#PilihKecamatan').html(data);
                }
            });
        });
        $('#PilihKecamatan').change(function(){
            $('#PilihDesa').html("Loading..");
            var PilihKecamatan = $('#PilihKecamatan').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Pages/Daftar/PilihDesa.php',
                data 	:  'PilihKecamatan='+ PilihKecamatan,
                success : function(data){
                    $('#PilihDesa').html(data);
                }
            });
        });
        $('#PilihDesa').change(function(){
            $('#NilaiOngkir').html("Loading..");
            $('#NilaiTagihan').html("Loading..");
            var PilihDesa = $('#PilihDesa').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Pages/Keranjang/GenerateOngkir.php',
                data 	:  'PilihDesa='+ PilihDesa,
                success : function(data){
                    $('#NilaiOngkir').html(data);
                }
            });
            $.ajax({
                type 	: 'POST',
                url 	: '_Pages/Keranjang/GenerateJumlahTagihan.php',
                data 	:  'PilihDesa='+ PilihDesa,
                success : function(data){
                    $('#NilaiTagihan').html(data);
                }
            });
        });
        $('#metode_pembayaran').change(function(){
            $('#FormLanjutanTransfer').html("Loading..");
            var metode_pembayaran = $('#metode_pembayaran').val();
            $.ajax({
                type 	: 'POST',
                url 	: '_Pages/Keranjang/FormLanjutanTransfer.php',
                data 	:  'metode_pembayaran='+ metode_pembayaran,
                success : function(data){
                    $('#FormLanjutanTransfer').html(data);
                }
            });
        });
        $('#ProsesAddToTransaksi').submit(function(){
            $('#NotifikasiSimpanTransaksi').html('Loading..');
            var form = $('#ProsesAddToTransaksi')[0];
            var data = new FormData(form);
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Pages/Keranjang/ProsesAddToTransaksi.php',
                data 	    :  data,
                cache       : false,
                processData : false,
                contentType : false,
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#NotifikasiSimpanTransaksi').html(data);
                    var NotifikasiSimpanTransaksiBerhasil=$('#NotifikasiSimpanTransaksiBerhasil').html();
                    if(NotifikasiSimpanTransaksiBerhasil=="Berhasil"){
                        location.href = "index.php?Pages=HistoriTransaksi"
                    }
                }
            });
        });
    </script>
    <div class="table table-responsive">
        <table class="table table-bordered">
            <thead class="bg-dark text-light">
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">Keterangan</td>
                    <td class="text-center">Qty</td>
                    <td class="text-center">Harga</td>
                    <td class="text-center">Diskon</td>
                    <td class="text-center">Jumlah</td>
                    <td class="text-center">Option</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
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
                        $keterangan= $DataKeranjang['keterangan'];
                        $harga_rp = "Rp " . number_format($harga,0,',','.');
                        $jumlah_rp = "Rp " . number_format($jumlah,0,',','.');
                        $diskon_rp = "Rp " . number_format($diskon,0,',','.');
                        //Buka data produk
                        $QryDetailproduk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                        $DataDetailproduk = mysqli_fetch_array($QryDetailproduk);
                        $nama_barang = $DataDetailproduk['nama_barang'];
                        $harga = $DataDetailproduk['harga'];
                        $satuan = $DataDetailproduk['satuan'];
                        $JumlahTotal=$jumlah+$JumlahTotal;
                        echo '<tr>';
                        echo '  <td class="text-center">'.$no.'</td>';
                        echo '  <td class="text-left"><b>'.$nama_barang.'</b><br>'.$keterangan.'</td>';
                        echo '  <td class="text-left">'.$qty.' '.$satuan.'</td>';
                        echo '  <td class="text-right">'.$harga_rp.'</td>';
                        echo '  <td class="text-right">'.$diskon_rp.'</td>';
                        echo '  <td class="text-right">'.$jumlah_rp.'</td>';
                        echo '  <td class="text-center">';
                        echo '      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalDetailRincian" data-id="'.$id_rincian.'"><i class="icofont-info-circle"></i> Detail</button>';
                        echo '  </td>';
                        echo '</tr>';
                        $no++;
                    }
                    $JumlahTotalRp = "Rp " . number_format($JumlahTotal,0,',','.');
                    $JumlahTagihan=$JumlahTotal+$OngkirProfilePelanggan;
                    $JumlahTagihanRp = "Rp " . number_format($JumlahTagihan,0,',','.');
                    echo '<tr>';
                    echo '  <td class="text-right"></td>';
                    echo '  <td class="text-left" colspan="4"><b>JUMLAH ORDER</b></td>';
                    echo '  <td class="text-right">'.$JumlahTotalRp.'</td>';
                    echo '  <td class="text-right"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '  <td class="text-right"></td>';
                    echo '  <td class="text-left" colspan="4"><b>ONGKOS KIRIM</b></td>';
                    echo '  <td class="text-right" id="NilaiOngkir">'.$RpOngkir.'</td>';
                    echo '  <td class="text-right"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '  <td class="text-right"></td>';
                    echo '  <td class="text-left" colspan="4"><b>JUMLAH TAGIHAN</b></td>';
                    echo '  <td class="text-right" id="NilaiTagihan">'.$JumlahTagihanRp.'</td>';
                    echo '  <td class="text-right"></td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="PilihProvinsi">Provinsi</label>
            <select name="Provinsi" id="PilihProvinsi" class="form-control" required>
                <option>-Provinsi-</option>
                <?php
                    $QryProvinsi = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir ORDER BY provinsi ASC");
                    while ($DataProvinsi = mysqli_fetch_array($QryProvinsi)) {
                        $id_ongkir= $DataProvinsi['id_ongkir'];
                        $provinsi= $DataProvinsi['provinsi'];
                        if($ProvinsiProfilePelanggan==$provinsi){
                            echo '<option value="'.$provinsi.'" selected>'.$provinsi.'</option>';
                        }else{
                            echo '<option value="'.$provinsi.'">'.$provinsi.'</option>';
                        }
                        
                    }
                ?>
            </select> 
            
        </div>
        <div class="col-md-3">
            <label for="PilihKabupaten">Kabupaten</label>
            <select name="Kabupaten" id="PilihKabupaten" class="form-control" required>
                <option>-Pilih Kabupaten-</option>
                <?php
                    $QryKabupaten = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$ProvinsiProfilePelanggan' ORDER BY kabupaten ASC");
                    while ($DataKabupaten = mysqli_fetch_array($QryKabupaten)) {
                        $id_ongkir= $DataKabupaten['id_ongkir'];
                        $kabupaten= $DataKabupaten['kabupaten'];
                        if(!empty($kabupaten)){
                            if($KabupatenProfilePelanggan==$kabupaten){
                                echo '<option value="'.$kabupaten.'" selected>'.$kabupaten.'</option>';
                            }else{
                                echo '<option value="'.$kabupaten.'">'.$kabupaten.'</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="PilihKecamatan">Kecamatan</label>
            <select name="Kecamatan" id="PilihKecamatan" class="form-control" required>
                <option>-Pilih Kecamatan-</option>
                <?php
                    $QryKecamatan = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$KabupatenProfilePelanggan' ORDER BY kecamatan ASC");
                    while ($DataKecamatan = mysqli_fetch_array($QryKecamatan)) {
                        $id_ongkir= $DataKecamatan['id_ongkir'];
                        $kecamatan= $DataKecamatan['kecamatan'];
                        if(!empty($kecamatan)){
                            if($KecamatanProfilePelanggan==$kecamatan){
                                echo '<option value="'.$kecamatan.'" selected>'.$kecamatan.'</option>';
                            }else{
                                echo '<option value="'.$kecamatan.'">'.$kecamatan.'</option>';
                            }
                        }
                    }
                ?>
            </select> 
        </div>
        <div class="col-md-3">
            <label for="PilihDesa">Desa/Kelurahan</label>
            <select name="Desa" id="PilihDesa" class="form-control" required>
                <option>-Pilih Desa/Kel-</option>
                <?php
                    $QryDesa = mysqli_query($Conn, "SELECT DISTINCT desa, id_ongkir FROM ongkir WHERE kecamatan='$KecamatanProfilePelanggan' ORDER BY desa ASC");
                    while ($DataDesa = mysqli_fetch_array($QryDesa)) {
                        $id_ongkir_desa= $DataDesa['id_ongkir'];
                        $desa= $DataDesa['desa'];
                        if(!empty($desa)){
                            if($DesaProfilePelanggan==$desa){
                                echo '<option value="'.$id_ongkir_desa.'" selected>'.$desa.'</option>';
                            }else{
                                echo '<option value="'.$id_ongkir_desa.'">'.$desa.'</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="alamat">Alamat Selengkapnya</label>
            <div class="input-group">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $AlamatProfilePelanggan;?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="pembayaran">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                <option value="">-Pilih-</option>
                <option value="COD">COD</option>
                <option value="Transfer">Transfer</option>
            </select>
        </div>
    </div>
    <div class="row mb-4" id="FormLanjutanTransfer">
        
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiSimpanTransaksi">
            <span>Pastikan Informasi Transaksi Sudah Anda isi dengan lengkap</span>
        </div>
    </div>
<?php } ?>