<?php
include 'admins/pages/koneksi.php';
$id = $_GET['id'];
$p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id=$id"));
?>

<link rel="stylesheet" href="css/detail_produk.css">

<div class="modal-content">
  <span class="close-modal" onclick="closeModal()">&times;</span>
  <div class="product-detail">
    <div class="product-gallery">
      <img id="mainImage" src="<?= $p['gambar'] ?>" alt="<?= $p['nama'] ?>" class="main-image">
      <div class="thumbnail-container">
        <?php if ($p['thumbnail1']) { ?>
          <img src="gambar/<?= $p['thumbnail1'] ?>" class="thumbnail active" onclick="changeImage(this)">
        <?php } ?>
        <?php if ($p['thumbnail2']) { ?>
          <img src="gambar/<?= $p['thumbnail2'] ?>" class="thumbnail" onclick="changeImage(this)">
        <?php } ?>
        <?php if ($p['thumbnail3']) { ?>
          <img src="gambar/<?= $p['thumbnail3'] ?>" class="thumbnail" onclick="changeImage(this)">
        <?php } ?>
        <?php if ($p['thumbnail4']) { ?>
          <img src="gambar/<?= $p['thumbnail4'] ?>" class="thumbnail" onclick="changeImage(this)">
        <?php } ?>
      </div>
    </div>
    <div class="product-info-detail">
      <h1 class="product-title"><?= $p['nama'] ?></h1>
      <div class="product-price">Rp <?= number_format($p['harga'],0,",",".") ?></div>
      <div class="product-meta">
        <div class="meta-item"><i class="fas fa-star"></i> <?= $p['rating'] ?> Rating</div>
        <div class="meta-item"><i class="fas fa-check-circle"></i> Stok <?= $p['stok'] ?></div>
      </div>
      <p class="product-description"><?= nl2br($p['deskripsi']) ?></p>
      <h3 class="specs-title">Spesifikasi Teknis</h3>
      <div class="specs-table"><?php
      $spek = mysqli_query($conn, "SELECT * FROM kategori WHERE id = ".$p['kategori']);
      $nilai_spek = mysqli_query($conn, "SELECT * FROM nilai_spesifikasi WHERE produk = ".$p['id']);
      $_spek = explode(",", mysqli_fetch_assoc($spek)['spesifikasi']);
      $_nilai_spek = explode(",", mysqli_fetch_assoc($nilai_spek)['nilai']);
      for ($i = 0; $i < count($_spek); $i++) {
            echo $_spek[$i].": ". $_nilai_spek[$i] . "<br>";
        }
      ?></div>
      <div class="action-buttons"> 
        <a href="https://wa.me/6285955230855?text=Halo, saya tertarik dengan <?= urlencode($p['nama']) ?>" class="btn-primary">
          <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
        </a>
        <button class="btn-outline" onclick="rmCart('<?= $id ?>')">
          <i class="fas fa-shopping-cart"></i> Hapus dari Wishlist
        </button>
      </div>
    </div>
  </div>
</div>
<script>
  
</script>