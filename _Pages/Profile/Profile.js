$('#ModalEditProfile').on('show.bs.modal', function (e) {
    var Loading='<div class="row"><div class="col col-md-12">Loading..</div></div>';
    $('#FormEditProfile').html(Loading);
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Profile/FormEditProfile.php',
        success     : function(data){
            $('#FormEditProfile').html(data);
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
                            location.href = "index.php?Pages=Profile"
                        }
                    }
                });
            });
        }
    });
});