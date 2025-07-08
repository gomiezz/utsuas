<?php
include 'koneksi.php';
?> 
  <style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; }
    a.btn { background: #4fc3f7; color: #fff; padding: 5px 10px; text-decoration: none; }
  </style>
<body>
  <h1>Daftar Produk</h1>
  <a href="index.php?page=tambahKategori" class="btn">+ Tambah Kategori</a>
  <table>
    <tr>
      <th>NO</th>
      <th>Nama</th>
      <th>Spesifikasi</th>
      <th>Aksi</th>
    </tr>
    <?php
    $noUrut =0;
    $produk = mysqli_query($conn, "SELECT * FROM kategori");
    while ($p = mysqli_fetch_assoc($produk)) {
      $noUrut++;
    ?>
    <tr>
      <td><?= $noUrut ?></td>
      <td><?= $p['nama'] ?></td>
      <td><?= $p['spesifikasi'] ?></td>
      <td>
        <a href="index.php?page=editKategori&id=<?= $p['id'] ?>" class="btn">Edit</a>
        <a href="index.php?page=hapusKategori&id=<?= $p['id'] ?>" class="btn" onclick="return confirm('Hapus kategori?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  
</body>
</html>
