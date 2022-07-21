<section class="main-slider style-two">
    <div class="main-slider-carousel owl-carousel">
        <?php
        $sliderpram = array();
        $sliders = $core->getslider($sliderpram);
        $ie = 0;
        foreach ($sliders as $slider) {  ?>
            <div class="slide">
                <img src="images/<?= $slider["image"] ?>" alt="<?= $slider["title" . $clang] ?>" />
                <div class="decrepation-sl">
                    <div class="container">
                        <div class="content alternate">
                            <h1 class=""><?= $slider["title" . $clang] ?></h1>
                            <p class="title">
                                <?= $slider["text" . $clang] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</section>