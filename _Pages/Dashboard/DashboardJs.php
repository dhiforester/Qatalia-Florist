<?php
    include "_Config/Connection.php";
    $Tahun=date('Y');
?>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des",
            ],
            datasets: [{
                label: 'Penjualan (Rp)',
                data: [
                    <?php
                        for($i=1; $i<=12; $i++ ){
                            $Bulan = sprintf("%02d", $i);
                            //menghitung jumlah penjualan
                            $BulanTahun="$Tahun-$Bulan";
                            $sql = "SELECT SUM(jumlah_tagihan) FROM transaksi WHERE tanggal like '%$BulanTahun%'";
                            $query = mysqli_query($Conn, $sql);
                            $result = mysqli_fetch_row($query);
                            if(empty($result[0])){
                                $total =0;
                            }else{
                                $total = $result[0];
                            }
                            
                            echo ''.$total.',';
                        }
                    ?>
                ],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>