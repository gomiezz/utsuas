<?php include 'koneksi.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $spesifikasi = $_POST['spesifikasi'];
 
    mysqli_query($conn, "INSERT INTO kategori (nama,spesifikasi)
    VALUES ('$nama','$spesifikasi')");

    // TIDAK PAKAI HEADER, pakai SCRIPT
    echo "<script>alert('kategori berhasil ditambahkan!'); window.location.href='index.php?page=kategori';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<body>
    <h1>Tambah Kategori</h1>
    <form method="post" enctype="multipart/form-data">
        <p>Nama: <input type="text" name="nama" required></p>
        <p>spesifikasi: <input type="text" name="spesifikasi" required></p>
        <p>*gunakan koma (,) untuk multi spesifikasi, contoh: "Usia, Umur, Ukuran, Panjang, Tinggi"</p>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
