<?php
    //Config Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['PilihDesa'])){
        echo 'Rp 0';
    }else{
        $id_ongkir=$_POST['PilihDesa'];
        //CARI ONGKIR
        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'")or die(mysqli_error($Conn));
        $dataOngkir = mysqli_fetch_array($QryOngkir);
        $ongkir= $dataOngkir['ongkir'];
        $ongkir = "Rp " . number_format($ongkir,0,',','.');
        echo "$ongkir";
    }
?>