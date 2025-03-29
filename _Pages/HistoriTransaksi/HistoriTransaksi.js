$('#TabelHistoryTransaksi').html("Loading...");
$('#TabelHistoryTransaksi').load("_Pages/HistoriTransaksi/TabelHistoryTransaksi.php");

$('#ModalDetailHistoriTransaksi').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#DetailHistoriTransaksi').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/HistoriTransaksi/DetailHistoriTransaksi.php',
        data 	    :  {id_transaksi: id_transaksi},
        success     : function(data){
            $('#DetailHistoriTransaksi').html(data);
        }
    });
});
$('#ModalBatalkanTransaksi').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    //ketika click proses hapus
    $('#KonfirmasiHapusTransaksi').click(function(){
        $('#NotifikasiHapusTransaksi').html("Loading...");
        $.ajax({
            type 	    : 'post',
            url 	    : '_Pages/HistoriTransaksi/ProsesBatalkanTransaksi.php',
            data 	    :  {id_transaksi: id_transaksi},
            success     : function(data){
                $('#NotifikasiHapusTransaksi').html(data);
                var NotifikasiHapusTransaksiBerhasil=$('#NotifikasiHapusTransaksiBerhasil').html();
                if(NotifikasiHapusTransaksiBerhasil=="Berhasil"){
                    location.href = "index.php?Pages=HistoriTransaksi"
                }
            }
        });
    });
});
$('#ModalVerifikasiSelesai').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#KonfirmasiVerifikasiTransaksi').click(function(){
        $('#NotifikasiKonfirmasiTransaksiSelesai').html("Loading...");
        $.ajax({
            type 	    : 'post',
            url 	    : '_Pages/HistoriTransaksi/ProsesVerifikasiTransaksi.php',
            data 	    :  {id_transaksi: id_transaksi},
            success     : function(data){
                $('#NotifikasiKonfirmasiTransaksiSelesai').html(data);
                var NotifikasiKonfirmasiTransaksiSelesaiBerhasil=$('#NotifikasiKonfirmasiTransaksiSelesaiBerhasil').html();
                if(NotifikasiKonfirmasiTransaksiSelesaiBerhasil=="Berhasil"){
                    $('#FormVerifikasiSelesai').html("Loading...");
                    $.ajax({
                        type 	    : 'post',
                        url 	    : '_Pages/HistoriTransaksi/FormVerifikasiSelesai.php',
                        data 	    :  {id_transaksi: id_transaksi},
                        success     : function(data){
                            $('#FormVerifikasiSelesai').html(data);
                            $('#ProsesSimpanTestimoni').submit(function(){
                                $('#NotifikasiIsiTestimoni').html('Loading..');
                                var ProsesSimpanTestimoni = $('#ProsesSimpanTestimoni').serialize();
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Pages/HistoriTransaksi/ProsesSimpanTestimoni.php',
                                    data 	    :  ProsesSimpanTestimoni,
                                    success     : function(data){
                                        $('#NotifikasiIsiTestimoni').html(data);
                                        var NotifikasiIsiTestimoniBerhasil=$('#NotifikasiIsiTestimoniBerhasil').html();
                                        //Apabila proses login berhasil
                                        if(NotifikasiIsiTestimoniBerhasil=="Berhasil"){
                                            location.href = "index.php?Pages=HistoriTransaksi"
                                        }
                                    }
                                });
                            });
                        }
                    });
                }
            }
        });
    });
    
});

$('#ModalFormTestimoni').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormKirimTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/HistoriTransaksi/FormVerifikasiSelesai.php',
        data 	    :  {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormKirimTestimoni').html(data);
            $('#ProsesSimpanTestimoni').submit(function(){
                $('#NotifikasiIsiTestimoni').html('Loading..');
                var ProsesSimpanTestimoni = $('#ProsesSimpanTestimoni').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/HistoriTransaksi/ProsesSimpanTestimoni.php',
                    data 	    :  ProsesSimpanTestimoni,
                    success     : function(data){
                        $('#NotifikasiIsiTestimoni').html(data);
                        var NotifikasiIsiTestimoniBerhasil=$('#NotifikasiIsiTestimoniBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiIsiTestimoniBerhasil=="Berhasil"){
                            location.href = "index.php?Pages=HistoriTransaksi"
                        }
                    }
                });
            });
        }
    });
});