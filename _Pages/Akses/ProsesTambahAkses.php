<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel username
    if(!empty($_POST['username'])){
        $username=$_POST['username'];
        $JmlhKarUsername = strlen($username);
    }else{
        $username="";
        $JmlhKarUsername ="0";
    }
    //Tangkap password
    if(!empty($_POST['password1'])){
        $password1=$_POST['password1'];
        $JmlhKarPassword = strlen($password1);
    }else{
        $password1="";
        $JmlhKarPassword ="0";
    }
    //Tangkap password2
    if(!empty($_POST['password2'])){
        $password2=$_POST['password2'];
    }else{
        $password2="";
    }
    //Tangkap akses
    if(!empty($_POST['akses'])){
        $akses=$_POST['akses'];
    }else{
        $akses="";
    }
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    //Validasi masing-masing data
    $ValidasiUsernameSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE username='$username'"));
    $ValidasiEmailSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email'"));
    //Apabila Username sudah terdaftar
    if(!empty($ValidasiUsernameSama)){
        echo 'Username sudah digunakan';
    }else{
        //apabila username kurang dari 6 digit
        if($JmlhKarUsername<6){
            echo 'Username Harus 6-20 karakter';
        }else{
            if($JmlhKarUsername>20){
                echo 'Username Harus 6-20 karakter';
            }else{
                if($JmlhKarPassword<6){
                    echo 'Password Harus 6-20 karakter';
                }else{
                    if($JmlhKarPassword>20){
                        echo 'Password Harus 6-20 karakter';
                    }else{
                        if($password1==$password2){
                            if(empty($ValidasiEmailSama)){
                                //apabila syarat terpenuhi lakukan input
                                $entry="INSERT INTO akses (
                                    nama,
                                    email,
                                    username,
                                    password,
                                    akses
                                ) VALUES (
                                    '$nama',
                                    '$email',
                                    '$username',
                                    '$password1',
                                    '$akses'
                                )";
                                $InputAkses=mysqli_query($Conn, $entry);
                                if($InputAkses){
                                    echo '<i id="Notifikasi">Tambah Akses Berhasil</i>';
                                }else{
                                    echo 'Input Pendaftaran Hak Akses Gagal';
                                }
                            }else{
                                echo 'Email Sudah Digunakan';
                            }
                        }else{
                            echo 'Password Tidak Sama';
                        }
                    }
                }
            }
        }
    }

    
?>