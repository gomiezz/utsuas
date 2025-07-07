<?php
// Ambil data produk lama
$q = mysqli_query($conn, "SELECT * FROM website_profile WHERE judul='ft'");
$p = mysqli_fetch_assoc($q);
$data = explode("|=|", $p['nilai']);
if (isset($_POST['update'])) {
    $newData="";
    for($i=-1;$i<count($data)-1;$i++){
        $i++;
        if($i==count($data)-2) $newData = $newData.$_POST['j'.$i]."|=|".$_POST['v'.$i];
        else $newData = $newData.$_POST['j'.$i]."|=|".$_POST['v'.$i]."|=|";
    }
    
    // === Update ke DB ===
    mysqli_query($conn, "UPDATE website_profile SET 
        nilai='$newData'
        WHERE judul='ft'
    ");

    echo "<script>alert('ft berhasil diupdate!'); window.location.href='index.php?page=ft';</script>";
    exit;
}
?>

<h1>Edit FOOTER</h1>
<form method="post" enctype="multipart/form-data">
    <?php
    for($i=-1;$i<count($data)-1;$i++){
        $i++
    ?>
    <p>Judul: <input type="text" name="j<?=$i?>" value="<?= $data[$i] ?>" required></p>
    <p>Konten: <input type="text" name="v<?=$i?>" value="<?= $data[$i+1] ?>" required></p>
    <?php } ?>
    <button type="submit" name="update">Update</button>
</form>
