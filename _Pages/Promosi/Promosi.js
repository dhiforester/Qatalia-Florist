$('#TampilkanTabelPromosi').load("_Pages/Promosi/TabelPromosi.php");
$('#ModalTambahPromosi').on('show.bs.modal', function (e) {
    $('#FormTambahPromosi').html('<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Promosi/FormTambahPromosi.php',
        success     : function(data){
            $('#FormTambahPromosi').html(data);
            $('#ProsesTambahPromosi').submit(function(){
                e.preventDefault();
                $('#NotifikasiTambahPromosi').html('Loading..');
                var form = $('#ProsesTambahPromosi')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Promosi/ProsesTambahPromosi.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahPromosi').html(data);
                        var NotifikasiTambahPromosiBerhasil=$('#NotifikasiTambahPromosiBerhasil').html();
                        if(NotifikasiTambahPromosiBerhasil=="Tambah Promosi Berhasil"){
                            $('#TampilkanTabelPromosi').load("_Pages/Promosi/TabelPromosi.php");
                            $('#ModalTambahPromosi').modal('hide');
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Tambah Promosi Berhasil',
                                icon: 'success',
                                confirmButtonText: 'Tutup'
                            });
                        }
                    }
                });
            });
        }
    });
});
$('#ModalEditPromosi').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_diskon = $(e.relatedTarget).data('id');
    $('#FormEditPromosi').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Promosi/FormEditPromosi.php',
        data 	    :  {id_diskon: id_diskon},
        success     : function(data){
            $('#FormEditPromosi').html(data);
            $('#ProsesEditPromosi').submit(function(){
                e.preventDefault();
                var form = $('#ProsesEditPromosi')[0];
                var data = new FormData(form);
                $('#NotifikasiEditPromosi').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Promosi/ProsesEditPromosi.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPromosi').html(data);
                        var NotifikasiEditPromosiBerhasil=$('#NotifikasiEditPromosiBerhasil').html();
                        //Apabila proses berhasil
                        if(NotifikasiEditPromosiBerhasil=="Update Berhasil"){
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Update Promosi Berhasil',
                                icon: 'success',
                                confirmButtonText: 'Tutup'
                            });
                            $('#ModalEditPromosi').modal('toggle');
                            // $('#ModalEditPromosiBerhasi').modal('show');
                            $('#TampilkanTabelPromosi').load('_Pages/Promosi/TabelPromosi.php');
                        }
                    }
                });
            });
        }
    });
});

$('#ModalDeletePromosi').on('show.bs.modal', function (e) {
    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
    var id_diskon = $(e.relatedTarget).data('id');
    $('#DeletePromosi').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Promosi/DeletePromosi.php',
        data 	    :  {id_diskon: id_diskon},
        success     : function(data){
            $('#DeletePromosi').html(data);
            //Konfirmasi Hapus
            $('#KonfirmasiHapusPromosi').click(function(){
                $('#NotifikasiHapusPromosi').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Promosi/ProsesHapusPromosi.php',
                    data 	    :  {id_diskon: id_diskon},
                    success     : function(data){
                        $('#NotifikasiHapusPromosi').html(data);
                        var NotifikasiHapusPromosiBerhasil=$('#NotifikasiHapusPromosiBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiHapusPromosiBerhasil=="Hapus Berhasil"){
                            $('#TampilkanTabelPromosi').load('_Pages/Promosi/TabelPromosi.php');
                            //Tutup modal
                            $('#ModalDeletePromosi').modal("toggle");
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Hapus Data Promosi Berhasil',
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
