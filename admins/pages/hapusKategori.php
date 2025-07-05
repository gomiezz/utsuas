<?php
include 'koneksi.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Hapus data di DB
    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori='$id'"); 
    while ($p = mysqli_fetch_assoc($produk)) {
        mysqli_query($conn, "DELETE FROM nilai_spesifikasi WHERE produk='".$p['id']."'");
    }
    mysqli_query($conn, "DELETE FROM produk WHERE kategori='$id'");
    mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");
    echo "<script>alert('kategori berhasil dihapus!'); window.location.href='index.php?page=kategori';</script>";
    exit;
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?page=adminlist';</script>";
    exit;
}
?>
