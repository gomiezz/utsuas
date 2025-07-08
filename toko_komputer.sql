-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2025 pada 11.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_komputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `pass`) VALUES
(1, 'adminx', 'mr.adminx@cok.com', '39d0d38b6b9a01e2894db59a9985ba2df6c895d9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `spesifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `spesifikasi`) VALUES
(1, 'Monitor', 'Resolusi layar, Ukuran layar, Refresh rate');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_spesifikasi`
--

CREATE TABLE `nilai_spesifikasi` (
  `id` int(255) NOT NULL,
  `produk` int(255) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_spesifikasi`
--

INSERT INTO `nilai_spesifikasi` (`id`, `produk`, `nilai`) VALUES
(1, 20, 'FULL HD (1920x1080), 23.8 INCH, 144Hz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `user`, `bulan`) VALUES
(1, 449634, 'July 2024'),
(2, 449634, 'July 2024'),
(3, 449634, 'July 2024'),
(4, 449634, 'August 2024'),
(5, 449634, 'August 2024'),
(6, 449634, 'August 2024'),
(7, 449634, 'September 2024'),
(8, 449634, 'September 2024'),
(9, 449634, 'September 2024'),
(10, 449634, 'October 2024'),
(11, 449634, 'October 2024'),
(12, 449634, 'October 2024'),
(13, 449634, 'November 2024'),
(14, 449634, 'November 2024'),
(15, 449634, 'November 2024'),
(16, 449634, 'December 2024'),
(17, 449634, 'December 2024'),
(18, 449634, 'December 2024'),
(19, 449634, 'January 2025'),
(20, 449634, 'January 2025'),
(21, 449634, 'January 2025'),
(22, 449634, 'February 2025'),
(23, 449634, 'February 2025'),
(24, 449634, 'February 2025'),
(25, 449634, 'March 2025'),
(26, 449634, 'March 2025'),
(27, 449634, 'March 2025'),
(28, 449634, 'April 2025'),
(29, 449634, 'April 2025'),
(30, 449634, 'April 2025'),
(31, 449634, 'May 2025'),
(32, 449634, 'May 2025'),
(33, 449634, 'May 2025'),
(34, 449634, 'June 2025'),
(35, 449634, 'June 2025'),
(36, 449634, 'June 2025'),
(37, 449634, 'July 2025'),
(38, 449634, 'July 2025'),
(39, 449634, 'July 2025'),
(40, 449634, 'July 2025'),
(41, 449634, 'July 2025'),
(42, 449634, 'July 2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` int(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `thumbnail1` varchar(255) DEFAULT NULL,
  `thumbnail2` varchar(255) DEFAULT NULL,
  `thumbnail3` varchar(255) DEFAULT NULL,
  `thumbnail4` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `rating` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `harga`, `deskripsi`, `gambar`, `thumbnail1`, `thumbnail2`, `thumbnail3`, `thumbnail4`, `stok`, `rating`) VALUES
(20, 'Asus VA24EHE', 1, 1500000, 'Monitor bagus ini', 'gambar/pcgaming.jpg', NULL, NULL, NULL, NULL, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `website_profile`
--

CREATE TABLE `website_profile` (
  `id` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `website_profile`
--

INSERT INTO `website_profile` (`id`, `judul`, `nilai`) VALUES
(1, 'rt', '🔥 PROMO SPESIAL! 🔥|=|Diskon 10% untuk semua produk processor Intel Core generasi terbaru|=|🛒 Gratis Ongkir! xs|=|Untuk pembelian di atas Rp 5.000.000 ke seluruh Indonesia|=|💻 Paket Komputer Lengkap!|=|Dapatkan paket gaming dengan harga spesial|=|📞 Hubungi Kami:x|=|0859-5523-08595 (WhatsApp)'),
(2, 'br', 'Komponen Manusia Komputer Berkualitas|=|Temukan berbagai daging komputer dengan kualitas terbaik dan harga kompetitif untuk membangun PC impian Anda.'),
(3, 'ft', 'Tentang TechShop|=|TechShop adalah toko komponen komputer terpercaya yang menyediakan produk berkualitas dengan harga terbaik.|=|Jam Operasional|=|Senin - Jumat: 09.00 - 18.00<br>Sabtu: 09.00 - 15.00<br>Minggu & Hari Libur: Tutup|=|Lokasi|=|https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5355.3019370620395!2d106.91401221479705!3d-6.281817955836285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f2b2da1ad235%3A0x67d232abea1e3fc7!2sSTMIK%20Mercusuar!5e0!3m2!1sid!2sid!4v1746685637326!5m2!1sid!2sid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `produk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_spesifikasi`
--
ALTER TABLE `nilai_spesifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `website_profile`
--
ALTER TABLE `website_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_spesifikasi`
--
ALTER TABLE `nilai_spesifikasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `website_profile`
--
ALTER TABLE `website_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
