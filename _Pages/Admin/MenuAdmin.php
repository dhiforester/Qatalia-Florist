<table class="table table-bordered table-hover border-1">
    <tbody>
        <tr>
            <td class="list-group <?php if(empty($_GET['SubPage'])){echo "bg-info";} ?>">
                <a href="index.php" class="<?php if(empty($_GET['SubPage'])){echo "text-white";} ?>">
                    <i class="icofont-home"></i> Beranda
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Dashboard"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Dashboard" class="<?php if($_GET['SubPage']=="Dashboard"){echo "text-white";} ?>">
                    <i class="icofont-dashboard"></i> Dashboard
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Akses"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Akses" class="<?php if($_GET['SubPage']=="Akses"){echo "text-white";} ?>">
                    <i class="icofont-ui-user"></i> Akses
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Produk"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Produk" class="<?php if($_GET['SubPage']=="Produk"){echo "text-white";} ?>">
                    <i class="icofont-flora-flower"></i> Produk
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Transaksi"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Transaksi" class="<?php if($_GET['SubPage']=="Transaksi"){echo "text-white";} ?>">
                    <i class="icofont-cart-alt"></i> Transaksi
                    <?php
                        if(!empty($JumlahTransaksiBaru)){
                            echo '<span class="badge badge-danger">'.$JumlahTransaksiBaru.'</span>';
                        }
                    ?>
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Ongkir"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Ongkir" class="<?php if($_GET['SubPage']=="Ongkir"){echo "text-white";} ?>">
                    <i class="icofont-truck-loaded"></i> Ongkir
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Promosi"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Promosi" class="<?php if($_GET['SubPage']=="Promosi"){echo "text-white";} ?>">
                    <i class="icofont-sale-discount"></i> Promosi
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['SubPage']=="Chatting"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Chatting" class="<?php if($_GET['SubPage']=="Chatting"){echo "text-white";} ?>">
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
            <td class="list-group <?php if($_GET['SubPage']=="Testimoni"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Admin&SubPage=Testimoni" class="<?php if($_GET['SubPage']=="Testimoni"){echo "text-white";} ?>"> 
                    <i class="icofont-ui-chat"></i> Testimoni
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