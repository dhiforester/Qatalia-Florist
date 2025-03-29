$('#TampilkanTabelOngkir').load("_Pages/Ongkir/TabelOngkir.php");
$('#ModalTambahOngkir').on('show.bs.modal', function (e) {
    $('#FormTambahOngkir').html('<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Ongkir/FormTambahOngkir.php',
        success     : function(data){
            $('#FormTambahOngkir').html(data);
            $('#ProsesTambahOngkir').submit(function(){
                e.preventDefault();
                $('#NotifikasiTambahOngkir').html('Loading..');
                var form = $('#ProsesTambahOngkir')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Ongkir/ProsesTambahOngkir.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahOngkir').html(data);
                        var NotifikasiTambahOngkirBerhasil=$('#NotifikasiTambahOngkirBerhasil').html();
                        if(NotifikasiTambahOngkirBerhasil=="Tambah Ongkir Berhasil"){
                            $('#TampilkanTabelOngkir').load("_Pages/Ongkir/TabelOngkir.php");
                            $('#ModalTambahOngkir').modal('hide');
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Tambah Ongkir Berhasil',
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
$('#ModalEditOngkir').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_ongkir = $(e.relatedTarget).data('id');
    $('#FormEditOngkir').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Ongkir/FormEditOngkir.php',
        data 	    :  {id_ongkir: id_ongkir},
        success     : function(data){
            $('#FormEditOngkir').html(data);
            $('#ProsesEditOngkir').submit(function(){
                e.preventDefault();
                var form = $('#ProsesEditOngkir')[0];
                var data = new FormData(form);
                $('#NotifikasiEditOngkir').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Ongkir/ProsesEditOngkir.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditOngkir').html(data);
                        var NotifikasiEditOngkirBerhasil=$('#NotifikasiEditOngkirBerhasil').html();
                        //Apabila proses berhasil
                        if(NotifikasiEditOngkirBerhasil=="Update Berhasil"){
                            $('#TampilkanTabelOngkir').load('_Pages/Ongkir/TabelOngkir.php');
                            $('#ModalEditOngkir').modal('hide');
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Update Ongkir Berhasil',
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

$('#ModalDeleteOngkir').on('show.bs.modal', function (e) {
    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
    var id_ongkir = $(e.relatedTarget).data('id');
    $('#DeleteOngkir').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Ongkir/DeleteOngkir.php',
        data 	    :  {id_ongkir: id_ongkir},
        success     : function(data){
            $('#DeleteOngkir').html(data);
            //Konfirmasi Hapus
            $('#KonfirmasiHapusOngkir').click(function(){
                $('#NotifikasiHapusOngkir').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Ongkir/ProsesHapusOngkir.php',
                    data 	    :  {id_ongkir: id_ongkir},
                    success     : function(data){
                        $('#NotifikasiHapusOngkir').html(data);
                        var NotifikasiHapusOngkirBerhasil=$('#NotifikasiHapusOngkirBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiHapusOngkirBerhasil=="Hapus Berhasil"){
                            $('#TampilkanTabelOngkir').load('_Pages/Ongkir/TabelOngkir.php');
                            //Tutup modal
                            $('#ModalDeleteOngkir').modal("toggle");
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Hapus Data Ongkir Berhasil',
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
