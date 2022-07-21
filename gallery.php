<?php
$pagg = 7;
include "inc.php";
?>
<section class="cmt-row portfolio-style-2-section clearfix">
    <div class="container">
        <div class="row multi-columns-row cmt-boxes-spacing-10px cmt-bgcolor-white">
            <!-- row -->
            <?php
            $prodpram = array();
            $products2 = $core->getmGallery($prodpram);
            if ($products2 != null)
                for ($ii = 0; $ii < count($products2); $ii++) {
            ?>
                <div class="cmt-box-col-wrapper col-lg-4 col-md-6 col-sm-6">
                    <!-- featured-imagebox -->
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <!-- featured-thumbnail -->
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="images/<?= $products2[$ii]['image'] ?>" alt="image">
                        </div><!-- featured-thumbnail end-->
                        <!-- cmt-box-view-overlay -->
                        <div class="cmt-box-view-overlay cmt-portfolio-box-view-overlay">
                            <div class="cmt-box-view-content-inner">
                                <div class="cmt-media-link">
                                    <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="portfolio-img" href="images/<?= $products2[$ii]['image'] ?>" data-rel="prettyPhoto" tabindex="0"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="featured-content">
                                    <div class="category">
                                        <p><?= $alt ?></p>
                                    </div>
                                    <div class="featured-title">
                                        <h5><a href="portfolio-single.html"><?= $products2[$ii]['name' . $clang] ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        </div><!-- cmt-box-view-overlay end-->
                    </div><!-- featured-imagebox -->
                </div>
            <? } ?>
        </div><!-- row end -->
    </div>
</section>
<?php
include "inc/footer.php";
?>