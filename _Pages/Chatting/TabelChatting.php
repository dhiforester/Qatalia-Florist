<div class="table table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Pelanggan</th>
                <th class="text-center">Produk</th>
                <th class="text-center">Pesan</th>
                <th class="text-center">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../../_Config/Connection.php";
                //Hitung Pesan Ke Admin 
                $JumlahPesan=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat"));
                if(empty($JumlahPesan)){
                    echo '<tr><td colspan="5" class="text-center"><span class="text-danger">Belum Ada Pesan</span></td></tr>';
                }else{
                    //Buka Data Distinct Pesan Berdasarkan Akses
                    $QryChattingByAkses = mysqli_query($Conn, "SELECT DISTINCT id_akses FROM chat ORDER BY id_akses ASC");
                    while ($DataChattingByAkses = mysqli_fetch_array($QryChattingByAkses)) {
                        $id_akses= $DataChattingByAkses['id_akses'];
                        //Cek apakah admin
                        $QryProfilePelanggan = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataProfilePelanggan = mysqli_fetch_array($QryProfilePelanggan);
                        $NamaPelanggan= $DataProfilePelanggan['nama'];
                        $akses= $DataProfilePelanggan['akses'];
                        if($akses=="Pelanggan"){
                            $no=1;
                            //Arraykan Berdasarkan Produk
                            $QryChattingByProduk = mysqli_query($Conn, "SELECT DISTINCT id_barang FROM chat WHERE id_akses='$id_akses' ORDER BY id_barang ASC");
                            while ($DataChattingByProduk = mysqli_fetch_array($QryChattingByProduk)) {
                                $id_barang= $DataChattingByProduk['id_barang'];
                                //Buka Nama Barang
                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($QryBarang);
                                $nama_barang= $DataBarang['nama_barang'];
                                //Hitung jumlah pesan Pelanggan To Admin Yang Belum Dibaca Berdasarkan id_akses dan id_barang
                                $JumlahPesanIni=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$id_akses' AND id_barang='$id_barang' AND kategori='Pelanggan To Admin' AND status='Terkirim'"));
                                echo '<tr>';
                                echo '  <td class="text-center">'.$no.'</td>';
                                echo '  <td class="text-left">'.$NamaPelanggan.'</td>';
                                echo '  <td class="text-left">'.$nama_barang.'</td>';
                                if(!empty($JumlahPesanIni)){
                                    echo '  <td class="text-left text-danger">'.$JumlahPesanIni.' Pesan Belum Dibaca</td>';
                                }else{
                                    echo '  <td class="text-left text-success">Tidak Ada Pesan Baru</td>';
                                }
                                echo '  <td class="text-center">';
                                echo '      <a href="index.php?Pages=Admin&SubPage=DetailChatting&id_barang='.$id_barang.'&id_akses='.$id_akses.'" class="btn btn-md btn-info">';
                                echo '          <i class="icofont-speech-comments"></i> Chat';
                                echo '      </a>';
                                echo '  </td>';
                                echo '</tr>';
                                $no++;
                            }
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</div>