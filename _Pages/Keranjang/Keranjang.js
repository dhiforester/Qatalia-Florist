//Menampilkan Tabel Utama Chatting Admin
$('#RincianKeranjang').html("Loading...");
$.ajax({
    type 	: 'POST',
    url 	: '_Pages/Keranjang/RincianKeranjang.php',
    success : function(data){
        $('#RincianKeranjang').html(data);
    }
});
//Ketika Dibuka Modal Detail keranjang
$('#ModalDetailRincian').on('show.bs.modal', function (e) {
    var id_rincian = $(e.relatedTarget).data('id');
    $('#DetailKeranjang').html("Loading...");
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Keranjang/DetailKeranjang.php',
        data 	    :  {id_rincian: id_rincian},
        success     : function(data){
            $('#DetailKeranjang').html(data);
            //Ketika disimpan edit rincian keranjang
            $('#ProsesEditRincianKeranjang').submit(function(){
                $('#NotifikasiEditRincian').html('Loading..');
                var form = $('#ProsesEditRincianKeranjang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Keranjang/ProsesEditRincianKeranjang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditRincian').html(data);
                        var NotifikasiEditRincianBerhasil=$('#NotifikasiEditRincianBerhasil').html();
                        if(NotifikasiEditRincianBerhasil=="Berhasil"){
                            //tutup Modal
                            $('#ModalDetailRincian').modal("toggle");
                            $('#RincianKeranjang').html("Loading...");
                            $.ajax({
                                type 	: 'POST',
                                url 	: '_Pages/Keranjang/RincianKeranjang.php',
                                success : function(data){
                                    $('#RincianKeranjang').html(data);
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: 'Edit Rincian Berhasil',
                                        icon: 'success',
                                        confirmButtonText: 'Tutup'
                                    });
                                }
                            });
                        }
                    }
                });
            });
            //Ketika Hapus keranjang
            $('#ClickHapusRincianKeranjang').click(function(){
                $('#NotifikasiEditRincian').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Keranjang/ProsesHapusKeranjang.php',
                    data 	    :  {id_rincian: id_rincian},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditRincian').html(data);
                        var NotifikasiHapusRincianKeranjang=$('#NotifikasiHapusRincianKeranjang').html();
                        if(NotifikasiHapusRincianKeranjang=="Berhasil"){
                            //tutup Modal
                            $('#ModalDetailRincian').modal("toggle");
                            $('#RincianKeranjang').html("Loading...");
                            $.ajax({
                                type 	: 'POST',
                                url 	: '_Pages/Keranjang/RincianKeranjang.php',
                                success : function(data){
                                    $('#RincianKeranjang').html(data);
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: 'Edit Rincian Berhasil',
                                        icon: 'success',
                                        confirmButtonText: 'Tutup'
                                    });
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Metode Hapus Keranjang
$('#ModalHapusKeranjang').on('show.bs.modal', function (e) {
    //ketika click proses hapus
    $('#KonfirmasiHapusKeranjang').click(function(){
        $('#NotifikasiHapusKeranjang').html("Loading...");
        $.ajax({
            type 	    : 'post',
            url 	    : '_Pages/Keranjang/ProsesHapusKeranjangAll.php',
            success     : function(data){
                $('#NotifikasiHapusKeranjang').html(data);
                var NotifikasiHapusKeranjangBerhasil=$('#NotifikasiHapusKeranjangBerhasil').html();
                if(NotifikasiHapusKeranjangBerhasil=="Berhasil"){
                    location.href = "index.php"
                }
            }
        });
    });
});