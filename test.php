<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
        }
    </style>
</head>
<body>
<?php
include "./admins/pages/koneksi.php";
$q1 = mysqli_query($conn, "SELECT * FROM `pengunjung` ORDER BY `id` DESC");
$bulan = array();
$user = array();
$nowlan = "";
$nowser = 0;
while ($data = mysqli_fetch_array($q1)) {
    if($nowlan!==$data['bulan'] && count($bulan)>=12){$user[] = $nowser;break;}
    if($nowlan!==$data['bulan']){
        $bulan[]="'".$data['bulan']."'";
        if(count($bulan)>1)$user[] = $nowser;
        $nowser=0;
    }
    $nowlan = $data['bulan'];
    $nowser++;
}
?>
  <script>
    // Data untuk chart
    const salesData = {
        labels: [<?=implode(", ",array_reverse($bulan))?>],
        datasets: [{
            label: 'Dikunjungi',
            data: [<?=implode(", ",array_reverse($user))?>],
            backgroundColor: 'rgba(30, 60, 114, 0.7)',
            borderColor: 'rgba(30, 60, 114, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true
        }]
    };

    console.log(salesData.labels);
    console.log(salesData.datasets[0].data);

</script>  
</body>
</html>