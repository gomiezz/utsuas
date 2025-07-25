<?php
session_start();
include './pages/koneksi.php';
if(isset($_GET['logout'])){
    session_destroy();
    session_start();
}
if(isset($_POST['register'])){
    $cek = mysqli_query($conn, "SELECT * FROM `admin` WHERE `email`='".$_POST['email']."'");
    if(mysqli_num_rows($cek)>0){
        echo "<script>window.alert('Email sudah digunakan');</script>";
    }else{
        mysqli_query($conn, "INSERT INTO `admin` (`nama`,`email`,`pass`) VALUES ('".$_POST['nama']."','".$_POST['email']."','".sha1($_POST['pass'],false)."')");
        echo "<script>window.alert('Silahkan login dahulu');</script>";
    }
}else if(isset($_POST['login'])){
    $cek = mysqli_query($conn, "SELECT * FROM `admin` WHERE `email`='".$_POST['email']."' AND `pass` = '".sha1($_POST['pass'],false)."'");
    if(mysqli_num_rows($cek)>0){
        $name = mysqli_fetch_assoc($cek)['nama'];
        $_SESSION['admin']= $name;
        echo "<script>window.alert('Selamat datang ".$name."');</script>";
    }else{
        echo "<script>window.alert('Password atau email salah');</script>";
    }
}

if(isset($_SESSION['admin'])){
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - STMIK Mercusuar</title>
    <meta name="description" content="admin STMIK Mercusuar">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/chart.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
    <?php include"pages/menu.html"?></div>
    </aside>
	<!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
	<?php include"pages/paging.php"?></div>
        <!-- /header -->
        <!-- Header-->
       <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</body>

</html>
<?php
}else if(isset($_GET['register'])){
    include "pages/page-register.php";
}else if(isset($_GET['login'])){
    include "pages/page-login.php";
}else{
    include "pages/page-login.php";
}
?>