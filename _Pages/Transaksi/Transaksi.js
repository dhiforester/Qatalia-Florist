$('#TampilkanTabelTransaksi').load("_Pages/Transaksi/TabelTransaksi.php");
$('#KeywordTransaksi').keyup(function(){
    var keyword = $('#KeywordTransaksi').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Transaksi/TabelTransaksi.php',
        data 	    :  {keyword: keyword},
        success     : function(data){
            $('#TampilkanTabelTransaksi').html(data);
        }
    });
});

$('#ModalDetailTransaksi').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_Transaksi = $(e.relatedTarget).data('id');
    $('#DetailTransaksi').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Transaksi/DetailTransaksi.php',
        data 	    :  {id_Transaksi: id_Transaksi},
        success     : function(data){
            $('#DetailTransaksi').html(data);
            $('#ModalDeleteTransaksi').on('show.bs.modal', function (e) {
                $('#KonfirmasiHapusTransaksiAdmin').click(function(){
                    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
                    $('#NotifikasiHapusTransaksiAdmin').html(Loading);
                    $.ajax({
                        type 	    : 'post',
                        url 	    : '_Pages/Transaksi/ProsesDeleteTransaksi.php',
                        data 	    :  {id_Transaksi: id_Transaksi},
                        success     : function(data){
                            $('#NotifikasiHapusTransaksiAdmin').html(data);
                            var NotifikasiHapusTransaksiAdminBerhasil=$('#NotifikasiHapusTransaksiAdminBerhasil').html();
                            if(NotifikasiHapusTransaksiAdminBerhasil=="Berhasil"){
                                location.href = "index.php?Pages=Admin&SubPage=Transaksi"
                            }
                        }
                    });
                });
            });
            $('#ModalValidasiTransaksi').on('show.bs.modal', function (e) {
                $('#FormValidasiTransaksiAdmin').html("Loading...");
                $.ajax({
                    type 	    : 'post',
                    url 	    : '_Pages/Transaksi/FormValidasiTransaksi.php',
                    data 	    :  {id_Transaksi: id_Transaksi},
                    success     : function(data){
                        $('#FormValidasiTransaksiAdmin').html(data);
                    }
                });
            });
            $('#ProsesValidasiTransaksi').submit(function(){
                $('#NotifikasiValidasiTransaksi').html('Loading..');
                var ProsesValidasiTransaksi = $('#ProsesValidasiTransaksi').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Transaksi/ProsesValidasiTransaksi.php',
                    data 	    :  ProsesValidasiTransaksi,
                    success     : function(data){
                        $('#NotifikasiValidasiTransaksi').html(data);
                        var NotifikasiValidasiTransaksiBerhasil=$('#NotifikasiValidasiTransaksiBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiValidasiTransaksiBerhasil=="Berhasil"){
                            location.href = "index.php?Pages=Admin&SubPage=Transaksi"
                        }
                    }
                });
            });
        }
    });
});
$('#ModalEditTransaksi').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_Transaksi = $(e.relatedTarget).data('id');
    $('#FormEditTransaksi').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Transaksi/FormEditTransaksi.php',
        data 	    :  {id_Transaksi: id_Transaksi},
        success     : function(data){
            $('#FormEditTransaksi').html(data);
            $('#ProsesEditTransaksi').submit(function(){
                $('#TombolEditTransaksi').html('Loading..');
                var ProsesEditTransaksi = $('#ProsesEditTransaksi').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Transaksi/ProsesEditTransaksi.php',
                    data 	    :  ProsesEditTransaksi,
                    success     : function(data){
                        $('#TombolEditTransaksi').html(data);
                        var Notifikasi=$('#Notifikasi').html();
                        //Apabila proses login berhasil
                        if(Notifikasi=="Berhasil"){
                            $('#FormEditTransaksi').load('_Pages/Transaksi/NotifikasiUpdateTransaksiBerhasil.php');
                            $('#TampilkanTabelTransaksi').load('_Pages/Transaksi/TabelTransaksi.php');
                        }
                        if(Notifikasi=="Error1"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Username yang anda gunakan sudah terdaftar.</b>');
                        }
                        if(Notifikasi=="Error2"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Username harus memiliki 6-20 karakter.</b>');
                        }
                        if(Notifikasi=="Error3"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Username harus memiliki 6-20 karakter.</b>');
                        }
                        if(Notifikasi=="Error4"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Password harus memiliki 6-20 karakter.</b>');
                        }
                        if(Notifikasi=="Error5"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Password harus memiliki 6-20 karakter.</b>');
                        }
                        if(Notifikasi=="Error6"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Edit Transaksi Gagal.</b>');
                        }
                        if(Notifikasi=="Error7"){
                            $('#TombolEditTransaksi').html('<i class="fa fa-pencil"></i> Update');
                            $('#NotifikasiEditTransaksi').html('<b class="text-danger">Email Sudah Ada.</b>');
                        }
                    }
                });
            });
        }
    });
});



