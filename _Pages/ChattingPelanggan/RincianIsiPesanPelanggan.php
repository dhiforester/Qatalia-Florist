<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['GetIdBarang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!!</span>';
    }else{
        $id_barang=$_POST['GetIdBarang'];
        //Buka Data Chat
        $JumlahChat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_barang='$id_barang' AND id_akses='$SessionIdAkses'"));
        if(empty($JumlahChat)){
            echo '<span class="text-danger">Belum Ada Pesan Chat!!</span>';
        }else{
            $UpdateStatus = mysqli_query($Conn,"UPDATE chat SET status='Dibaca' WHERE id_akses='$SessionIdAkses' AND id_barang='$id_barang' AND kategori='Admin To Pelanggan'") or die(mysqli_error($Conn)); 
            //Array Chatting
            $QryChatting = mysqli_query($Conn, "SELECT*FROM chat WHERE id_barang='$id_barang' AND id_akses='$SessionIdAkses' ORDER BY id_chat ASC");
            while ($DataChatting = mysqli_fetch_array($QryChatting)) {
                $id_chat= $DataChatting['id_chat'];
                $tanggal= $DataChatting['tanggal'];
                $pesan= $DataChatting['pesan'];
                $kategori= $DataChatting['kategori'];
?>
                <div class="row">
                    <div class="col-md-10">
                        <div class="card mt-2 mb-2 mr-3 ml-3">
                            <div class="card-body text-white <?php if($kategori=="Pelanggan To Admin"){echo "bg-success";}else{echo "bg-info";} ?>">
                                <?php 
                                    if($kategori=="Pelanggan To Admin"){
                                        echo "<b>Saya</b><br>";
                                        echo "<small>$tanggal</small><br>";
                                    }else{
                                        echo "<b>Balasan Admin</b><br>";
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
?>