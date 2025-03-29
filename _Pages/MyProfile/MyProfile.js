$('#ModalMyProfile').on('show.bs.modal', function (e) {
    $(".btn-info").addClass("btn-outline-info");
    $(".btn-info").removeClass("btn-info");
    $("#NotifikasiPelanggan").addClass("btn-info");
    $("#NotifikasiPelanggan").removeClass("btn-outline-info");
    $('#ProfileKontent').html('Loading...123');
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/MyProfile/Notifikasi.php',
        success : function(data){
            $('#ProfileKontent').html(data);
        }
    });
    $('#NotifikasiPelanggan').click(function(){
        $(".btn-info").addClass("btn-outline-info");
        $(".btn-info").removeClass("btn-info");
        $("#NotifikasiPelanggan").addClass("btn-info");
        $("#NotifikasiPelanggan").removeClass("btn-outline-info");
        $('#ProfileKontent').html("Loading..");
        $.ajax({
            type 	: 'POST',
            url 	: '_Pages/MyProfile/Notifikasi.php',
            success : function(data){
                $('#ProfileKontent').html(data);
            }
        });
    });
    $('#EditProfile').click(function(){
        $(".btn-info").addClass("btn-outline-info");
        $(".btn-info").removeClass("btn-info");
        $("#EditProfile").addClass("btn-info");
        $("#EditProfile").removeClass("btn-outline-info");
        $('#ProfileKontent').html("Loading..");
        $.ajax({
            type 	: 'POST',
            url 	: '_Pages/MyProfile/EditProfile.php',
            success : function(data){
                $('#ProfileKontent').html(data);
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
                $('#ProsesEditProfile').submit(function(){
                    var ProsesEditProfile = $('#ProsesEditProfile').serialize();
                    $('#NotifikasiEditProfile').html("Loading..");
                    $.ajax({
                        type 	: 'POST',
                        url 	: '_Pages/MyProfile/ProsesEditProfile.php',
                        data 	:  ProsesEditProfile,
                        success : function(data){
                            $('#NotifikasiEditProfile').html(data);
                            var NotifikasiProsesEdit=$('#NotifikasiProsesEdit').html();
                            if(NotifikasiProsesEdit=="Update Profile Berhasil"){
                                document.getElementById("ProsesEditProfile").reset();
                                location.href = "_Pages/MyProfile/ProsesLogoutProfile.php"
                            }
                        }
                    });
                });
            }
        });
    });
    $('#HistoryPelanggan').click(function(){
        $(".btn-info").addClass("btn-outline-info");
        $(".btn-info").removeClass("btn-info");
        $("#HistoryPelanggan").addClass("btn-info");
        $("#HistoryPelanggan").removeClass("btn-outline-info");
        $('#ProfileKontent').html("Loading..");
        $.ajax({
            type 	: 'POST',
            url 	: '_Pages/MyProfile/HistoryPelanggan.php',
            success : function(data){
                $('#ProfileKontent').html(data);
            }
        });
    });
});