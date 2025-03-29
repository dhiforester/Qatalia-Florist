<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel id_akses
    if(!empty($_POST['id_akses'])){
        $id_akses=$_POST['id_akses'];
    }else{
        $id_akses="";
    }
    //Tangkap variabel nama
    if(!empty($_POST['nama'])){
        $nama=$_POST['nama'];
    }else{
        $nama="";
    }
    //Tangkap variabel email
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }else{
        $email="";
    }
    //Tangkap variabel username
    if(!empty($_POST['username'])){
        $username=$_POST['username'];
        $JmlhKarUsername = strlen($username);
    }else{
        $username="";
        $JmlhKarUsername ="0";
    }
    //Tangkap variabel UsernameLama
    if(!empty($_POST['username_lama'])){
        $UsernameLama=$_POST['username_lama'];
    }else{
        $UsernameLama="";
    }
    //Tangkap variabel email_lama
    if(!empty($_POST['email_lama'])){
        $EmailLama=$_POST['email_lama'];
    }else{
        $EmailLama="";
    }
    //Tangkap password
    if(!empty($_POST['Password'])){
        $password=$_POST['Password'];
        $JmlhKarPassword = strlen($password);
    }else{
        $password="";
        $JmlhKarPassword ="0";
    }
    //Tangkap akses
    if(!empty($_POST['akses'])){
        $akses=$_POST['akses'];
    }else{
        $akses="";
    }
    //Validasi masing-masing data
    //Validasi apakah username sudah ada atau belum
    if($username==$UsernameLama){
        $ValidasiUsernameSama="0";
    }else{
        $ValidasiUsernameSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE username='$username'"));
    }
    //Validasi apakah email sudah ada atau belum
    if($email==$EmailLama){
        $ValidasiEmailSama="0";
    }else{
        $ValidasiEmailSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email'"));
    }
    //Apabila Username sudah terdaftar
    if(!empty($ValidasiUsernameSama)){
        echo '<span class="text-danger">Username Sudah Ada</span>';
    }else{
        //apabila username kurang dari 6 digit
        if($JmlhKarUsername<6){
            echo '<span class="text-danger">Username Tidak Boleh Kurang Dari 6 Karakter</span>';
        }else{
            if($JmlhKarUsername>20){
                echo '<span class="text-danger">Username Tidak Boleh lebih Dari 20 Karakter</span>';
            }else{
                if($JmlhKarPassword<6){
                    echo '<span class="text-danger">Password Tidak Boleh kurang Dari 6 Karakter</span>';
                }else{
                    if($JmlhKarPassword>20){
                        echo '<span class="text-danger">Password Tidak Boleh Lebih Dari 20 Karakter</span>';
                    }else{
                        if(empty($ValidasiEmailSama)){
                            //apabila syarat terpenuhi lakukan input
                            $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                nama='$nama',
                                email='$email',
                                username='$username',
                                password='$password',
                                akses='$akses'
                            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                            if($UpdateAkses){
                                echo '<span class="text-success" id="NotifikasiEditAksesBerhasil">Berhasil</span>';
                            }else{
                                echo '<span class="text-danger">Simpan Data Akses Gagal</span>';
                            }
                        }else{
                            echo '<span class="text-danger">Email Yang Digunakan Sudah Ada</span>';
                        }
                    }
                }
            }
        }
    }
?>