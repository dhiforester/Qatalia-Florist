$('#ClickTampilkanLaporan').click(function(){
    $('#TabelLaporan').html('Loading..');
    $('#TombolCetak').html('Loading..');
    var periode_1 = $('#periode_1').val();
    var periode_2 = $('#periode_2').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Laporan/TabelLaporan.php',
        data 	    :  {periode_1: periode_1, periode_2: periode_2},
        success     : function(data){
            $('#TabelLaporan').html(data);
        }
    });
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Pages/Laporan/TombolCetak.php',
        data 	    :  {periode_1: periode_1, periode_2: periode_2},
        success     : function(data){
            $('#TombolCetak').html(data);
        }
    });
});