$('#PilihProvinsi').change(function(){
    $('#PilihDesa').html("");
    $('#PilihKecamatan').html("");
    $('#PilihKabupaten').html("Loading..");
    var Provinsi = $('#PilihProvinsi').val();
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/Daftar/PilihKabupaten.php',
        data 	:  'Provinsi='+ Provinsi,
        success : function(data){
            $('#PilihKabupaten').html(data);
        }
    });
});
$('#PilihKabupaten').change(function(){
    $('#PilihDesa').html("");
    $('#PilihKecamatan').html("Loading..");
    var PilihKabupaten = $('#PilihKabupaten').val();
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/Daftar/PilihKecamatan.php',
        data 	:  'PilihKabupaten='+ PilihKabupaten,
        success : function(data){
            $('#PilihKecamatan').html(data);
        }
    });
});
$('#PilihKecamatan').change(function(){
    $('#PilihDesa').html("Loading..");
    var PilihKecamatan = $('#PilihKecamatan').val();
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/Daftar/PilihDesa.php',
        data 	:  'PilihKecamatan='+ PilihKecamatan,
        success : function(data){
            $('#PilihDesa').html(data);
        }
    });
});
$('#ProsesDaftar').submit(function(){
    var ProsesDaftar = $('#ProsesDaftar').serialize();
    $('#NotifikasiDaftar').html("Loading..");
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/Daftar/ProsesPendaftaran.php',
        data 	:  ProsesDaftar,
        success : function(data){
            $('#NotifikasiDaftar').html(data);
            var NotifikasiProsesPendaftaran=$('#NotifikasiProsesPendaftaran').html();
            if(NotifikasiProsesPendaftaran=="Pendaftaran Pelanggan Berhasil"){
                document.getElementById("ProsesDaftar").reset();
                location.href = "index.php?Pages=Login&Notif=DaftarBerhasil"
            }
        }
    });
});