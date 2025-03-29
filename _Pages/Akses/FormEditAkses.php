<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(!empty($_POST['id_akses'])){
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama = $DataDetailAkses['nama'];
        $email= $DataDetailAkses['email'];
        $Username = $DataDetailAkses['username'];
        $Password= $DataDetailAkses['password'];
        $Akses= $DataDetailAkses['akses'];
?>
    <input type="hidden" name="id_akses" id="id_akses" value="<?php echo $id_akses;?>">
    <input type="hidden" name="email_lama" id="email_lama" value="<?php echo $email;?>">
    <input type="hidden" name="username_lama" id="username_lama" value="<?php echo $Username;?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div>
                <label for="first_name">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo "$nama"; ?>" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div>
                <label for="last_name">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo "$email"; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div>
                <label for="first_name">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo "$Username"; ?>" required>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div>
                <label for="first_name">Password</label>
                <input type="password" class="form-control" id="Password" name="Password" value="<?php echo "$Password"; ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-6">
            <div>
                <label for="last_name">Akses</label>
                <select name="akses" id="akses" class="form-control">
                    <option value="Admin" <?php if($Akses=="Admin"){echo "selected";} ?> >Admin</option>
                    <option value="Pelanggan" <?php if($Akses=="Pelanggan"){echo "selected";} ?> >Pelanggan</option>
                    <option value="Pemilik" <?php if($Akses=="Pemilik"){echo "selected";} ?> >Pemilik</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div id="NotifikasiEditAkses">
                <span class="text-primary">Pastikan data yang anda gunakan sudah benar!</span>
            </div>
        </div>
    </div>
<?php
    }else{
        $id_akses="";
        echo '<div class="row">';
        echo '  <div class="col-md-12 align-center">';
        echo '      <h2>Maaf Tidak Ada Data Akses Yang Dipilih</h2>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="row">';
        echo '  <div class="col-md-12 align-center">';
        echo '      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>';
        echo '  </div>';
        echo '</div>';
    }
?>