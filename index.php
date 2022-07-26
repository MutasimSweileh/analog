<?php
$pagg = 1;
include "inc.php";
/*
$lang : get form  inc.php  = arabic || english;
$plang : get form  inc.php for  php file name  = arabic || "";
$clang : get form  inc.php for column name  =  _arabic || "" ;
*/
?>
<div class="site-main">
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-12 pe-xl-0">
                    <div class="about-cover-bg bg-cover me-xl-5" style="background-image: url('images/about2.png')">
                        <div class="our-experience-years">
                            <div class="year-outline">
                                <h2><?= getValue('experience_count') ?></h2>
                            </div>
                            <p><?= plang('سنوات', 'Years') ?> <span><?= plang('الخبرة', 'Experience') ?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                    <div class="block-contents checked-features-list">
                        <div class="section-title">
                            <span><?= plang('عن الشركة', 'About Company') ?></span>
                            <h2><?= $alt ?></h2>
                        </div>
                        <?= getValue('home_text', $lang) ?>

                    </div>
                    <a href="<?= $core->getPageUrl("about" . $plang) ?>" class="cmt-btn me-sm-4"><?= plang('اقرأ المزيد', 'Read More') ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-area">
        <div class="container">
            <div class="section-title with-desc text-center clearfix">
                <div class="title-header">
                    <h2 class="title"><?= getTitle("products" . $plang) ?></h2>
                </div>
            </div>
            <div class="portfolio-slider owl-carousel custom-nav">
                <?php
                $products = $core->getData("products", "where special=1");
                if ($products)
                    for ($i = 0; $i < count($products); $i++) {
                        // if (!$products[$i]["level"])
                        //    continue;
                        $price = $products[$i]["price"];
                        $outofstock = $products[$i]["stock"];
                        $id = $products[$i]["id"];
                ?>
                    <div class="single-portfolio-item">
                        <div class="portfolio-image">
                            <a href="<?= $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "products" . $plang) ?>">
                                <img src="images/<?= $products[$i]["image"] ?>" alt="<?= $products[$i]["name" . $clang] ?>" />
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h3>
                                <a href="<?= $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "products" . $plang) ?>"><?= $products[$i]["name" . $clang] ?></a>
                            </h3>

                            <a href="<?= ($outofstock ? $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "products" . $plang) : "javascript:void(0);") ?>" onclick="addtocart('<?= $id ?>'); return false;" class=" addtocart<?= $id ?> addtocart <?= ($outofstock ? "" : "outofstock") ?> <?= ($price ? "" : "noprice") ?> "><?= ($outofstock ? plang('اطلب الان', 'Order Now') : plang('غير متاح الان', 'Not available now')) ?></a>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </section>
    <section class="faq-funfact-section ">
        <div class="container">
            <div class="fun-fact-wrapper text-white text-center">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-fun-fact">
                            <h2><span class="count"><?= getValue('projects_count') ?></span>+</h2>
                            <h3><?= plang('المشاريع المنجزة', 'Project done') ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-fun-fact">
                            <h2><span class="count"><?= getValue('clients_count') ?></span>+</h2>
                            <h3><?= plang('عميل سعيد', 'Happy clients') ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-fun-fact">
                            <h2><span class="count"><?= getValue('employee_count') ?></span>+</h2>
                            <h3><?= plang('موظف ماهر', 'Skilled Employee') ?></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="single-fun-fact">
                            <h2><span class="count"><?= getValue('experience_count') ?></span>+Y</h2>
                            <h3><?= plang('سنوات الخبرة', 'Years experience') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-area">
        <div class="container">
            <div class="section-title with-desc text-center clearfix">
                <div class="title-header">
                    <h2 class="title"><?= getTitle("news" . $plang) ?></h2>
                </div>
            </div>
            <div class="owl-carousel blog-slider custom-nav">
                <?php
                $products = $core->getevents(array("special" => 1));
                if ($products)
                    for ($i = 0; $i < count($products); $i++) {
                        if ($products[$i]["level"])
                            continue;
                        $date = getDateTime($products[$i]["date"], $lang);
                ?>
                    <div class="iret">
                        <div class="single-blog">
                            <div class="image">
                                <a href="<?= $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "news" . $plang) ?>">
                                    <img src="images/<?= $products[$i]["image"] ?>" alt="<?= $products[$i]["name" . $clang] ?>">
                                </a>
                            </div>
                            <div class="content">
                                <span><?= $date[0] ?>, <?= $date[1] ?> <?= $date[2] ?></span>
                                <h3>
                                    <a href="<?= $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "news" . $plang) ?>"><?= $products[$i]["name" . $clang] ?></a>
                                </h3>
                                <a href="<?= $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "news" . $plang) ?>" class="blog-btn"><?= plang('اقرأ المزيد', 'Read More') ?> <i class="bx bx-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                <? } ?>

            </div>
        </div>
    </section>
    <!--service-section-->
    <section class="cmt-row service-section style2">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- section title -->
                <div class="section-title with-desc text-center clearfix">
                    <div class="title-header">
                        <h2 class="title"><?= plang('شركائنا', 'Our Partners') ?></h2>
                    </div>
                </div><!-- section title end -->
            </div>
            <div class="">
                <!-- row -->
                <!-- services-slide -->
                <div class="partn-slide owl-carousel custom-nav">
                    <? $variable = $core->getData('partners', 'where active = 1');
                    foreach ($variable as $k => $v) { ?>
                        <div class="featured-imagebox-services">
                            <div class="featured-thumbnail box-shadow">
                                <img class="img-fluid" src="images/<?= $v["image"] ?>" alt="">
                            </div>
                        </div>
                    <? } ?>



                </div>
            </div>
    </section>
    <!--service-section end-->
</div>
<!--site-main end-->
<?php
include "inc/footer.php";
?>