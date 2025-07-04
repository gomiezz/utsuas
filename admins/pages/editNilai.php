<?php
include 'koneksi.php';
 
$id = $_GET['id']; 

// Ambil data produk lama
$q = mysqli_query($conn, "SELECT * FROM nilai_spesifikasi WHERE id='$id'");
$p = mysqli_fetch_assoc($q);

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $kat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk where id = '".mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nilai_spesifikasi where id = '".$id."'"))['produk']."'"))['kategori'];
    $spek = explode(",", mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori where id = '".$kat."'"))['spesifikasi']);
    $nilai = "";
    for($i=0;$i<count($spek);$i++){
        $nilai=$nilai.$_POST[trim($spek[$i])];
        if(!($i+1==count($spek)))$nilai=$nilai.", ";
    }
  
    

    // === Update ke DB ===
    mysqli_query($conn, "UPDATE nilai_spesifikasi SET 
        nilai='$nilai'
       
        WHERE id='$id'
    ");

    echo "<script>alert('Spesifikasi berhasil diupdate!'); window.location.href='index.php?page=nilai';</script>";
    exit;
}
?>

<h1>Edit Spesifikasi</h1>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="id" value="<?=$p['id']?>" id="produkasli" hidden >
    <?php
    $kategori = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk where id = '".$p['produk']."'"))['kategori'];
    $danak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori where id = '".$kategori."'"))['spesifikasi'];
    ?>
    <div id="dataBeranak">

    </div>
    <button type="submit" name="update">Update</button>
</form>
<script>
    let a = "<?=$danak?>".split(",");
    let b = "<?=$p['nilai']?>".split(",");
    const container = document.querySelector("div#dataBeranak");
    let str = "";
    for(let i=0;i<a.length;i++){
        str+= `<p>${a[i].trim()}: <input type="text" name="${a[i].trim()}" value="${b[i].trim()}" required></p><br/>`;
    }
    container.innerHTML = str;
</script>
