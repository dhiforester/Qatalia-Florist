$('#TampilkanTabelProduk').load("_Pages/Produk/TabelProduk.php");
$('#ListProduk').load("_Pages/Produk/ListProduk.php");

$('#AllDataProduct').click(function(){
    $('#ListProduk').html('Loading....');
    var kategori ="";
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/ListProduk.php',
        data 	    :  {kategori: kategori},
        success     : function(data){
            $('#ListProduk').html(data);
        }
    });
});
$('#ShortByHarga').click(function(){
    $('#ListProduk').html('Loading....');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/ListProdukShortByHarga.php',
        success     : function(data){
            $('#ListProduk').html(data);
        }
    });
});
$('#ShortByReting').click(function(){
    $('#ListProduk').html('Loading....');
    var kategori ="Standing Flowers";
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/ListProdukShortByReting.php',
        success     : function(data){
            $('#ListProduk').html(data);
        }
    });
});
$('#BoardDataProduct').click(function(){
    $('#ListProduk').html('Loading....');
    var kategori ="Board Flowers";
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/ListProduk.php',
        data 	    :  {kategori: kategori},
        success     : function(data){
            $('#ListProduk').html(data);
        }
    });
});
$('#StandingDataProduct').click(function(){
    $('#ListProduk').html('Loading....');
    var kategori ="Table Flowers";
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/ListProduk.php',
        data 	    :  {kategori: kategori},
        success     : function(data){
            $('#ListProduk').html(data);
        }
    });
});
$('#KeywordProduk').keyup(function(){
    var keyword = $('#KeywordProduk').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/TabelProduk.php',
        data 	    :  {keyword: keyword},
        success     : function(data){
            $('#TampilkanTabelProduk').html(data);
        }
    });
});

$('#ModalTambahProduk').on('show.bs.modal', function (e) {
    $('#FormTambahProduk').html('<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/FormTambahProduk.php',
        success     : function(data){
            $('#FormTambahProduk').html(data);
            $('#ProsesTambahProduk').submit(function(){
                e.preventDefault();
                $('#NotifikasiTambahProduk').html('Loading..');
                var form = $('#ProsesTambahProduk')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Produk/ProsesTambahProduk.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahProduk').html(data);
                        var NotifikasiTambahProdukBerhasil=$('#NotifikasiTambahProdukBerhasil').html();
                        if(NotifikasiTambahProdukBerhasil=="Tambah Produk Berhasil"){
                            $('#TampilkanTabelProduk').load("_Pages/Produk/TabelProduk.php");
                            $('#ModalTambahProduk').modal('hide');
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Tambah Produk Berhasil',
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
$('#ModalEditProduk').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormEditProduk').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Produk/FormEditProduk.php',
        data 	    :  {id_barang: id_barang},
        success     : function(data){
            $('#FormEditProduk').html(data);
            $('#ProsesEditProduk').submit(function(){
                e.preventDefault();
                var form = $('#ProsesEditProduk')[0];
                var data = new FormData(form);
                $('#NotifikasiEditProduk').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Produk/ProsesEditProduk.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditProduk').html(data);
                        var NotifikasiEditProdukBerhasil=$('#NotifikasiEditProdukBerhasil').html();
                        //Apabila proses berhasil
                        if(NotifikasiEditProdukBerhasil=="Update Berhasil"){
                            $('#TampilkanTabelProduk').load('_Pages/Produk/TabelProduk.php');
                            $('#ModalEditProduk').modal('hide');
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Update Produk Berhasil',
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

$('#ModalDeleteProduk').on('show.bs.modal', function (e) {
    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
    var id_produk = $(e.relatedTarget).data('id');
    $('#DeleteProduk').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Produk/DeleteProduk.php',
        data 	    :  {id_produk: id_produk},
        success     : function(data){
            $('#DeleteProduk').html(data);
            //Konfirmasi Hapus
            $('#KonfirmasiHapusProduk').click(function(){
                $('#NotifikasiHapusProduk').html('Loading..');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Produk/ProsesHapusProduk.php',
                    data 	    :  {id_produk: id_produk},
                    success     : function(data){
                        $('#NotifikasiHapusProduk').html(data);
                        var NotifikasiHapusProdukBerhasil=$('#NotifikasiHapusProdukBerhasil').html();
                        //Apabila proses login berhasil
                        if(NotifikasiHapusProdukBerhasil=="Hapus Berhasil"){
                            $('#TampilkanTabelProduk').load('_Pages/Produk/TabelProduk.php');
                            //Tutup modal
                            $('#ModalDeleteProduk').modal("toggle");
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Hapus Data Produk Berhasil',
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
$('#ModalDetailBarang').on('show.bs.modal', function (e) {
    var Loading='<div class="modal-body"><div class="row"><div class="col col-md-12">Loading..</div></div></div>';
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormDetailProduk').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Produk/FormDetailProduk.php',
        data 	    :  {id_barang: id_barang},
        success     : function(data){
            $('#FormDetailProduk').html(data);
        }
    });
});
$('#ModalAddToCart').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormAddToCart').html('<div class="row"><div class="col col-md-12">Loading..</div></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Produk/FormAddToCart.php',
        data 	    :  {id_barang: id_barang},
        success     : function(data){
            $('#FormAddToCart').html(data);
            $('#ProsesAddToCart').submit(function(){
                e.preventDefault();
                $('#NotifikasiAddToCart').html('Loading..');
                var form = $('#ProsesAddToCart')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Pages/Produk/ProsesAddToCart.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiAddToCart').html(data);
                        var NotifikasiAddToCartBerhasil=$('#NotifikasiAddToCartBerhasil').html();
                        if(NotifikasiAddToCartBerhasil=="Berhasil"){
                            $('#ModalAddToCart').modal("hide");
                            $('#ModalAddToCartBerhasil').modal("show");
                        }
                    }
                });
            });
        }
    });
});
