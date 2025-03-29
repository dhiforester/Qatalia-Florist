<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //tangkap GET id_testimoni
    if(empty($_POST['id_testimoni'])){
        echo '<span class="text-danger">ID Testimoni Tidak Boleh</span>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        $Qry = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_testimoni='$id_testimoni'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $id_testimoni= $Data['id_testimoni'];
        $id_transaksi= $Data['id_transaksi'];
        $id_akses= $Data['id_akses'];
        $testimoni= $Data['testimoni'];
        $saran_kritik= $Data['saran_kritik'];
        //Hapus Testimoni
        $HapusTestimoni= mysqli_query($Conn, "DELETE FROM testimoni WHERE id_testimoni='$id_testimoni'") or die(mysqli_error($Conn));
        if($HapusTestimoni){
            $HapusRetting= mysqli_query($Conn, "DELETE FROM reting WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
            if($HapusRetting){
                $_SESSION ["NotifikasiSwal"]="Hapus Testimoni Berhasil";
                echo '<span class="text-success" id="NotifikasiHapusTestimoniBerhasil">Berhasil</span>';
            }else{
                echo '<span class="text-danger">Gagal Menghapus Reting</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Testimoni Gagal!!</span>';
        }
    }
?>