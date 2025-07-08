<?php
include 'koneksi.php';
?>   
  <style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; }
    a.btn { background: #4fc3f7; color: #fff; padding: 5px 10px; text-decoration: none; }
  </style>
<body>
  <h1>Daftar Nilai</h1>
  <a href="index.php?page=tambahNilai" class="btn">+ Tambah Nilai</a>
  <table>
    <tr>
      <th>NO</th>
      <th>Produk</th>
      <th>Spesifikasi</th>
      <th>Acksi</th>
    </tr>
    <?php
    $produk = mysqli_query($conn, "SELECT * FROM nilai_spesifikasi");
    $noUrut=0;
    while ($p = mysqli_fetch_assoc($produk)) {
      $noUrut++;
      $nproduk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk where id='".$p['produk']."'"))['nama'];
      $jspek = explode(",", mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori where id='".mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk where id='".$p['produk']."'"))['kategori']."'"))['spesifikasi']);
      $nspek = explode(",", $p['nilai']);
    ?>
    <tr>
      <td><?= $noUrut ?></td>
      <td><?= $nproduk ?></td>
      <td>
      <?php
      for($i=0;$i<count($jspek);$i++){
        echo $jspek[$i].": ".$nspek[$i]."<br/>";
      }
      ?>
      </td>
      <td>
        <a href="index.php?page=editNilai&id=<?= $p['id'] ?>" class="btn">Edit</a>
        <a href="index.php?page=hapusNilai&id=<?= $p['id'] ?>" class="btn" onclick="return confirm('Hapus Spesifikasi untuk produk ini?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  
</body>
</html>
