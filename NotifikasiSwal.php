<?php
    if(!empty($_SESSION['NotifikasiSwal'])){
        $NotifikasiSwal=$_SESSION['NotifikasiSwal'];
?>
    <!------- Notifikasi ------------>
    <?php if($NotifikasiSwal=="Login Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Login Berhasil',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php }if($NotifikasiSwal=="Pendaftaran Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Pendaftaran Berhasil',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php }if($NotifikasiSwal=="Edit Profile Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Edit Profile Berhasil',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php }if($NotifikasiSwal=="Batalkan Transaksi Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Transaksi Berhasil Dibatalkan',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php }if($NotifikasiSwal=="Hapus Keranjang Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Hapus Keranjang Berhasil',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php }if($NotifikasiSwal=="Simpan Testimoni Berhasil Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Simpan Testimoni Berhasil Berhasil',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php }if($NotifikasiSwal=="Hapus Testimoni Berhasil"){ ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Hapus Testimoni Berhasil',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php } ?>
<?php 
unset($_SESSION['NotifikasiSwal']);
    }
?>