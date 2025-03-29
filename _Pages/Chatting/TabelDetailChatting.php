<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!!</span>';
    }else{
        if(empty($_POST['id_akses'])){
            echo '<span class="text-danger">ID Akses Tidak Boleh Kosong!!</span>';
        }else{
            $id_barang=$_POST['id_barang'];
            $id_akses=$_POST['id_akses'];
            //Update data chat Pelanggan To Admin
            $UpdateStatus = mysqli_query($Conn,"UPDATE chat SET status='Dibaca' WHERE id_akses='$id_akses' AND id_barang='$id_barang' AND kategori='Pelanggan To Admin'") or die(mysqli_error($Conn)); 
            //Buka Data Chat
            $JumlahChat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_barang='$id_barang' AND id_akses='$id_akses'"));
            if(empty($JumlahChat)){
                echo '<span class="text-danger">Belum Ada Pesan Chat!!</span>';
            }else{
                //Array Chatting
                $QryChatting = mysqli_query($Conn, "SELECT*FROM chat WHERE id_barang='$id_barang' AND id_akses='$id_akses' ORDER BY id_chat ASC");
                while ($DataChatting = mysqli_fetch_array($QryChatting)) {
                    $id_chat= $DataChatting['id_chat'];
                    $tanggal= $DataChatting['tanggal'];
                    $pesan= $DataChatting['pesan'];
                    $kategori= $DataChatting['kategori'];
                    //Buka Data Pelanggan
                    $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                    $DataAkses = mysqli_fetch_array($QryAkses);
                    $nama_pelanggan= $DataAkses['nama'];
?>
                <div class="row">
                    <div class="col-md-10">
                        <div class="card mt-2 mb-2 mr-3 ml-3">
                            <div class="card-body text-white <?php if($kategori=="Pelanggan To Admin"){echo "bg-info";}else{echo "bg-success";} ?>">
                                <?php 
                                    if($kategori=="Pelanggan To Admin"){
                                        echo "<b>$nama_pelanggan</b><br>";
                                        echo "<small>$tanggal</small><br>";
                                    }else{
                                        echo "<b>Admin</b><br>";
                                        echo "<small>$tanggal</small><br>";
                                    }
                                    echo "$pesan"; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
            }  
        }
    } 
} 
?>