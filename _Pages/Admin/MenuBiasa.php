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
            <td class="list-group <?php if($_GET['Pages']=="Login"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Login" class="<?php if($_GET['Pages']=="Login"){echo "text-white";} ?>"> 
                    <i class="icofont-login"></i> Login
                </a>
            </td>
        </tr>
        <tr>
            <td class="list-group <?php if($_GET['Pages']=="Daftar"){echo "bg-info";} ?>">
                <a href="index.php?Pages=Daftar" class="<?php if($_GET['Pages']=="Daftar"){echo "text-white";} ?>"> 
                    <i class="icofont-edit"></i> Daftar
                </a>
            </td>
        </tr>
    </tbody>
</table>