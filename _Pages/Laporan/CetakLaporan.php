<?php
    include "../../_Config/Connection.php";
    $nama_dokumen= "Laporan"; //Beri nama file PDF hasil.
    define('_MPDF_PATH','../../mpdf60/');
    include(_MPDF_PATH . "mpdf.php");
    $mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
    $html='<style>@page *{margin-top: 0px;}</style>'; 
    //Beginning Buffer to save PHP variables and HTML tags
    ob_start(); 
    if(empty($_GET['periode1'])){
        echo '<span class="text-danger">Periode Awal Masih Kosong, Silahkan lengkapi!</span>';
    }else{
        if(empty($_GET['periode2'])){
            echo '<span class="text-danger">Periode Akhir Masih Kosong, Silahkan lengkapi!</span>';
        }else{
            $periode1=$_GET['periode1'];
            $periode2=$_GET['periode2'];
        }
    }
?>
<html>
    <head>
        <title>Laporan Transaksi</title>
        <style type="text/css">
            body{
                font-family: Arial, Helvetica, sans-serif;
                color: black;
            }
            .header{
                width: 100%;
                text-align: center;
            }
            .logo{
                width: 100px;
            }
            .title_halaman{
                font-size: 18px;
            }
            .bold{
                font-weight: bolder;
            }
            .italic{
                font-style: italic;
            }
            .data{
                font-family: Arial, Helvetica, sans-serif;
                color: black;
            }
            table.hasil{
                border-collapse: collapse;
            }
            table.hasil tr td{
                border: 1px solid #999;
                padding: 4px;
                
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src="../../images/logo.png" alt="">
            <h1>LAPORAN TRANSAKSI</h1>
            PERIODE <?php echo "$periode1 s/d $periode2"; ?>
        </div>
        <table class="hasil" width="100%">
            <tr>
                <td align="center">No</td>
                <td align="center">Tanggal</td>
                <td align="center">Metode</td>
                <td align="center">Pembayaran</td>
                <td align="center">Pengiriman</td>
                <td align="center">Jumlah</td>
                
            </tr>
            <?php
                //Membuka jumalh data transaksi
                $JumlahTransaksi= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2'"));
                if(empty($JumlahTransaksi)){
                    echo '<tr><td colspan="6" align="center">Belum Ada Transaksi</td></tr>';
                }else{
                    $no = 1;
                    $JumlahTotal=0;
                    //KONDISI PENGATURAN MASING FILTER
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_transaksi DESC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_transaksi= $data['id_transaksi'];
                        $id_akses= $data['id_akses'];
                        $id_ongkir= $data['id_ongkir'];
                        $tanggal= $data['tanggal'];
                        $metode_pembayaran= $data['metode_pembayaran'];
                        $jumlah_tagihan= $data['jumlah_tagihan'];
                        $no_bukti= $data['no_bukti'];
                        $file_bukti= $data['file_bukti'];
                        $alamat= $data['alamat'];
                        $status_pembayaran= $data['status_pembayaran'];
                        $status_pengiriman= $data['status_pengiriman'];
                        $JumlahTotal=$JumlahTotal+$jumlah_tagihan;
                        //Buka nama pelanggan
                        $QryPelanggan = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataPelanggn = mysqli_fetch_array($QryPelanggan);
                        $nama = $DataPelanggn['nama'];
                        $jumlah_tagihan="Rp " . number_format($jumlah_tagihan,0,',','.');
                        echo '  <tr>';
                        echo '      <td calign="center">'.$no.'</td>';
                        echo '      <td align="left">'.$tanggal.'</td>';
                        echo '      <td align="left">'.$metode_pembayaran.'</td>';
                        echo '      <td align="left">'.$status_pembayaran.'</td>';
                        echo '      <td align="left">'.$status_pengiriman.'</td>';
                        echo '      <td align="right">'.$jumlah_tagihan.'</td>';
                        echo '  </tr>';
                        $no++;
                    }
                    $JumlahTotal="Rp " . number_format($JumlahTotal,0,',','.');
                    echo '  <tr>';
                    echo '      <td calign="center"></td>';
                    echo '      <td align="left" colspan="4"><b>JUMLAH TOTAL TRANSAKSI</b></td>';
                    echo '      <td align="right"><b>'.$JumlahTotal.'</b></td>';
                    echo '  </tr>';
                }
            ?>
        </table>
    </body>
</html>
<?php
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;
?>
