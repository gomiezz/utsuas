<?php
include_once("pages/koneksi.php");
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
<header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="?logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>
		
		<h1>Selamat Datang <?=$_SESSION['admin']?></h1>

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
<script src="../js/chart.js"></script>

