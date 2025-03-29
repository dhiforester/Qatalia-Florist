<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
?>
<form action="javascript:void(0);" method="POST" id="ProsesEditProfile">
    <div class="card">
        <div class="card-header text-white bg-grey">
            <b><h2>Edit Profile</h2></b>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $NamaProfilePelanggan;?>" required>
                </div>
                <div class="col-md-6">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="emailaddress@domain.com" value="<?php echo $SessionEmail;?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Alamat Lengkap</label>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    <select name="Provinsi" id="PilihProvinsi" class="form-control" required>
                        <option>-Provinsi-</option>
                        <?php
                            $QryProvinsi = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir ORDER BY provinsi ASC");
                            while ($DataProvinsi = mysqli_fetch_array($QryProvinsi)) {
                                $id_ongkir= $DataProvinsi['id_ongkir'];
                                $provinsi= $DataProvinsi['provinsi'];
                                if($ProvinsiProfilePelanggan==$provinsi){
                                    echo '<option value="'.$provinsi.'" selected>'.$provinsi.'</option>';
                                }else{
                                    echo '<option value="'.$provinsi.'">'.$provinsi.'</option>';
                                }
                                
                            }
                        ?>
                    </select> 
                    <small>Provinsi</small>
                </div>
                <div class="col col-md-3">
                    <div class="input-group">
                        <select name="Kabupaten" id="PilihKabupaten" class="form-control" required>
                            <option>-Pilih Kabupaten-</option>
                            <?php
                                $QryKabupaten = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$ProvinsiProfilePelanggan' ORDER BY kabupaten ASC");
                                while ($DataKabupaten = mysqli_fetch_array($QryKabupaten)) {
                                    $id_ongkir= $DataKabupaten['id_ongkir'];
                                    $kabupaten= $DataKabupaten['kabupaten'];
                                    if(!empty($kabupaten)){
                                        if($KabupatenProfilePelanggan==$kabupaten){
                                            echo '<option value="'.$kabupaten.'" selected>'.$kabupaten.'</option>';
                                        }else{
                                            echo '<option value="'.$kabupaten.'">'.$kabupaten.'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>  
                    <small>Kabupaten</small>
                </div>
                <div class="col col-md-3">
                    <div class="input-group">
                        <select name="Kecamatan" id="PilihKecamatan" class="form-control" required>
                            <option>-Pilih Kecamatan-</option>
                            <?php
                                $QryKecamatan = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$KabupatenProfilePelanggan' ORDER BY kecamatan ASC");
                                while ($DataKecamatan = mysqli_fetch_array($QryKecamatan)) {
                                    $id_ongkir= $DataKecamatan['id_ongkir'];
                                    $kecamatan= $DataKecamatan['kecamatan'];
                                    if(!empty($kecamatan)){
                                        if($KecamatanProfilePelanggan==$kecamatan){
                                            echo '<option value="'.$kecamatan.'" selected>'.$kecamatan.'</option>';
                                        }else{
                                            echo '<option value="'.$kecamatan.'">'.$kecamatan.'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>  
                    <small>Kecamatan</small>
                </div>
                <div class="col col-md-3">
                    <div class="input-group">
                        <select name="PilihDesa" id="PilihDesa" class="form-control" required>
                            <option>-Pilih Desa/Kel-</option>
                            <?php
                                $QryDesa = mysqli_query($Conn, "SELECT DISTINCT desa, id_ongkir FROM ongkir WHERE kecamatan='$KecamatanProfilePelanggan' ORDER BY desa ASC");
                                while ($DataDesa = mysqli_fetch_array($QryDesa)) {
                                    $id_ongkir_desa= $DataDesa['id_ongkir'];
                                    $desa= $DataDesa['desa'];
                                    if(!empty($desa)){
                                        if($DesaProfilePelanggan==$desa){
                                            echo '<option value="'.$id_ongkir_desa.'" selected>'.$desa.'</option>';
                                        }else{
                                            echo '<option value="'.$id_ongkir_desa.'">'.$desa.'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>  
                    <small>Desa/Kelurahan</small>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col col-md-3">
                    <label>RT/RW</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $AlamatProfilePelanggan;?>" required>
                    </div>
                </div>
                <div class="col col-md-3">
                    <label for="exampleInputEmailCard1">No.HP</label>
                    <div class="input-group">
                        <input type="number" min="0" class="form-control" id="kontak" name="kontak" value="<?php echo $KontakProfilePelanggan;?>" required>
                    </div>  
                </div>
                <div class="col col-md-6">
                    <label>Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $SessionUsername;?>" required>
                    </div>
                    <small>Minimal 6-20 Karakter</small>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col col-md-6">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password1" name="password1" value="<?php echo $SessionPassword;?>" required>
                    </div>
                    <small>Minimal 6-20 Karakter</small>
                </div>
                <div class="col col-md-6">
                    <label for="exampleInputEmailCard1">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password2" name="password2" value="<?php echo $SessionPassword;?>" required>
                    </div>  
                    <small>Minimal 6-20 Karakter</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="NotifikasiEditProfile">
                    Setelah Perubahan Pada Data Profile Disimpan, Sistem Secara Otomatis Akan Melakukan Logout
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-md btn-outline-primary">
                <i class="fas fa-save"></i> Simpan Pendaftaran
            </button>
            <button type="reset" class="btn btn-md btn-outline-warning">
                <i class="fas fa-refresh"></i> Reset
            </button>
        </div>
    </div>
</form>