
<table class="table table-bordered table-hover border-1">
    <tbody>
        <tr>
            <td class="list-group <?php if(empty($_GET['SubPage'])&&empty($_GET['Pages'])){echo "bg-info";} ?>">
                <a href="index.php" class="<?php if(empty($_GET['SubPage'])&&empty($_GET['Pages'])){echo "text-white";} ?>">
                    <i class="icofont-home"></i> Beranda
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['Pages']=="Profile"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Profile" class="<?php if($_GET['Pages']=="Profile"){echo "text-white";} ?>">
                    <i class="icofont-search-user"></i> Profile
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['Pages']=="Keranjang"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Keranjang" class="<?php if($_GET['Pages']=="Keranjang"){echo "text-white";} ?>">
                    <i class="icofont-cart"></i> Keranjang
                    <?php
                        if(!empty($JumlahKeranjangBaru)){
                            echo '<span class="badge badge-danger">'.$JumlahKeranjangBaru.'</span>';
                        }
                    ?>
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['Pages']=="HistoriTransaksi"){echo "bg-info";} ?>">
                <a href="index.php?Pages=HistoriTransaksi" class="<?php if($_GET['Pages']=="HistoriTransaksi"){echo "text-white";} ?>">
                    <i class="icofont-history"></i> Histori Transaksi
                    <?php
                        if(!empty($JumlahNotifikasiTransaksi)){
                            echo '<span class="badge badge-danger">'.$JumlahNotifikasiTransaksi.'</span>';
                        }
                    ?>
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['Pages']=="ChattingPelanggan"){echo "bg-info";} ?>">
                <a href="index.php?Pages=ChattingPelanggan" class="<?php if($_GET['Pages']=="ChattingPelanggan"){echo "text-white";} ?>">
                    <i class="icofont-comment"></i> Chatting 
                    <?php
                        if(!empty($JumlahInboxBaru)){
                            echo '<span class="badge badge-danger">'.$JumlahInboxBaru.'</span>';
                        }
                    ?>
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#ModalLogout" > 
                    <i class="icofont-logout"></i> Logout
                </a>
            </td>
        </tr>
    </tbody>
</table>