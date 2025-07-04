<?php include 'koneksi.php'; ?>
<?php 
if (isset($_POST['submit'])) {
    $produk = $_POST['produk'];
    $kat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk where id = '".$produk."'"))['kategori'];
    $spek = explode(",", mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori where id = '".$kat."'"))['spesifikasi']);
    $nilai = "";
    for($i=0;$i<count($spek);$i++){
        $nilai=$nilai.$_POST[trim($spek[$i])];
        if(!($i+1==count($spek)))$nilai=$nilai.", ";
    }
  
    mysqli_query($conn, "INSERT INTO nilai_spesifikasi (produk, nilai)
    VALUES ('$produk','$nilai')");
    echo "<script>alert('Nilai berhasil ditambahkan!'); window.location.href='index.php?page=nilai';</script>";
    exit;

    // TIDAK PAKAI HEADER, pakai SCRIPT
}
?>

<!DOCTYPE html>
<html lang="id">
<body>
    <h1>Tambah Nilai Spesifikasi</h1>
    <form method="post" enctype="multipart/form-data">
        <p>Produk:</p>
        <input type="text" name="produk" value="" id="produkasli" hidden >
        <select name="produkz" id="anaknih" onchange="gantiAnak()" required>
            <option value="|=|" data-anak="">Semua Produk terpenuhi</option>
            <?php
            $produk = mysqli_query($conn, "SELECT * FROM produk");
            while ($p = mysqli_fetch_assoc($produk)) {
                $danak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori where id = '".$p['kategori']."'"))['spesifikasi'];
                $cek = mysqli_query($conn, "SELECT * FROM nilai_spesifikasi where produk = '".$p['id']."'");
                if(mysqli_num_rows($cek)<=0){
            ?>
            <option value="<?= $p['id'] ?>|=|<?=$danak?>"><?= $p['nama'] ?></option>
            <?php
                }
            }
            ?>
        </select>
        <div id="dataBeranak">

        </div>
        <button type="submit" name="submit">Simpan</button>
    </form>
    <script>
        function gantiAnak(){
            let b = document.querySelector("#anaknih").value.split("|=|");
            document.querySelector("#produkasli").value = b[0];
            let a = b[1].split(",");
            const container = document.querySelector("div#dataBeranak");
            let str = "";
            for(let i=0;i<a.length;i++){
                str+= `<p>${a[i].trim()}: <input type="text" name="${a[i].trim()}" required></p><br/>`;
            }
            container.innerHTML = str;
        }
    </script>
</body>
</html>
