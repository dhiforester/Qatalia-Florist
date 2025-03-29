<div class="table table-responsive">
    <table class="table table-bordered">
        <thead class="">
            <tr>
                <th class="border-1 text-center">No</th>
                <th class="border-1 text-center">Nama Produk</th>
                <th class="border-1 text-center">Kategori</th>
                <th class="border-1 text-center">Harga</th>
                <th class="border-1 text-center">Stok</th>
                <th class="border-1 text-center">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../../_Config/Connection.php";
                include "../../_Config/Session.php";
                $no = 1;
                //KONDISI PENGATURAN MASING FILTER
                if(!empty($_POST['keyword'])){
                    $keyword=$_POST['keyword'];
                }else{
                    $keyword="";
                }
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM barang ORDER BY id_barang DESC");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM barang WHERE nama_barang like '%$keyword%' OR harga like '%$keyword%' OR satuan like '%$keyword%' OR keterangan like '%$keyword%' ORDER BY id_barang DESC");
                }
                while ($data = mysqli_fetch_array($query)) {
                    $id_barang= $data['id_barang'];
                    $nama_barang= $data['nama_barang'];
                    $harga= $data['harga'];
                    $satuan= $data['satuan'];
                    $stok= $data['stok'];
                    $keterangan= $data['keterangan'];
                    $kategori= $data['kategori'];
                    $hasil_rupiah = "Rp " . number_format($harga,0,',','.');
                    $stok_rp = "" . number_format($stok,0,',','.');
                    echo '  <tr>';
                    echo '      <td class="border-1 text-center">'.$no.'</td>';
                    echo '      <td class="border-1">'.$nama_barang.'</td>';
                    echo '      <td class="border-1">'.$kategori.'</td>';
                    echo '      <td class="border-1">'.$hasil_rupiah.'</td>';
                    echo '      <td class="border-1">'.$stok_rp.' <small>'.$satuan.'</small></td>';
                    echo '      <td class="border-1 text-center">';
                    echo '          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalEditProduk" data-id="'.$id_barang.'" title="Edit Data Produk">';
                    echo '              <i class="fas fa-edit"></i>';
                    echo '          </button>';
                    echo '          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDeleteProduk" data-id="'.$id_barang.'" title="Hapus Data Produk">';
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