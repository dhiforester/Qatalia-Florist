//Menampilkan rincian Chatting Pelanggan berdasarkan id_barang
var GetIdBarang = $('#GetIdBarang').html();
$('#RincianIsiPesanPelanggan').html("Loading...");
$.ajax({
    type 	: 'POST',
    url 	: '_Pages/ChattingPelanggan/RincianIsiPesanPelanggan.php',
    data 	: {GetIdBarang: GetIdBarang},
    success : function(data){
        $('#RincianIsiPesanPelanggan').html(data);
    }
});
//Ketika Kirim Pesan
$('#ProsesKirimPesanPelangganToAdmin').submit(function(){
    var ProsesKirimPesanPelangganToAdmin = $('#ProsesKirimPesanPelangganToAdmin').serialize();
    $('#NotifikasiKirimPesanPelangganToAdmin').html("Loading..");
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/ChattingPelanggan/ProsesKirimPesanPelangganToAdmin.php',
        data 	:  ProsesKirimPesanPelangganToAdmin,
        success : function(data){
            $('#NotifikasiKirimPesanPelangganToAdmin').html(data);
            var NotifikasiKirimPesanPelangganToAdminBerhasil=$('#NotifikasiKirimPesanPelangganToAdminBerhasil').html();
            if(NotifikasiKirimPesanPelangganToAdminBerhasil=="Berhasil"){
                $('#NotifikasiKirimPesanPelangganToAdmin').html("Isi Pesan");
                $('#RincianIsiPesanPelanggan').html("Loading...");
                $("#ProsesKirimPesanPelangganToAdmin")[0].reset();
                $.ajax({
                    type 	: 'POST',
                    url 	: '_Pages/ChattingPelanggan/RincianIsiPesanPelanggan.php',
                    data 	: {GetIdBarang: GetIdBarang},
                    success : function(data){
                        $('#RincianIsiPesanPelanggan').html(data);
                    }
                });
            }
        }
    });
});
