<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Detail Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Product Card */
        .product-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 300px;
            margin: 20px auto;
            cursor: pointer;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .product-image {
            height: 200px;
            overflow: hidden;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-info h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #1e3c72;
        }
        
        .product-info .price {
            font-size: 22px;
            font-weight: 700;
            color: #1e3c72;
            margin-bottom: 15px;
            display: block;
        }
        
        .btn-view {
            display: inline-block;
            background-color: #4fc3f7;
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-view:hover {
            background-color: #3da8d8;
        }
        
        /* Modal Styles */
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
        
        .close-modal:hover {
            color: #333;
        }
        
        /* Product Detail Styles */
        .product-detail {
            display: flex;
            gap: 30px;
        }
        
        .product-gallery {
            flex: 1;
            min-width: 300px;
        }
        
        .main-image {
            width: 100%;
            height: 400px;
            object-fit: contain;
            margin-bottom: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        
        .thumbnail-container {
            display: flex;
            gap: 10px;
        }
        
        .thumbnail {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s;
        }
        
        .thumbnail:hover, .thumbnail.active {
            border-color: #4fc3f7;
        }
        
        .product-info-detail {
            flex: 1;
        }
        
        .product-title {
            font-size: 28px;
            color: #1e3c72;
            margin-bottom: 15px;
        }
        
        .product-price {
            font-size: 28px;
            font-weight: 700;
            color: #1e3c72;
            margin-bottom: 20px;
        }
        
        .product-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
        }
        
        .meta-item i {
            color: #4fc3f7;
        }
        
        .product-description {
            margin-bottom: 25px;
            line-height: 1.7;
        }
        
        .specs-title {
            font-size: 20px;
            color: #1e3c72;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .specs-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        
        .specs-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .specs-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        .specs-table td:first-child {
            font-weight: 500;
            color: #555;
            width: 30%;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-primary {
            background-color: #4fc3f7;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary:hover {
            background-color: #3da8d8;
        }
        
        .btn-outline {
            background-color: transparent;
            color: #1e3c72;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid #1e3c72;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-outline:hover {
            background-color: #f0f5ff;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .product-detail {
                flex-direction: column;
            }
            
            .modal-content {
                width: 95%;
                margin: 10px auto;
                padding: 20px;
            }
            
            .main-image {
                height: 300px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-primary, .btn-outline {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
  <div class="container">
    <!-- Loop Produk dari DB -->
    <?php
    include 'admins/pages/koneksi.php';
    $produk = mysqli_query($conn, "SELECT * FROM produk");
    while($p = mysqli_fetch_assoc($produk)) {
    ?>
    <div class="product-card">
      <div class="product-image">
        <img src="gambar/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama']; ?>">
      </div>
      <div class="product-info">
        <h3><?php echo $p['nama']; ?></h3>
        <span class="price">Rp <?php echo number_format($p['harga'],0,",","."); ?></span>
        <button class="btn-view" onclick="openModal(<?php echo $p['id_produk']; ?>)">
          <i class="fas fa-eye"></i> Lihat Detail
        </button>
      </div>
    </div>
    <?php } ?>
  </div>

  <!-- Modal -->
  <div id="productModal" class="modal"></div>

  <script>
  function openModal(id) {
    fetch('detail_produk.php?id=' + id)
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