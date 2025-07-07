<!DOCTYPE html> 
<html lang="id">
<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-content">

            <?php
            $data = explode("|=|",mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM website_profile WHERE judul='ft'"))['nilai']);
            for($i=-1;$i<count($data)-1;$i++){
                $i++;
                if($i==count($data)-2){
                   
            ?>
            <div class="footer-section">
                <h3><?= $data[$i] ?></h3>
                <iframe src="<?= $data[$i+1] ?>" width="400" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <?php 
                }else{
                    ?>
            <div class="footer-section">
                <h3><?= $data[$i] ?></h3>
                <p><?= $data[$i+1] ?></p>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="footer-bottom">
            <p>© 2025 TechShop. All Rights Reserved.</p>
        </div>
    </div>
</footer>
