<!DOCTYPE html>
<html lang="id">
     

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="hero-content container">
            <?php
            $data = explode("|=|",mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM website_profile WHERE judul='br'"))['nilai']);
            for($i=-1;$i<count($data)-1;$i++){
                $i++
            ?>
            <h1><?= $data[$i] ?></h1>
            <p><?= $data[$i+1] ?></p>
            <?php } ?>
            <a href="index.php?page=produk" class="btn">Lihat Produk</a>
        </div>
    </section>
</html>