<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="border-1 text-center">No</th>
                <th class="border-1 text-center">Nama</th>
                <th class="border-1 text-center">Email</th>
                <th class="border-1 text-center">Username</th>
                <th class="border-1 text-center">Password</th>
                <th class="border-1 text-center">Akses</th>
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
                    $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY id_akses DESC");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM akses WHERE username like '%$keyword%' OR email like '%$keyword%' OR nama like '%$keyword%' OR akses like '%$keyword%' ORDER BY id_akses DESC");
                }
                while ($data = mysqli_fetch_array($query)) {
                    $id_akses= $data['id_akses'];
                    $nama= $data['nama'];
                    $email= $data['email'];
                    $username= $data['username'];
                    $password= $data['password'];
                    $akses= $data['akses'];
                    if($akses=="Pelanggan"){
                        $label_akses='<span  class="badge badge-success">Pelanggan</span>';
                    }else{
                        if($akses=="Customer Service"){
                            $label_akses='<span  class="badge badge-primary">C.Service</span>';
                        }else{
                            if($akses=="Admin"){
                                $label_akses='<span  class="badge badge-danger">Admin</span>';
                            }else{
                                if($akses=="Pemilik"){
                                    $label_akses='<span  class="badge badge-warning">Pemilik</span>';
                                }else{
                                    $label_akses='<span  class="badge badge-default">None</span>';
                                }
                            }
                        }
                    }
                    echo '  <tr>';
                    echo '      <td class="border-1 text-center">'.$no.'</td>';
                    echo '      <td class="border-1">'.$nama.'</td>';
                    echo '      <td class="border-1">'.$email.'</td>';
                    echo '      <td class="border-1">'.$username.'</td>';
                    echo '      <td class="border-1">'.$password.'</td>';
                    echo '      <td class="border-1 text-center">'.$label_akses.'</td>';
                    echo '      <td class="border-1 font-weight-bold text-center">';
                    echo '          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalEditAkses" data-id="'.$id_akses.'" title="Edit Data Akses">';
                    echo '              <i class="fas fa-edit"></i>';
                    echo '          </button>';
                    echo '          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDeleteAkses" data-id="'.$id_akses.'" title="Hapus Data Akses">';
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