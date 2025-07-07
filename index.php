
<?php
session_start();
include("./admins/pages/koneksi.php");
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = rand(0,572025);
}
// mysqli_query($conn, "INSERT INTO `pengunjung` (`user`,`bulan`) VALUES ('".$_SESSION['user']."','".date("F Y")."')");

?>
<!DOCTYPE php, name : index.php>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Toko Komponen Komputer Terlengkap</title>
</head>
<body>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="header">
 <?php include"page/header.html"?></div>

<div id="navbar">
  <!-- Marquee Text -->
  <div class="marquee">
        <div class="marquee-content">
            <?php
            $data = explode("|=|",mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM website_profile WHERE judul='rt'"))['nilai']);
            for($i=-1;$i<count($data)-1;$i++){
                $i++
            ?>
            <span><span class="highlight"><?= $data[$i] ?></span> <?= $data[$i+1] ?></span>
            <?php } ?>
        </div>
    </div>
 <?php include"page/paging.php"?></div>
 <?php include"page/chat.html"?></div>

 <!-- <?php include"page/.html"?> -->
<div class="footer">
<?php include"page/footer.php"?></div>
<script src="js/script.js"></script>
</body>
</html>
.