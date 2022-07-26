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
        $products = $lproducts;
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

    .share-products-socials ul,
    .sharethis-inline-share-buttons {
        float: right;
    }

    <?php if ($plang) { ?>.single-shop-content .content-box .addto-cart-box .input-group.bootstrap-touchspin {
        float: right;
    }

    .share-products-socials h5 {
        float: right;

    }

    .share-products-socials ul,
    .sharethis-inline-share-buttons {
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

    .cmt-btn.cmt-btn-size-md {
        color: #000;
    }

    .cmt-btn.cmt-btn-size-md:hover {
        color: #fff;
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

                                <a href="<?= ($outofstock ? $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "products" . $plang) : "javascript:void(0);") ?>" onclick="addtocart('<?= $id ?>'); return false;" class=" addtocart<?= $id ?> addtocart <?= ($outofstock ? "" : "outofstock") ?> <?= ($price ? "" : "noprice") ?> "><?= ($outofstock ? plang('اطلب الان', 'Order Now') : plang('غير متاح الان', 'Not available now')) ?></a>
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
                                                <div class="col-lg-5 text-center">
                                                    <? if ($products[$i]["file"]) { ?>
                                                        <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-rounded cmt-btn-style-border cmt-icon-btn-<?= plang("left", "right") ?> cmt-btn-color-darkgrey" href="images/<?= $products[$i]["file"] ?>" title=""><?= plang('داتا شيت', 'Data Sheet') ?> <i class="ti ti-download"></i></a>
                                                    <? } ?>
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

                                                <!--Start home google map area style2-->
                                                <?php if (isset($_POST["mobile"])) {
                                                    $text = "";
                                                    foreach ($_POST as $key => $value) {
                                                        $text .= ($text ? "<br>" : "") . ucfirst($key) . " : " . $value;
                                                    }
                                                    require("class.phpmailer.php");
                                                    $mail = new PHPMailer();
                                                    $mail->IsSMTP();
                                                    $mail->Host = "mail.sherktk.net";

                                                    $mail->SMTPAuth = true;
                                                    //$mail->SMTPSecure = "ssl";
                                                    $mail->Port = 587;
                                                    $mail->Username = "mail@sherktk.net";
                                                    $mail->Password = "JCrS%^)qc!eH";

                                                    $mail->From = "mail@sherktk.net";

                                                    $mail->FromName = $name;
                                                    $info_media["code"] = "email";
                                                    $contents = $core->getinfo_media($info_media);
                                                    $emaills = $contents[0]["link"];
                                                    $mail->AddAddress($emaills);
                                                    //$mail->AddReplyTo("mail@mail.com");
                                                    $mail->IsHTML(true);
                                                    $mail->Subject = "Request Quote";
                                                    $mail->Body = $text;

                                                    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

                                                    // $core->addemail(array("email" => $_POST["email"]));
                                                    if ($mail->Send()) {
                                                ?>

                                                        <script type="text/javascript">
                                                            alert("Thank you !!");
                                                        </script>

                                                    <?php
                                                    } else { ?>
                                                        <script type="text/javascript">
                                                            alert("<?= trim(htmlspecialchars_decode(str_replace("</p>", " ", str_replace("<p>", " ", $mail->ErrorInfo)))) ?>");
                                                        </script>
                                                <?php  }
                                                } ?>
                                                <div class="col-lg-7">
                                                    <div class="content-box">
                                                        <!-- <h2><?= $pageTitle ?></h2> -->

                                                        <? if ($price) { ?>
                                                            <span class="price"><?= plang('السعر', 'Price') ?> : <?= $price ?> <?= plang('جنية', 'EGP') ?> </span>
                                                        <? } ?>
                                                        <div class="text block-contents checked-features-list">
                                                            <?= $products[$i]["description" . $clang] ?>
                                                        </div>
                                                        <? if ($price) { ?>
                                                            <div class="addto-cart-box">
                                                                <input class="quantity-spinner" id="qty<?= $id ?>" type="text" value="1" name="quantity">
                                                                <button onclick="addtocart('<?= $id ?>'); return false;" class="addtocart<?= $id ?> addtocart <?= ($outofstock ? "" : "outofstock") ?> <?= ($price ? "" : "noprice") ?>" type="submit"><?= plang('اضافة المنتج الى السلة', 'Add to Cart') ?></button>
                                                            </div>
                                                        <? } else { ?>
                                                            <div class="addto-cart-box">
                                                                <button onclick="this.style.display = 'none'; document.getElementById('form-box').style.display = 'block';   return false;" class="addaddtocart<?= $id ?> addtocart <?= ($outofstock ? "" : "outofstock") ?> <?= ($price ? "" : "noprice") ?>" type="submit"><?= plang('طلب عرض أسعار', 'Request Quote') ?></button>
                                                            </div>
                                                            <div class="box-shadow cmt-bgcolor-white p-3" style="display: none;" id="form-box">
                                                                <!-- section title -->
                                                                <div class="section-title clearfix">
                                                                    <div class="title-header">
                                                                        <h4 class="title"><?= plang('اتصل بنا أو املأ النموذج', 'Call us or fill the Form') ?></h4>
                                                                    </div>
                                                                </div><!-- section title end -->
                                                                <form id="cmt-quote-form" class="cmt-quote-form clearfix" method="post" action="#">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input name="name" type="text" class="form-control" value="" placeholder="<?= plang("الاسم الكامل", "Full Name") ?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input name="email" type="text" value="" placeholder="<?= plang("البريد الالكتروني", "Email Address") ?>" required="required" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <input name="mobile" type="text" value="" placeholder="<?= plang("رقم الموبيل", "Mobile Number") ?>" required="required" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="Product-Name" value="<?= $pageTitle ?>">
                                                                        <input type="hidden" name="Product-Id" value="<?= $id ?>">
                                                                        <div class="col-md-12">
                                                                            <div class="addto-cart-box">
                                                                                <button class="addtocart" type="submit"><?= plang('ارسال', 'Submit') ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <? } ?>
                                                        <div class="share-products-socials">
                                                            <h5><?= plang('شارك هذا المنتج', 'Share this product') ?></h5>
                                                            <div class="sharethis-inline-share-buttons"></div>
                                                            <!-- <ul>
                                                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $FUr ?>"><i class=" fab fa-facebook fb" aria-hidden="true"></i></a></li>
                                                                <li><a target="_blank" href="http://twitter.com/share?text=<?= $products[0]["name" . $clang] ?>&amp;url=<?= $FUr ?>"><i class="fab fa-twitter tw" aria-hidden="true"></i></a></li>
                                                            </ul> -->
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