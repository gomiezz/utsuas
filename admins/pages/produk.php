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
  <a href="index.php?page=tambahProduk" class="btn">+ Tambah Produk</a>
  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th>Spesifikasi</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Aksi</th>
    </tr>
    <?php
    $produk = mysqli_query($conn, "SELECT * FROM produk");
    while ($p = mysqli_fetch_assoc($produk)) {
      $kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id = ".$p['kategori']);
      $spek = mysqli_query($conn, "SELECT * FROM spesifikasi WHERE id = ".$p['kategori']);
      $nilai_spek = mysqli_query($conn, "SELECT * FROM nilai_spesifikasi WHERE produk = ".$p['id']);
      $_spek = explode(",", mysqli_fetch_assoc($spek)['nama']);
      $_nilai_spek = explode(",", mysqli_fetch_assoc($nilai_spek)['nilai']);
    ?>
    <tr>
      <td><?= $p['id'] ?></td>
      <td><?= $p['nama'] ?></td>
      <td><?= mysqli_fetch_assoc($kategori)['nama'] ?></td>
      <td><?= $p['deskripsi'] ?></td>
      <td><img src=".././<?= $p['gambar'] ?>" alt=""></td>
      <td>
        <?php
        for ($i = 0; $i < count($_spek); $i++) {
            echo $_spek[$i].": ". $_nilai_spek[$i] . "<br>";
        }
        ?>
      </td>
      <td>Rp <?= number_format($p['harga'],0,",",".") ?></td>
      <td><?= $p['stok'] ?></td>
      <td>
        <a href="index.php?page=editProduk&id=<?= $p['id'] ?>" class="btn">Edit</a>
        <a href="index.php?page=hapusProduk&id=<?= $p['id'] ?>" class="btn" onclick="return confirm('Hapus produk?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  
</body>
</html>
