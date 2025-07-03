<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil data produk lama
$q = mysqli_query($conn, "SELECT * FROM Kategori WHERE id='$id'");
$p = mysqli_fetch_assoc($q);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    
    // === Update ke DB ===
    mysqli_query($conn, "UPDATE kategori SET 
        nama='$nama'
        WHERE id='$id'
    ");

    echo "<script>alert('Produk berhasil diupdate!'); window.location.href='index.php?page=adminlist';</script>";
    exit;
}
?>

<h1>Edit Kategori</h1>
<form method="post" enctype="multipart/form-data">
    <p>Nama: <input type="text" name="nama" value="<?= $p['nama'] ?>" required></p>
    <button type="submit" name="update">Update</button>
</form>
