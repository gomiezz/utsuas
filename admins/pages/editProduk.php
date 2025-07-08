<?php
include 'koneksi.php';
 
$id = $_GET['id'];

// Ambil data produk lama
$q = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$p = mysqli_fetch_assoc($q);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $rating = $_POST['rating'];

    $upload_path = "../gambar";
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    // === Gambar Utama ===
    $gambar = $p['gambar'];
    if (isset($_POST['hapus_gambar'])) {
        if ($gambar && file_exists("$upload_path/$gambar")) {
            unlink("$upload_path/$gambar");
        }
        $gambar = '';
    } elseif (!empty($_FILES['gambar']['name'])) {
        $gambarBaru = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "$upload_path/$gambarBaru");
        if ($gambar && file_exists("$upload_path/$gambar")) {
            unlink("$upload_path/$gambar");
        }
        $gambar = $gambarBaru;
    }

    // === Thumbnail 1 ===
    $th1 = $p['thumbnail1'];
    if (isset($_POST['hapus_thumbnail1'])) {
        if ($th1 && file_exists("$upload_path/$th1")) {
            unlink("$upload_path/$th1");
        }
        $th1 = '';
    } elseif (!empty($_FILES['thumbnail1']['name'])) {
        $th1Baru = $_FILES['thumbnail1']['name'];
        move_uploaded_file($_FILES['thumbnail1']['tmp_name'], "$upload_path/$th1Baru");
        if ($th1 && file_exists("$upload_path/$th1")) {
            unlink("$upload_path/$th1");
        }
        $th1 = $th1Baru;
    }

    // === Thumbnail 2 ===
    $th2 = $p['thumbnail2'];
    if (isset($_POST['hapus_thumbnail2'])) {
        if ($th2 && file_exists("$upload_path/$th2")) {
            unlink("$upload_path/$th2");
        }
        $th2 = '';
    } elseif (!empty($_FILES['thumbnail2']['name'])) {
        $th2Baru = $_FILES['thumbnail2']['name'];
        move_uploaded_file($_FILES['thumbnail2']['tmp_name'], "$upload_path/$th2Baru");
        if ($th2 && file_exists("$upload_path/$th2")) {
            unlink("$upload_path/$th2");
        }
        $th2 = $th2Baru;
    }

    // === Thumbnail 3 ===
    $th3 = $p['thumbnail3'];
    if (isset($_POST['hapus_thumbnail3'])) {
        if ($th3 && file_exists("$upload_path/$th3")) {
            unlink("$upload_path/$th3");
        }
        $th3 = '';
    } elseif (!empty($_FILES['thumbnail3']['name'])) {
        $th3Baru = $_FILES['thumbnail3']['name'];
        move_uploaded_file($_FILES['thumbnail3']['tmp_name'], "$upload_path/$th3Baru");
        if ($th3 && file_exists("$upload_path/$th3")) {
            unlink("$upload_path/$th3");
        }
        $th3 = $th3Baru;
    }

    // === Thumbnail 4 ===
    $th4 = $p['thumbnail4'];
    if (isset($_POST['hapus_thumbnail4'])) {
        if ($th4 && file_exists("$upload_path/$th4")) {
            unlink("$upload_path/$th4");
        }
        $th4 = '';
    } elseif (!empty($_FILES['thumbnail4']['name'])) {
        $th4Baru = $_FILES['thumbnail4']['name'];
        move_uploaded_file($_FILES['thumbnail4']['tmp_name'], "$upload_path/$th4Baru");
        if ($th4 && file_exists("$upload_path/$th4")) {
            unlink("$upload_path/$th4");
        }
        $th4 = $th4Baru;
    }

    // === Update ke DB ===
    mysqli_query($conn, "UPDATE produk SET 
        nama='$nama',
        harga='$harga',
        deskripsi='$deskripsi',
        gambar='gambar/$gambar',
        thumbnail1='$th1',
        thumbnail2='$th2',
        thumbnail3='$th3',
        thumbnail4='$th4',
        stok='$stok',
        rating='$rating'
        WHERE id='$id'
    ");

    echo "<script>alert('Produk berhasil diupdate!'); window.location.href='index.php?page=produk';</script>";
    exit;
}
?>

<h1>Edit Produk</h1>
<form method="post" enctype="multipart/form-data">
    <p>Nama: <input type="text" name="nama" value="<?= $p['nama'] ?>" required></p>
    <p>Harga: <input type="number" name="harga" value="<?= $p['harga'] ?>" required></p>
    <p>Deskripsi:<br><textarea name="deskripsi" rows="5"><?= $p['deskripsi'] ?></textarea></p>
    <p>Stok: <input type="number" name="stok" value="<?= $p['stok'] ?>"></p>
    <p>Rating: <input type="number" step="0.1" name="rating" value="<?= $p['rating'] ?>"></p>

    <p>Gambar Utama Sekarang:<br>
        <?php if ($p['gambar']) { ?>
            <img src=".././<?= $p['gambar'] ?>" width="150"><br>
            <label><input type="checkbox" name="hapus_gambar" value="1"> Hapus Gambar Utama</label>
        <?php } else { ?>
            <em>Tidak ada gambar.</em>
        <?php } ?>
    </p>
    <p>Ganti Gambar Utama: <input type="file" name="gambar"></p>

    <hr>

    <p>Thumbnail 1 Sekarang:<br>
        <?php if ($p['thumbnail1']) { ?>
            <img src="gambar/<?= $p['thumbnail1'] ?>" width="100"><br>
            <label><input type="checkbox" name="hapus_thumbnail1" value="1"> Hapus Thumbnail 1</label>
        <?php } else { ?>
            <em>Tidak ada thumbnail.</em>
        <?php } ?>
    </p>
    <p>Ganti Thumbnail 1: <input type="file" name="thumbnail1"></p>

    <p>Thumbnail 2 Sekarang:<br>
        <?php if ($p['thumbnail2']) { ?>
            <img src="gambar/<?= $p['thumbnail2'] ?>" width="100"><br>
            <label><input type="checkbox" name="hapus_thumbnail2" value="1"> Hapus Thumbnail 2</label>
        <?php } else { ?>
            <em>Tidak ada thumbnail.</em>
        <?php } ?>
    </p>
    <p>Ganti Thumbnail 2: <input type="file" name="thumbnail2"></p>

    <p>Thumbnail 3 Sekarang:<br>
        <?php if ($p['thumbnail3']) { ?>
            <img src="gambar/<?= $p['thumbnail3'] ?>" width="100"><br>
            <label><input type="checkbox" name="hapus_thumbnail3" value="1"> Hapus Thumbnail 3</label>
        <?php } else { ?>
            <em>Tidak ada thumbnail.</em>
        <?php } ?>
    </p>
    <p>Ganti Thumbnail 3: <input type="file" name="thumbnail3"></p>

    <p>Thumbnail 4 Sekarang:<br>
        <?php if ($p['thumbnail4']) { ?>
            <img src="gambar/<?= $p['thumbnail4'] ?>" width="100"><br>
            <label><input type="checkbox" name="hapus_thumbnail4" value="1"> Hapus Thumbnail 4</label>
        <?php } else { ?>
            <em>Tidak ada thumbnail.</em>
        <?php } ?>
    </p>
    <p>Ganti Thumbnail 4: <input type="file" name="thumbnail4"></p>

    <button type="submit" name="update">Update</button>
</form>
