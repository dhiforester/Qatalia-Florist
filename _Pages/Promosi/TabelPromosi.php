<div class="table table-responsive">
    <table class="table table-bordered">
        <thead class="">
            <tr>
                <th class="border-1 text-center">No</th>
                <th class="border-1 text-center">Produk/Barang</th>
                <th class="border-1 text-center">Mulai</th>
                <th class="border-1 text-center">Selesai</th>
                <th class="border-1 text-center">Diskon (%)</th>
                <th class="border-1 text-center">Harga (Rp)</th>
                <th class="border-1 text-center">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../../_Config/Connection.php";
                $no = 1;
                //KONDISI PENGATURAN MASING FILTER
                if(!empty($_POST['keyword'])){
                    $keyword=$_POST['keyword'];
                }else{
                    $keyword="";
                }
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM diskon ORDER BY id_diskon DESC");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM diskon WHERE periode_awal like '%$keyword%' OR periode_akhir like '%$keyword%' OR diskon like '%$keyword%' ORDER BY id_diskon DESC");
                }
                while ($data = mysqli_fetch_array($query)) {
                    $id_diskon= $data['id_diskon'];
                    $id_barang= $data['id_barang'];
                    $periode_awal= $data['periode_awal'];
                    $periode_akhir= $data['periode_akhir'];
                    $diskon= $data['diskon'];
                    
                    //Buka data barang
                    $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                    $DataBarang= mysqli_fetch_array($QryBarang);
                    $nama_barang= $DataBarang['nama_barang'];
                    $harga= $DataBarang['harga'];
                    if(!empty($diskon)){
                        $potongan=($diskon/100)*$harga;
                    }else{
                        $potongan=0;
                    }
                    $HargaJual=$harga-$potongan;
                    $harga_rp = "" . number_format($harga,0,',','.');
                    $HargaJual_rp = "" . number_format($HargaJual,0,',','.');
                    echo '  <tr>';
                    echo '      <td class="border-1 text-center">'.$no.'</td>';
                    echo '      <td class="border-1">'.$nama_barang.'</td>';
                    echo '      <td class="border-1">'.$periode_awal.'</td>';
                    echo '      <td class="border-1">'.$periode_akhir.'</td>';
                    echo '      <td class="text-right border-1">'.$diskon.'</td>';
                    echo '      <td class="border-1 text-right"><s>'.$harga_rp.'</s> '.$HargaJual_rp.'</td>';
                    echo '      <td class="border-1 text-center">';
                    echo '          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalEditPromosi" data-id="'.$id_diskon.'" title="Edit Data Promosi">';
                    echo '              <i class="fas fa-edit"></i>';
                    echo '          </button>';
                    echo '          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDeletePromosi" data-id="'.$id_diskon.'" title="Hapus Data Promosi">';
                    echo '              <i class="fas fa-trash"></i>';
                    echo '          </button>';
                    echo '      </td>';
                    echo '  </tr>';
                    $no++;
                }
            ?>
        </tbody>
    </table>
</div>