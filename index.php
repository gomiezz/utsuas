
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
            <span><span class="highlight">🔥 PROMO SPESIAL! 🔥</span> Diskon 10% untuk semua produk processor Intel Core generasi terbaru</span>
            <span><span class="highlight">🛒 Gratis Ongkir!</span> Untuk pembelian di atas Rp 5.000.000 ke seluruh Indonesia</span>
            <span><span class="highlight">💻 Paket Komputer Lengkap!</span> Dapatkan paket gaming dengan harga spesial</span>
            <span><span class="highlight">📞 Hubungi Kami:</span> 0859-5523-0855 (WhatsApp)</span>
        </div>
    </div>
 <?php include"page/paging.php"?></div>
 <?php include"page/chat.html"?></div>

 <!-- <?php include"page/.html"?> -->
<div class="footer">
<?php include"page/footer.html"?></div>
<script src="js/script.js"></script>
</body>
</html>
.