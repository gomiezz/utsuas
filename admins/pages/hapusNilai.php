<?php
include 'koneksi.php';
  
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Hapus data di DB
    mysqli_query($conn, "DELETE FROM nilai_spesifikasi WHERE id='$id'");

    echo "<script>alert('nilai berhasil dihapus!'); window.location.href='index.php?page=nilai';</script>";
    exit;
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?page=nilai';</script>";
    exit;
}
?>
