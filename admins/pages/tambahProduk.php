<?php include 'koneksi.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $rating = $_POST['rating'];

    $gambar = "gambar/".$_FILES['gambar']['name'];
    $th1 = $_FILES['thumbnail1']['name'];
    $th2 = $_FILES['thumbnail2']['name'];
    $th3 = $_FILES['thumbnail3']['name'];
    $th4 = $_FILES['thumbnail4']['name'];

    $upload_path = "gambar";
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    move_uploaded_file($_FILES['gambar']['tmp_name'], "$upload_path/$gambar");
    move_uploaded_file($_FILES['thumbnail1']['tmp_name'], "$upload_path/$th1");
    move_uploaded_file($_FILES['thumbnail2']['tmp_name'], "$upload_path/$th2");
    move_uploaded_file($_FILES['thumbnail3']['tmp_name'], "$upload_path/$th3");
    move_uploaded_file($_FILES['thumbnail4']['tmp_name'], "$upload_path/$th4");

    mysqli_query($conn, "INSERT INTO produk (nama, harga, deskripsi, kategori, gambar, thumbnail1, thumbnail2, thumbnail3, thumbnail4, stok, rating)
    VALUES ('$nama', '$harga', '$deskripsi', '$kategori', '$gambar', '$th1', '$th2', '$th3', '$th4', '$stok', '$rating')");

    // TIDAK PAKAI HEADER, pakai SCRIPT
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href='index.php?page=adminlist';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<body>
    <h1>Tambah Produk</h1>
    <form method="post" enctype="multipart/form-data">
        <p>Nama: <input type="text" name="nama" required></p>
        <p>Harga: <input type="number" name="harga" required></p>
        <p>Deskripsi:<br><textarea name="deskripsi" rows="5"></textarea></p>
        <p>Kategori:<br>
        <select name="kategori">
        <?php
            $kategori = mysqli_query($conn, "SELECT * FROM kategori");
            while ($p = mysqli_fetch_assoc($kategori)) {
        ?>
        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
        <?php
            }
        ?>
        </select>
        <p>Stok: <input type="number" name="stok"></p>
        <p>Rating: <input type="number" step="0.1" name="rating"></p>
        <p>Gambar Utama: <input type="file" name="gambar" required></p>
        <p>Thumbnail 1: <input type="file" name="thumbnail1"></p>
        <p>Thumbnail 2: <input type="file" name="thumbnail2"></p>
        <p>Thumbnail 3: <input type="file" name="thumbnail3"></p>
        <p>Thumbnail 4: <input type="file" name="thumbnail4"></p>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
