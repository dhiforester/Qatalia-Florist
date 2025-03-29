<div class="about-box-main">
    <div class="container">
        <?php
            if(empty($SessionAkses)){
                include "ErrorAkses.php";
            }else{
        ?>
            <div class="row">
                <div class="col col-md-8">
                    <h1 class="h4"><i class="icofont-user-alt-5"></i> Profile</h1>
                </div>
                <div class="col col-md-4 text-right">
                    <?php if($SessionAkses=="Pelanggan"){ ?>
                        <button class="btn btn-md btn-outline-dark" data-toggle="modal" data-target="#ModalEditProfile" title="Edit Profile">
                            <i class="icofont-edit"></i>
                        </button>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td valign="top"><b>Nama</b></td>
                                    <td valign="top"><b>:</b></td>
                                    <td valign="top"><?php echo "$NamaProfilePelanggan"; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b>Alamat</b></td>
                                    <td valign="top"><b>:</b></td>
                                    <td valign="top">
                                        <?php 
                                            echo "$AlamatProfilePelanggan, Ds/Kel.$DesaProfilePelanggan Kec.$KecamatanProfilePelanggan Kab.$KabupatenProfilePelanggan Prov.$ProvinsiProfilePelanggan "; 
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"><b>Kontak</b></td>
                                    <td valign="top"><b>:</b></td>
                                    <td valign="top"><?php echo "$KontakProfilePelanggan"; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b>Email</b></td>
                                    <td valign="top"><b>:</b></td>
                                    <td valign="top"><?php echo "$SessionEmail"; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b>Username</b></td>
                                    <td valign="top"><b>:</b></td>
                                    <td valign="top"><?php echo "$SessionUsername"; ?></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b>Akses</b></td>
                                    <td valign="top"><b>:</b></td>
                                    <td valign="top"><?php echo "$SessionAkses"; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h2 class="card-title text-light">History Transaksi</h2>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

