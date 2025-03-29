<?php
    if($SessionAkses!=="Admin"){
        include "ErrorAkses.php";
    }else{
        if(empty($_GET['id_akses'])){
            echo '<div class="about-box-main">';
            echo '  <div class="container">';
            echo '      <div class="card">';
            echo '          <div class="card-body">';
            echo '              <div class="row">';
            echo '                  <div class="col-md-12 text-center">';
            echo '                      <span class="text-danger">ID Akses Tidak Boleh Kosong</span>';
            echo '                  </div>';
            echo '              </div>';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            if(empty($_GET['id_barang'])){
                echo '<div class="about-box-main">';
                echo '  <div class="container">';
                echo '      <div class="card">';
                echo '          <div class="card-body">';
                echo '              <div class="row">';
                echo '                  <div class="col-md-12 text-center">';
                echo '                      <span class="text-danger">ID Barang Tidak Boleh Kosong</span>';
                echo '                  </div>';
                echo '              </div>';
                echo '          </div>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }else{
                $id_akses=$_GET['id_akses'];
                $id_barang=$_GET['id_barang'];
                //Buka Data Pelanggan
                $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                $DataAkses = mysqli_fetch_array($QryAkses);
                $nama_pelanggan= $DataAkses['nama'];
                //Buka Data barang
                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                $DataBarang = mysqli_fetch_array($QryBarang);
                $nama_barang= $DataBarang['nama_barang'];
?>
    <div class="about-box-main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                        <h1 class="h4"><i class="fa fa-snapchat"></i> Detail Chatting</h1>
                            <p>
                                <b>Pelanggan :</b> <span id="GetIdAkses"><?php echo "$id_akses";?></span>. <?php echo "$nama_pelanggan";?><br>
                                <b>Produk :</b> <span id="GetIdBarang"><?php echo "$id_barang";?></span>. <?php echo "$nama_barang";?><br>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?Pages=Admin&SubPage=Chatting" class="btn btn-md btn-block btn-dark">
                                <i class="icofont-rounded-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pre-scrollable" id="TabelDetailChattingAdmin">
                    <!-- Tabel Chatting -->
                </div>
                <div class="card-footer">
                    <form action="javascript:void(0);" id="ProsesKirimPesanAdminToPelanggan">
                        <input type="hidden" name="id_akses" id="id_akses" value="<?php echo $id_akses;?>">
                        <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_barang;?>">
                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $SessionIdAkses;?>">
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <input type="text" name="pesan" id="pesan" class="form-control">
                                <small id="NotifikasiKirimPesanAdminToPelanggan">Isi Pesan</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-block btn-primary">
                                    <i class="icofont-send-mail"></i> Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div> 
    </div> 
<?php 
        } 
    }
}
?>
