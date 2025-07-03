<?php include 'koneksi.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    mysqli_query($conn, "INSERT INTO kategori (nama)
    VALUES ('$nama')");

    // TIDAK PAKAI HEADER, pakai SCRIPT
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href='index.php?page=adminlist';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<body>
    <h1>Tambah Kategori</h1>
    <form method="post" enctype="multipart/form-data">
        <p>Nama: <input type="text" name="nama" required></p>
        
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
