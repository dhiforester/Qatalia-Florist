<?php
    //Tangkap Notifikasi
    if(!empty($_GET['Notif'])){
        $Notif=$_GET['Notif'];
    }else{
        $Notif="";
    }
?>
<div class="about-box-main">
    <div class="container">
        <form action="javascript:void(0);" method="POST" id="ProsesAjaxLogin">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-white bg-grey">
                            <b><h2><i class="icofont-key"></i> Form Login</h2></b>
                            <?php
                                if($Notif=="DaftarBerhasil"){
                                    echo '<b class="text-info">Pendaftaran Berhasil, Silahkan Lakukan login</b>';
                                }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4 mt-4">
                                <div class="col-md-4">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4 mt-4">
                                <div class="col-md-4">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="NotifikasiFormLogin">
                                    Apabila Anda Belum Punya Akun Silahkan Lakukan Pendaftaran!
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6 mt-3 mb-3">
                                    <button type="submit" class="btn btn-md btn-primary btn-block">
                                        <i class="icofont-login"></i> Login
                                    </button>
                                </div>
                                <div class="col-md-6 mt-3 mb-3">
                                    <a href="index.php?Pages=Daftar" class="btn btn-md btn-dark btn-block">
                                        <i class="icofont-edit"></i> Daftar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>
</div>