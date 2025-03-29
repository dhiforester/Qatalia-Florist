$('#ProsesAjaxLogin').submit(function(){
    $('#NotifikasiFormLogin').html("Loading..");
    var DataLogin = $('#ProsesAjaxLogin').serialize();
    $.ajax({
        type 	: 'POST',
        url 	: '_Pages/Login/ProsesLogin.php',
        data 	:  DataLogin,
        success : function(data){
            $('#NotifikasiFormLogin').html(data);
            //menangkap notifikasi
            var NotifikasiLoginBerhasil=$('#NotifikasiLoginBerhasil').html();
            if(NotifikasiLoginBerhasil=="Login Berhasil"){
                document.getElementById("ProsesAjaxLogin").reset();
                location.href = "index.php?Notif=LoginBerhasil"
            }else{
                document.getElementById("ProsesAjaxLogin").reset();
            }
        }
    });
});