<div class="about-box-main">
    <div class="container">
        <form action="javascript:void(0);" method="POST" id="ProsesDaftar">
            <div class="card">
                <div class="card-header text-white bg-grey">
                    <b><h2><i class="icofont-keyboard"></i> Form Pendaftaran</h2></b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="emailaddress@domain.com" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <label>Provinsi</label>
                            <select name="Provinsi" id="PilihProvinsi" class="form-control" required>
                                <option>-Provinsi-</option>
                                <?php
                                    include "_Config/Connection.php";
                                    $QryProvinsi = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir ORDER BY provinsi ASC");
                                    while ($DataProvinsi = mysqli_fetch_array($QryProvinsi)) {
                                        $id_ongkir= $DataProvinsi['id_ongkir'];
                                        $provinsi= $DataProvinsi['provinsi'];
                                        echo '<option value="'.$provinsi.'">'.$provinsi.'</option>';
                                    }
                                ?>
                            </select> 
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>Kabupaten</label>
                            <div class="input-group">
                                <select name="Kabupaten" id="PilihKabupaten" class="form-control" required>
                                    <option>-Pilih Kabupaten-</option>
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>Kecamatan</label>
                            <div class="input-group">
                                <select name="Kecamatan" id="PilihKecamatan" class="form-control" required>
                                    <option>-Pilih Kecamatan-</option>
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>Desa/Kelurahan</label>
                            <div class="input-group">
                                <select name="PilihDesa" id="PilihDesa" class="form-control" required>
                                    <option>-Pilih Desa/Kel-</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label>Alamat Lengkap</label>
                            <div class="input-group">
                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="exampleInputEmailCard1">No.HP</label>
                            <div class="input-group">
                                <input type="text" min="0" class="form-control" id="kontak" name="kontak" placeholder="62" required>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label>Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <small>Minimal 6-20 Karakter</small>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password1" name="password1" required>
                            </div>
                            <small>Minimal 6-20 Karakter</small>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label for="exampleInputEmailCard1">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>  
                            <small>Minimal 6-20 Karakter</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="NotifikasiDaftar">
                            Pastikan informasi pendaftaran yang anda gunakan sudah benar.
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-md btn-primary">
                        <i class="fas fa-save"></i> Simpan Pendaftaran
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>