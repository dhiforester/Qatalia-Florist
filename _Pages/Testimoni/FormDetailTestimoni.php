<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //tangkap GET id_testimoni
    if(empty($_POST['id_testimoni'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <span class="text-danger">ID Testimoni Tidak Boleh</span>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-md btn-dark" data-dismiss="modal">';
        echo '      <i class="icofont-close-circled"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        $Qry = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_testimoni='$id_testimoni'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $id_testimoni= $Data['id_testimoni'];
        $id_transaksi= $Data['id_transaksi'];
        $id_akses= $Data['id_akses'];
        $testimoni= $Data['testimoni'];
        $saran_kritik= $Data['saran_kritik'];
        //Buka Data transaksi untuk menarik tanggal
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $tanggal = $DataTransaksi['tanggal'];
        //Buka Data Nama Pelanggan
        $QryPelanggan = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataPelanggan = mysqli_fetch_array($QryPelanggan);
        $nama = $DataPelanggan['nama'];
?>
    <div class="row">
        <div class="col-md-12">
            <table width="100%">
                <tr>
                    <td><b>ID Transaksi</b></td>
                    <td><b>:</b></td>
                    <td><?php echo $id_transaksi;?></td>
                </tr>
                <tr>
                    <td><b>Tanggal</b></td>
                    <td><b>:</b></td>
                    <td><?php echo $tanggal;?></td>
                </tr>
                <tr>
                    <td><b>Pelanggan</b></td>
                    <td><b>:</b></td>
                    <td><?php echo $nama;?></td>
                </tr>
                <tr>
                    <td><b>Testimoni</b></td>
                    <td><b>:</b></td>
                    <td><?php echo $testimoni;?></td>
                </tr>
                <tr>
                    <td><b>Saran & Kritik</b></td>
                    <td><b>:</b></td>
                    <td><?php echo $saran_kritik;?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pre-scrollable">
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><b>No</b></th>
                            <th class="text-center"><b>Produk/Barang</b></th>
                            <th class="text-center"><b>Reting</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $query = mysqli_query($Conn, "SELECT*FROM reting WHERE id_transaksi='$id_transaksi' AND reting!='' ORDER BY id_reting DESC");
                            while ($data = mysqli_fetch_array($query)) {
                                $id_reting= $data['id_reting'];
                                $id_barang= $data['id_barang'];
                                $reting= $data['reting'];
                                //Buka data barang
                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($QryBarang);
                                $nama_barang = $DataBarang['nama_barang'];
                                echo '  <tr>';
                                echo '      <td class="border-1 text-center">'.$no.'</td>';
                                echo '      <td class="border-1">'.$nama_barang.'</td>';
                                echo '      <td class="border-1">'.$reting.'</td>';
                                echo '  </tr>';
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
<?php } ?>