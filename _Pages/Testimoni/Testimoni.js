$('#TabelTestimoni').html("Loading...");
$('#TabelTestimoni').load("_Pages/Testimoni/TabelTestimoni.php");
//Metode Detail Testimoni
$('#ModalDetailTestimoni').on('show.bs.modal', function (e) {
    var id_testimoni = $(e.relatedTarget).data('id');
    $('#DetailTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'post',
        url 	    : '_Pages/Testimoni/FormDetailTestimoni.php',
        data 	    :  {id_testimoni: id_testimoni},
        success     : function(data){
            $('#DetailTestimoni').html(data);
            $('#ModalDeleteTestimoni').on('show.bs.modal', function (e) {
                $('#KonfirmasiHapusTestimoni').click(function(){
                    $('#NotifikasiHapusTestimoni').html('Loading..');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Pages/Testimoni/ProsesHapusTestimoni.php',
                        data 	    :  {id_testimoni: id_testimoni},
                        success     : function(data){
                            $('#NotifikasiHapusTestimoni').html(data);
                            var NotifikasiHapusTestimoniBerhasil=$('#NotifikasiHapusTestimoniBerhasil').html();
                            //Apabila proses login berhasil
                            if(NotifikasiHapusTestimoniBerhasil=="Berhasil"){
                                location.href = "index.php?Pages=Admin&SubPage=Testimoni"
                            }
                        }
                    });
                });
            });
        }
    });
});
