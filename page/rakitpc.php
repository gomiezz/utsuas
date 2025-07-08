<?php
include_once 'admins/pages/koneksi.php'; 
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
$allKategori="";
?>
<!DOCTYPE html>
<html lang="id">
    <!-- Rakit PC Section -->
    <section id="rakit-pc" class="section-pc-builder">
        <div class="container">
            <div class="section-title">
                <h2>Rakit PC Anda Sendiri</h2>
                <p>Pilih komponen sesuai kebutuhan dan dapatkan harga totalnya</p>
            </div>
            <div class="pc-builder">
                <div class="builder-container">
                    <div class="components-list">
                        <?php
                        while ($katRow = mysqli_fetch_assoc($kategori)) {
                            $allKategori = $allKategori.$katRow['nama'].",";
                            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk WHERE `kategori` = '".$katRow['id']."'"))>=1){
                        ?>

                        <div class="component-category">
                            <h3><?=$katRow['nama']?></h3>
                            <div class="component-options">
                                <?php
                                $produk = mysqli_query($conn, "SELECT * FROM produk WHERE `kategori` = '".$katRow['id']."'");
                                while ($proRow = mysqli_fetch_assoc($produk)) {
                                    $spek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nilai_spesifikasi WHERE `produk` = '".$proRow['id']."'"))['nilai'];
                                    if(!isset($spek)) $spek = "Tidak ada spesifikasi";
                                ?>

                                <div class="component-option" data-category="<?=$katRow['nama']?>" data-name="<?=$proRow['nama']?>" data-price="<?=$proRow['harga']?>">
                                    <h4><?=$proRow['nama']?></h4>
                                    <p><?=$spek?></p>
                                    <span class="price"></span>
                                </div>
                                <?php }?>
                            </div>
                        </div>

                        <?php }} ?>

                    </div>


                    <div class="pc-summary">
                        <h3>Ringkasan PC Anda</h3>
                        <div class="selected-components">
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                            while ($katRow = mysqli_fetch_assoc($kategori)) {
                            ?>
                            <div class="component-select">
                                <label for="<?=$katRow['nama']?>-select"><?=$katRow['nama']?>:</label>
                                <select id="<?=$katRow['nama']?>-select" data-category="<?=$katRow['nama']?>">
                                    <option value="" data-price="0">Pilih <?=$katRow['nama']?></option>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="total-price">
                            Total: <span id="total-price">Rp 0</span>
                        </div>
                        <a href="#" id="order-btn" class="btn" style="width: 100%; margin-top: 20px; display: none;">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let categories = "<?=$allKategori?>".split(",");
        console.log(categories);
    </script>
</html>