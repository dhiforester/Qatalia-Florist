$('#TampilkanTabelAkses').load("_Pages/Akses/TabelAkses.php");
$('#KeywordAkses').keyup(function(){
    var keyword = $('#KeywordAkses').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Akses/TabelAkses.php',
        data 	    :  {keyword: keyword},
        success     : function(data){
            $('#TampilkanTabelAkses').html(data);
        }
    });
});

$('#ModalTambahAkses').on('show.bs.modal', function (e) {
    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
    $('#FormTambahAkses').html(Loading);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Akses/FormTambahAkses.php',
        success     : function(data){
            $('#FormTambahAkses').html(data);
            $('#ProsesTambahAkses').submit(function(){
                $('#NotifikasiTambahAkses').html('Loading..');
                var ProsesTambahAkses = $('#ProsesTambahAkses').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Akses/ProsesTambahAkses.php',
                    data 	    :  ProsesTambahAkses,
                    success     : function(data){
                        $('#NotifikasiTambahAkses').html(data);
                        var Notifikasi=$('#Notifikasi').html();
                        if(Notifikasi=="Tambah Akses Berhasil"){
                            $('#TampilkanTabelAkses').load("_Pages/Akses/TabelAkses.php");
                            //Tutup modal
                            $('#ModalTambahAkses').modal("toggle");
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Simpan Data Akses Berhasil',
                                icon: 'success',
                                confirmButtonText: 'Tutup'
                            })
                        }
                    }
                });
            });
        }
    });
});
$('#ModalEditAkses').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormEditAkses').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Akses/FormEditAkses.php',
        data 	    :  {id_akses: id_akses},
        success     : function(data){
            $('#FormEditAkses').html(data);
            $('#ProsesEditAkses').submit(function(){
                $('#NotifikasiEditAkses').html('Loading..');
                var ProsesEditAkses = $('#ProsesEditAkses').serialize();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Akses/ProsesEditAkses.php',
                    data 	    :  ProsesEditAkses,
                    success     : function(data){
                        $('#NotifikasiEditAkses').html(data);
                        var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiEditAksesBerhasil=="Berhasil"){
                            $('#TampilkanTabelAkses').load('_Pages/Akses/TabelAkses.php');
                            //Tutup modal
                            $('#ModalEditAkses').modal("toggle");
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Simpan Data Akses Berhasil',
                                icon: 'success',
                                confirmButtonText: 'Tutup'
                            })
                        }
                    }
                });
            });
        }
    });
});

$('#ModalDeleteAkses').on('show.bs.modal', function (e) {
    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
    var id_akses = $(e.relatedTarget).data('id');
    $('#DeleteAkses').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Akses/DeleteAkses.php',
        data 	    :  {id_akses: id_akses},
        success     : function(data){
            $('#DeleteAkses').html(data);
            //Ketika Di Klik KonfirmasiHapusAkses
            $('#KonfirmasiHapusAkses').click(function(){
                $('#NotifikasiHapusAkses').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Akses/ProsesDeleteAkses.php',
                    data 	    :  {id_akses: id_akses},
                    success     : function(data){
                        $('#NotifikasiHapusAkses').html(data);
                        var NotifikasiHapusAksesBerhasil=$('#NotifikasiHapusAksesBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiHapusAksesBerhasil=="Berhasil"){
                            $('#TampilkanTabelAkses').load('_Pages/Akses/TabelAkses.php');
                            //Tutup modal
                            $('#ModalDeleteAkses').modal("toggle");
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Hapus Data Akses Berhasil',
                                icon: 'success',
                                confirmButtonText: 'Tutup'
                            })
                        }
                    }
                });
            });
        }
    });
});
