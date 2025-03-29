<table class="table table-bordered table-hover border-1">
    <tbody>
        <tr>
            <td class="list-group <?php if(empty($_GET['Pages'])){echo "bg-info";} ?>">
                <a href="index.php" class="<?php if(empty($_GET['Pages'])){echo "text-white";} ?>">
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
            <td class="list-group <?php if($_GET['Pages']=="Laporan"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Laporan" class="<?php if($_GET['Pages']=="Laporan"){echo "text-white";} ?>">
                    <i class="icofont-search-document"></i> Laporan
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