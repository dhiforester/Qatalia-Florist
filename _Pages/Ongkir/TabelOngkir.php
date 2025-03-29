<div class="table table-responsive">
    <table class="table table-bordered">
        <thead class="">
            <tr>
                <th class="border-1 text-center">No</th>
                <th class="border-1 text-center">Provinsi</th>
                <th class="border-1 text-center">Kabupaten</th>
                <th class="border-1 text-center">Kecamatan</th>
                <th class="border-1 text-center">Desa</th>
                <th class="border-1 text-center">Ongkir</th>
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
                    $query = mysqli_query($Conn, "SELECT*FROM ongkir ORDER BY id_ongkir DESC");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM ongkir WHERE provinsi like '%$keyword%' OR kabupaten like '%$keyword%' OR kecamatan like '%$keyword%' OR desa like '%$keyword%' OR ongkir like '%$keyword%' ORDER BY id_ongkir DESC");
                }
                while ($data = mysqli_fetch_array($query)) {
                    $id_ongkir= $data['id_ongkir'];
                    $provinsi= $data['provinsi'];
                    $kabupaten= $data['kabupaten'];
                    $kecamatan= $data['kecamatan'];
                    $desa= $data['desa'];
                    $ongkir= $data['ongkir'];
                    $ongkir_rp = "Rp " . number_format($ongkir,0,',','.');
                    echo '  <tr>';
                    echo '      <td class="border-1 text-center">'.$no.'</td>';
                    echo '      <td class="border-1">'.$provinsi.'</td>';
                    echo '      <td class="border-1">'.$kabupaten.'</td>';
                    echo '      <td class="border-1">'.$kecamatan.'</td>';
                    echo '      <td class="border-1">'.$desa.'</td>';
                    echo '      <td class="border-1 text-right">'.$ongkir_rp.'</td>';
                    echo '      <td class="border-1 text-center">';
                    echo '          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalEditOngkir" data-id="'.$id_ongkir.'" title="Edit Data Ongkir">';
                    echo '              <i class="fas fa-edit"></i>';
                    echo '          </button>';
                    echo '          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDeleteOngkir" data-id="'.$id_ongkir.'" title="Hapus Data Ongkir">';
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