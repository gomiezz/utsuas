<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus file gambar (opsional kalau mau)
    $result = mysqli_query($conn, "SELECT gambar, thumbnail1, thumbnail2, thumbnail3, thumbnail4 FROM produk WHERE id_produk='$id'");
    $row = mysqli_fetch_assoc($result);
    $folder = "gambar";
    @unlink("$folder/" . $row['gambar']);
    @unlink("$folder/" . $row['thumbnail1']);
    @unlink("$folder/" . $row['thumbnail2']);
    @unlink("$folder/" . $row['thumbnail3']);
    @unlink("$folder/" . $row['thumbnail4']);

    // Hapus data di DB
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id'");

    echo "<script>alert('Produk berhasil dihapus!'); window.location.href='index.php?page=adminlist';</script>";
    exit;
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?page=adminlist';</script>";
    exit;
}
?>
