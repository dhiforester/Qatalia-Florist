<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="border-1 text-center">No</th>
                <th class="border-1 text-center">Tanggal</th>
                <th class="border-1 text-center">Pelanggan</th>
                <th class="border-1 text-center">Testimoni</th>
                <th class="border-1 text-center">Saran & Kritik</th>
                <th class="border-1 text-center">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../../_Config/Connection.php";
                $JumlahTestimoni= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni"));
                if(empty($JumlahTestimoni)){
                    echo '<tr><td colspan="6" class="text-center text-danger">Belum Ada Testimoni</td></tr>';
                }else{
                    $no = 1;
                    $query = mysqli_query($Conn, "SELECT*FROM testimoni ORDER BY id_testimoni DESC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_testimoni= $data['id_testimoni'];
                        $id_transaksi= $data['id_transaksi'];
                        $id_akses= $data['id_akses'];
                        $testimoni= $data['testimoni'];
                        $saran_kritik= $data['saran_kritik'];
                        //Buka Data transaksi untuk menarik tanggal
                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                        $tanggal = $DataTransaksi['tanggal'];
                        //Buka Data Nama Pelanggan
                        $QryPelanggan = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataPelanggan = mysqli_fetch_array($QryPelanggan);
                        $nama = $DataPelanggan['nama'];
                        //Potong Testimoni
                        $testimoni_view = substr($testimoni,0,20);
                        $saran_kritik_view = substr($saran_kritik,0,20);
                        echo '  <tr>';
                        echo '      <td class="border-1 text-center">'.$no.'</td>';
                        echo '      <td class="border-1">'.$tanggal.'</td>';
                        echo '      <td class="border-1">'.$nama.'</td>';
                        echo '      <td class="border-1">'.$testimoni_view.'...</td>';
                        echo '      <td class="border-1">'.$saran_kritik_view.'...</td>';
                        echo '      <td class="border-1 font-weight-bold text-center">';
                        echo '          <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalDetailTestimoni" data-id="'.$id_testimoni.'" title="Detail Testimoni">';
                        echo '              <i class="icofont-info-circle"></i> Detail';
                        echo '          </button>';
                        echo '      </td>';
                        echo '  </tr>';
                        $no++;
                    }
                }
            ?>
        </tbody>
    </table>
</div>