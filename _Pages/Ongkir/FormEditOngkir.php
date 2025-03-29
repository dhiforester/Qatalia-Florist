<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_ongkir'])){
        echo '<div class="row"><div class="col-md-12 mb-3">ID Ongkir Tidak Ada</div></div>';
    }else{
        $id_ongkir=$_POST['id_ongkir'];
        //Buka data Ongkir
        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'")or die(mysqli_error($Conn));
        $DataOngkir= mysqli_fetch_array($QryOngkir);
        $id_ongkir= $DataOngkir['id_ongkir'];
        $provinsi_detail= $DataOngkir['provinsi'];
        $kabupaten_detail= $DataOngkir['kabupaten'];
        $kecamatan_detail= $DataOngkir['kecamatan'];
        $desa_detail= $DataOngkir['desa'];
        $ongkir_detail= $DataOngkir['ongkir'];
        echo '<input type="hidden" name="id_ongkir" id="id_ongkir" value="'.$id_ongkir.'">';
?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" list="ListProvinsi" value="<?php echo "$provinsi_detail";?>" required>
            <datalist id="ListProvinsi">
                <?php
                    
                    //Buka data Provinsi
                    $QryOngkir1 = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir ORDER BY provinsi ASC");
                    while ($DataOngkir1 = mysqli_fetch_array($QryOngkir1)) {
                        $provinsi= $DataOngkir1['provinsi'];
                        if(!empty($DataOngkir1['provinsi'])){
                            echo '<option value="'.$provinsi.'">';
                        }
                    }
                ?>
            </datalist>
        </div>
        <div class="col-md-6 mb-3">
            <label for="kabupaten">Kabupaten/Kota</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" list="ListKabupaten" value="<?php echo "$kabupaten_detail";?>" required>
            <datalist id="ListKabupaten">
                <?php
                    //Buka data kabupaten
                    $QryOngkir2 = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir ORDER BY kabupaten ASC");
                    while ($DataOngkir2 = mysqli_fetch_array($QryOngkir2)) {
                        $kabupaten= $DataOngkir2['kabupaten'];
                        if(!empty($DataOngkir2['kabupaten'])){
                            echo '<option value="'.$kabupaten.'">';
                        }
                    }
                ?>
            </datalist>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" list="ListKecamatan" value="<?php echo "$kecamatan_detail";?>" required>
            <datalist id="ListKecamatan">
                <?php
                    //Buka data Kecamatan
                    $QryOngkir3 = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir ORDER BY kecamatan ASC");
                    while ($DataOngkir3 = mysqli_fetch_array($QryOngkir3)) {
                        $kecamatan= $DataOngkir3['kecamatan'];
                        if(!empty($DataOngkir3['kecamatan'])){
                            echo '<option value="'.$kecamatan.'">';
                        }
                    }
                ?>
            </datalist>
        </div>
        <div class="col-md-6 mb-3">
            <label for="desa">Desa/Kelurahan</label>
            <input type="text" class="form-control" id="desa" name="desa" list="ListDesa" value="<?php echo "$desa_detail";?>" required>
            <datalist id="ListDesa">
                <?php
                    //Buka data Desa
                    $QryOngkir4 = mysqli_query($Conn, "SELECT DISTINCT desa FROM ongkir ORDER BY desa ASC");
                    while ($DataOngkir4 = mysqli_fetch_array($QryOngkir4)) {
                        $desa= $DataOngkir4['desa'];
                        if(!empty($DataOngkir4['desa'])){
                            echo '<option value="'.$desa.'">';
                        }
                    }
                ?>
            </datalist>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="ongkir">Onkir (Rp)</label>
            <input type="text" class="form-control" id="ongkir" name="ongkir" value="<?php echo "$ongkir_detail";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div id="NotifikasiEditOngkir">
                <span class="text-primary">Pastikan data ongkir yang anda update sudah benar</span>
            </div>
        </div>
    </div>
<?php } ?>