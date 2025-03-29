//Menampilkan Tabel Utama Chatting Admin
$('#TabelChatting').html("Loading...");
$.ajax({
    type 	: 'POST',
    url 	: '_Pages/Chatting/TabelChatting.php',
    success : function(data){
        $('#TabelChatting').html(data);
    }
});
//Buka Rincian Detail Chating
var id_akses = $('#GetIdAkses').html();
var id_barang = $('#GetIdBarang').html();
$('#TabelDetailChattingAdmin').html("Loading...");
$.ajax({
    type 	: 'POST',
    url 	: '_Pages/Chatting/TabelDetailChatting.php',
    data 	: {id_akses: id_akses, id_barang: id_barang},
    success : function(data){
        $('#TabelDetailChattingAdmin').html(data);
    }
});
//Ketika Kirim Pesan
$('#ProsesKirimPesanAdminToPelanggan').submit(function(){
    var ProsesKirimPesanAdminToPelanggan = $('#ProsesKirimPesanAdminToPelanggan').serialize();
    $('#NotifikasiKirimPesanAdminToPelanggan').html("Loading..");
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/Chatting/ProsesKirimPesanAdminToPelanggan.php',
        data 	:  ProsesKirimPesanAdminToPelanggan,
        success : function(data){
            $('#NotifikasiKirimPesanAdminToPelanggan').html(data);
            var NotifikasiKirimPesanAdminToPelangganBerhasil=$('#NotifikasiKirimPesanAdminToPelangganBerhasil').html();
            if(NotifikasiKirimPesanAdminToPelangganBerhasil=="Berhasil"){
                $('#NotifikasiKirimPesanAdminToPelanggan').html("Isi Pesan");
                $('#TabelDetailChattingAdmin').html("Loading...");
                $("#ProsesKirimPesanAdminToPelanggan")[0].reset();
                $.ajax({
                    type 	: 'POST',
                    url 	: '_Pages/Chatting/TabelDetailChatting.php',
                    data 	: {id_akses: id_akses, id_barang: id_barang},
                    success : function(data){
                        $('#TabelDetailChattingAdmin').html(data);
                    }
                });
            }
        }
    });
});
