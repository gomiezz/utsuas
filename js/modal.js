
// Fungsi untuk membuka modal
function openModal(productId) {
    // Di sini bisa ditambahkan kode untuk menyesuaikan konten modal berdasarkan productId
    // Untuk contoh ini kita menggunakan konten statis
    document.getElementById('productModal').classList.add('show');
    document.body.style.overflow = 'hidden';
}

// Fungsi untuk menutup modal
function closeModal() {
    document.getElementById('productModal').classList.remove('show');
    document.body.style.overflow = 'auto';
} 

// Fungsi untuk mengganti gambar utama
function changeImage(thumbnail) {
    // Hapus class active dari semua thumbnail
    document.querySelectorAll('.thumbnail').forEach(img => {
        img.classList.remove('active');
    });

    // Tambahkan class active ke thumbnail yang diklik
    thumbnail.classList.add('active');

    // Ubah gambar utama
    document.getElementById('mainImage').src = thumbnail.src;
}

// Tutup modal ketika mengklik di luar konten modal
window.onclick = function (event) {
    const modal = document.getElementById('productModal');
    if (event.target == modal) {
        closeModal();
    }
}

// Tutup modal dengan tombol ESC
document.onkeydown = function (evt) {
    evt = evt || window.event;
    if (evt.key === "Escape") {
        closeModal();
    }
};