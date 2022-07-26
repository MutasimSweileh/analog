<?php
$pagg = 7;
include "inc.php";
?>
<style>
    li.wow.fadeInUp.col-md-3.col-sm-6.mb-2.galley.animated {}

    .inter {
        position: relative;
        display: inline-block;
        border: 5px solid #eee;
        height: 290px;
        width: 100%;
    }
</style>
<section class="gallery-one">
    <div class="gallery-one__container-box clearfix">
        <div class=" container">
            <?php
            $prodpram = array();
            $products2 = $core->getvideo($prodpram);
            if ($products2 == null) {
            ?>
                <div class="row no-gutters text-center my-3">
                    <div class="col-md-12 alert alert-info mt-3 d-none" style="text-align: center;color: #237a57;
    font-size: 17px;
    margin-bottom: 10px;
    font-weight: 600;">
                        <?= plang("قادم قريبا :)", "Coming soon :)") ?>
                    </div>
                    <img style="height: 300px;
    margin: 0 auto;" src="images/0005720_coming-soon-page_550.jpeg" alt="" srcset="">
                </div>
            <?
            } else {
            ?>
                <ul class="list-unstyled gallery2-one-carousel owl3-carousel custom-nav row">

                    <?
                    for ($ii = 0; $ii < count($products2); $ii++) {
                    ?>
                        <li class="wow fadeInUp col-md-3 col-sm-6 mb-2 galley" data-wow-delay="<?= $ii + 1 ?>00ms">
                            <div class="inter">
                                <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?= $products2[$ii]["video"] ?>" allowfullscreen></iframe>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            <? } ?>
        </div>
    </div>
</section>
<?php
include "inc/footer.php";
?>