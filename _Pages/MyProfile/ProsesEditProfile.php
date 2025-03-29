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
    //Tangkap email
    if(!empty($_POST['akses'])){
        $email=$_POST['email'];
    }else{
        $email="";
    }
    
    //Validasi username duplikat atau tidak
    if($username=="$SessionUsername"){
        $ValidasiUsernameSama="0";
    }else{
        $ValidasiUsernameSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE username='$username'"));
    }
    //Validasi email duplikat atau tidak
    if($email=="$SessionEmail"){
        $ValidasiEmailSama="0";
    }else{
        $ValidasiEmailSama=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email'"));
    }
    //Apabila ada email yang sama
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
                            //Apabila email tidak ada yang sama
                            if(empty($ValidasiEmailSama)){
                                $nama=$_POST['nama'];
                                $id_ongkir=$_POST['PilihDesa'];
                                $alamat=$_POST['alamat'];
                                $kontak=$_POST['kontak'];
                                $email=$_POST['email'];
                                //apabila syarat terpenuhi lakukan input
                                $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                    nama='$nama',
                                    email='$email',
                                    username='$username',
                                    password='$password1'
                                WHERE id_akses='$SessionIdAkses'") or die(mysqli_error($Conn)); 
                                if($UpdateAkses){
                                    $UpdatePelanggan = mysqli_query($Conn,"UPDATE pelanggan SET 
                                        id_ongkir='$id_ongkir',
                                        nama='$nama',
                                        alamat='$alamat',
                                        kontak='$kontak',
                                        email='$email'
                                    WHERE id_akses='$SessionIdAkses'") or die(mysqli_error($Conn)); 
                                    if($UpdatePelanggan){
                                        $_SESSION ["NotifikasiSwal"]="Edit Profile Berhasil";
                                        echo "<b class='text-success' id='NotifikasiProsesEdit'>Update Profile Berhasil</b>";
                                    }else{
                                        echo 'Update Pelanggan Gagal '.$maksimal.'/'.$id_ongkir.'/'.$nama.'/'.$alamat.'/'.$kontak.'/'.$email.'/';
                                    }
                                }else{
                                    echo 'Update Hak Akses Gagal';
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