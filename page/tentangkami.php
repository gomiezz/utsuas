<!DOCTYPE html>
<?php
include_once("./admins/pages/koneksi.php");
$q1 = mysqli_query($conn, "SELECT * FROM `pengunjung` ORDER BY `id` DESC");
$q2 = mysqli_query($conn, "SELECT * FROM `website_profile` WHERE `judul` = 'tt'");
$tt = explode("|=|",mysqli_fetch_assoc($q2)['nilai']);
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
<html lang="id">
    <link rel="stylesheet" href="./css/chart.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Tentang Kami Section -->
<section id="tentang" class="section-about">
    <div class="container">
        <div class="section-title">
            <h2>Tentang Kami</h2>
        </div>
        <div class="about-content">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="Tentang Kami">
            </div>
            <div class="about-text">
                <h3><?=$tt[0]?></h3>
                <p><?=$tt[1]?></p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- Chart Container -->
    <div class="chart-container">
        <div class="chart-wrapper">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>
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

</script>
<script src="js/chart.js"></script>

</html>