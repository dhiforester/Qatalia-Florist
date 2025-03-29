<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_akses'])){
            echo '<span class="text-danger">ID Akses Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['id_admin'])){
                echo '<span class="text-danger">ID Admin Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['pesan'])){
                    echo '<span class="text-danger">Isi Pesan Tidak Boleh Kosong!</span>';
                }else{
                    //Membangun Variabel
                    $id_barang=$_POST['id_barang'];
                    $id_akses=$_POST['id_akses'];
                    $id_admin=$_POST['id_admin'];
                    $pesan=$_POST['pesan'];
                    $tanggal=date('Y-m-d H:i');
                    $kategori="Admin To Pelanggan";
                    $status="Terkirim";
                    $id_transaksi="";
                    //Simpan Data ke database
                    $EntryChating="INSERT INTO chat (
                        id_akses,
                        id_admin,
                        id_barang,
                        id_transaksi,
                        tanggal,
                        pesan,
                        kategori,
                        status
                    ) VALUES (
                        '$id_akses',
                        '$id_admin',
                        '$id_barang',
                        '$id_transaksi',
                        '$tanggal',
                        '$pesan',
                        '$kategori',
                        '$status'
                    )";
                    $InputChatting=mysqli_query($Conn, $EntryChating);
                    if($InputChatting){
                        echo '<span class="text-success" id="NotifikasiKirimPesanAdminToPelangganBerhasil">Berhasil</span>';
                    }else{
                        echo '<span class="text-danger">Simpan Data Chatting Gagal!</span>';
                    }
                }
            }
        }
    }
?>