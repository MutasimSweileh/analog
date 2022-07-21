<?
$pagg = 2;
include  "inc.php";
?>
<!-- About Us Area -->
<section class="about_us_area row">
    <div class="container">
        <div class=" about_row block-contents checked-features-list">
            <div class="subtittle">
                <h2><?= $pageTitle ?></h2>
            </div>
            <div class="who_we_area col-md-12 col-sm-12">
                <p><?= getValue("about", $lang) ?></p>
            </div>
        </div>
    </div>
</section>
<!-- End About Us Area -->
<?php include "inc/footer.php" ?>