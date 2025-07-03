<?php include 'admins/pages/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Produk</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* TARUH STYLE MODAL di SINI supaya KELOAD */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.6);
      opacity: 0;
      transition: opacity 0.3s;
    }
    .modal.show {
      display: block;
      opacity: 1;
    }
    .modal-content {
      background-color: white;
      margin: 5% auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
      width: 80%;
      max-width: 900px;
      max-height: 80vh;
      overflow-y: auto;
      transform: translateY(-50px);
      transition: transform 0.3s;
      position: relative;
    }
    .modal.show .modal-content {
      transform: translateY(0);
    }
    .close-modal {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 28px;
      font-weight: bold;
      color: #aaa;
      cursor: pointer;
      transition: color 0.3s;
    }
    .close-modal:hover { color: #333; }

    /* TAMBAHKAN style produk CARD-MU DI SINI ATAU LINK CSS LAIN */
    .product-card { background: #fff; box-shadow: 0 0 5px #ccc; border-radius: 5px; overflow: hidden; margin: 10px; width: 250px; float: left; }
    .product-image img { width: 100%; height: 200px; object-fit: cover; }
    .product-info { padding: 15px; }
    .product-info h3 { margin: 0 0 10px; }
    .product-info .price { font-weight: bold; margin-bottom: 10px; display: block; }
    .btn-view { background: #4fc3f7; color: #fff; border: none; padding: 8px 15px; cursor: pointer; border-radius: 20px; }
    .btn-view:hover { background: #3da8d8; }

    .products { display: flex; flex-wrap: wrap; gap: 20px; }
  </style>
</head>
<body>

<div class="products">
<?php
$sql = "SELECT * FROM produk";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
?>
  <div class="product-card">
    <div class="product-image">
      <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>">
    </div>
    <div class="product-info">
      <h3><?php echo $row['nama']; ?></h3>
      <span class="price">Rp <?php echo number_format($row['harga']); ?></span>
      <button class="btn-view" onclick="openModal(<?php echo $row['id']; ?>)">
  <i class="fas fa-eye"></i> Lihat Detail
</button>
    </div>
  </div>
<?php } ?>
</div>

<!-- MODAL -->
<div id="productModal" class="modal"></div>

<script>
function openModal(id) {
  fetch('?page=detail_produk&id=' + id) // <-- Ganti ke router!
    .then(res => res.text())
    .then(html => {
      document.getElementById('productModal').innerHTML = html;
      document.getElementById('productModal').classList.add('show');
    });
}
function closeModal() {
  document.getElementById('productModal').classList.remove('show');
}
function changeImage(el) {
  const mainImage = document.getElementById('mainImage');
  mainImage.src = el.src;

  document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
}
</script>

</body>
</html>
