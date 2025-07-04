<?php
include 'koneksi.php';
 
$id = $_GET['id'];

// Ambil data produk lama
$q = mysqli_query($conn, "SELECT * FROM Kategori WHERE id='$id'");
$p = mysqli_fetch_assoc($q);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $spesifikasi = $_POST['spesifikasi'];
    
    // === Update ke DB ===
    mysqli_query($conn, "UPDATE kategori SET 
        nama='$nama', spesifikasi='$spesifikasi'
        WHERE id='$id'
    ");

    echo "<script>alert('kategori berhasil diupdate!'); window.location.href='index.php?page=kategori';</script>";
    exit;
}
?>

<h1>Edit Kategori</h1>
<form method="post" enctype="multipart/form-data">
    <p>Nama: <input type="text" name="nama" value="<?= $p['nama'] ?>" required></p>
    <p>Spesifikasi: <input type="text" name="spesifikasi" value="<?= $p['spesifikasi'] ?>" required></p>
    <p>*gunakan koma (,) untuk multi spesifikasi, contoh: "Usia, Umur, Ukuran, Panjang, Tinggi"</p>
    <button type="submit" name="update">Update</button>
</form>
