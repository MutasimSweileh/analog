<?php
$pagg = 3;
include "inc.php";
$id =  isv("level");
$name = isv("name");
$prodpram = "where  active=1";
if ($id)
    $prodpram = array("id" => $id);
if ($name)
    $prodpram = array("name" => $name);
$islevel = false;
$products = $core->getData("products", $prodpram);
if ($id && !$products[0]["level"]) {
    $prodpram = array("level" => $products[0]["id"]);
    $lproducts = $core->getData("products", $prodpram);
    $p_name = $products[0]["name" . $clang];
    if ($lproducts) {
        $islevel = $products[0]["name" . $clang];
        // $products = $lproducts;
    }
}
?>
<style type="text/css">
    .tittle {
        margin-bottom: 60px;
    }

    .services-bl {
        padding: 5px;
    }

    .services-bl img {
        width: 100%;
    }

    .single-service-sidebar .service-pages li a .title h3 {
        color: #131313;
    }

    .single-service-sidebar .service-pages li a .icon span:before {
        color: #131313;
    }

    .single-service-sidebar .service-pages li:hover a .title,
    .single-service-sidebar .service-pages li.active a .title {
        background: #5b3230;
    }

    .single-service-sidebar .service-pages li:hover a .icon,
    .single-service-sidebar .service-pages li.active a .icon {
        background: #131313;
        border-color: #131313;
    }

    .single-service-sidebar .service-pages li.active a .title h3 {
        color: #ffff;
    }

    .single-service-sidebar .single-sidebar .service-title h3 {
        color: #000;
    }

    .single-service-image-box img {
        width: 100%;
        max-height: 500px;
    }

    .single-service-sidebar .service-pack-download li {
        position: relative;
        display: block;
        background: #131313;
        transition: all 500ms ease;
        padding: 23px 40px 23px;
    }

    .single-pricing-box {
        padding: 2px;
    }

    .single-pricing-box .inner {
        padding: 0px;
    }

    .col-md-3.col-sm-6.galley img {
        display: inline-block;
        float: none;
        height: 150px;
        position: relative;
        overflow: hidden;
    }

    .share-products-socials ul {
        float: right;
    }

    <?php if ($plang) { ?>.single-shop-content .content-box .addto-cart-box .input-group.bootstrap-touchspin {
        float: right;
    }

    .share-products-socials h5 {
        float: right;

    }

    .share-products-socials ul {
        float: left;
    }

    <?php  } ?>.share-products-socials h5 {

        color: #333;
    }

    .share-products-socials ul li:last-child {
        margin-left: 10px;
    }

    .single-shop-content .content-box h2,
    .product-tab-box .tab-btns .tab-btn span {
        color: #333;
    }

    .flexslider2 {
        direction: ltr;
    }
</style>

<link rel="stylesheet" href="css/font-awesome.min.css">
<div id="slides" class="services services-style1-area">
    <div class="container">
        <div class="subtittle">
            <h2><?= ($name ? ($plang ? "نتيجة البحث عن  ' " . $name . " '" : "Search result for ' " . $name . " '") : ($id ? $p_name : getTitle("services" . $plang))) ?></h2>
        </div>
        <div class="serv_carosele services-area row ">
            <?php
            if (!$id || $islevel) {
                // print_r($products);
                for ($i = 0; $i < count($products); $i++) {
                    // if (!$products[$i]["level"])
                    //    continue;
                    $price = $products[$i]["price"];
                    $outofstock = $products[$i]["stock"];
                    $id = $products[$i]["id"];
            ?>
                    <div class="col-lg-4 col-md-6">
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

                                <a href="<?= ($outofstock ? $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "products" . $plang) : "javascript:void(0);") ?>" onclick="addtocart('<?= $id ?>'); return false;" class=" addtocart<?= $id ?> addtocart <?= ($outofstock ? "" : "outofstock") ?> "><?= ($outofstock ? plang('اطلب الان', 'Order Now') : plang('غير متاح الان', 'Not available now')) ?></a>
                            </div>
                        </div>
                    </div>
                <? }
            } else
                for ($i = 0; $i < count($products); $i++) {
                    if (!$id || $islevel) {
                        if (!$id && !$islevel && $products[$i]["level"])
                            continue;
                        $link = $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "products" . $plang);
                ?>
                <?php } else {
                        $price = $products[$i]["price"];
                        $id = $products[$i]["id"];
                        if ($products[$i]["discount"])
                            $price = $products[$i]["discount"];
                        $outofstock = $products[$i]["stock"];
                ?>
                    <section id="shop-area" class="single-shop-area pt-3">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="shop-content">
                                        <!--Start single shop content-->
                                        <div class="single-shop-content">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <!--  <div class="single-product-image-holder">
                                                        <img src="images/<?= $products[$i]["image"] ?>" alt="<?= $pageTitle ?>">
                                                    </div> -->
                                                    <div class="flexslider2">
                                                        <ul class="slides">
                                                            <li data-thumb="images/<?= $products[$i]["image"] ?>">
                                                                <img src="images/<?= $products[$i]["image"] ?>" />
                                                            </li>
                                                            <? $videospaaaarm = array("product_id" => $products[0]["id"]);
                                                            $videos = $core->getproducts_images($videospaaaarm);
                                                            foreach ($videos as $k => $v) { ?>
                                                                <li data-thumb="images/<?= $v["image"] ?>">
                                                                    <img src="images/<?= $v["image"] ?>" />
                                                                </li>
                                                            <? } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="content-box">
                                                        <h2><?= $pageTitle ?></h2>
                                                        <span class="price"><?= plang('السعر', 'Price') ?> : <?= $price ?> <?= plang('جنية', 'EGP') ?> </span>
                                                        <div class="text block-contents checked-features-list">
                                                            <?= $products[$i]["description" . $clang] ?>
                                                        </div>
                                                        <div class="addto-cart-box">
                                                            <input class="quantity-spinner" id="qty<?= $id ?>" type="text" value="1" name="quantity">
                                                            <button onclick="addtocart('<?= $id ?>'); return false;" class="addtocart<?= $id ?> addtocart <?= ($outofstock ? "" : "outofstock") ?>" type="submit"><?= plang('اضافة المنتج الى السلة', 'Add to Cart') ?></button>
                                                        </div>
                                                        <div class="share-products-socials">
                                                            <h5><?= plang('شارك هذا المنتج', 'Share this product') ?></h5>
                                                            <ul>
                                                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $FUr ?>"><i class=" fab fa-facebook fb" aria-hidden="true"></i></a></li>
                                                                <li><a target="_blank" href="http://twitter.com/share?text=<?= $products[0]["name" . $clang] ?>&amp;url=<?= $FUr ?>"><i class="fab fa-twitter tw" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End single shop content-->
                                        <!--Start related product box-->
                                        <!--End related product box-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            <?php }
                } ?>
        </div>
    </div>
</div>
<?php
include "inc/footer.php";
?>