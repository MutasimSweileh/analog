<?php if (isset($_POST["subscribe"])) {
    $text =  $_POST["name"] . "<br>" . $_POST["email"];
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
    $mail->Subject = "Subscribe";
    $mail->Body = $text;
    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    $core->addemail(array("email" => $_POST["email"]));
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
<!--footer start-->
<footer class="footer widget-footer clearfix">
    <div class="first-footer">
        <div class="cmt-footer-cta-wrapper box-shadow2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 widget-area">
                        <div class="featured-icon-box iconalign-before-heading cmt-icon_element-size-lg">
                            <div class="featured-content">
                                <div class="featured-icon">
                                    <div class="cmt-icon cmt-icon_element-color-white cmt-icon_element-size-lg">
                                        <i class="flaticon flaticon-email"></i>
                                    </div>
                                </div>
                                <div class="featured-title">
                                    <h5><?= plang('النشرة البريدية', 'Newsletter') ?></h5>
                                    <p><?= plang('اشترك في النشرة البريدية ليصلك اخر
                                    الاخبار والعروض', 'Subscribe to the newsletter to receive the latest
                                    news and offers') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 widget-area">
                        <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                            <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                <p><input type="email" name="email" placeholder="<?= ($plang ? "اكتب بريدك" : "Your Email") ?>" required="">

                                </p>
                                <p><button class="btn" type="submit" name="subscribe" value="subscribe"><i class="fal fa-envelope"></i></button></p>
                            </div>
                            <div id="subscribe-msg"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer cmt-textcolor-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                    <div class="widget clearfix">
                        <h3 class="widget-title"><?= getTitle("about" . $plang) ?></h3>
                        <?= getValue('footer_text', $lang) ?>
                        <div class="social-icons">
                            <ul class="list-inline">
                                <li><a href="<?= getValue("facebook") ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="<?= getValue("twitter") ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="<?= getValue("instagram") ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li><a href="<?= getValue("linkedin") ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                    <div class="widget widget_nav_menu clearfix">
                        <h3 class="widget-title"><?= plang('روابط مفيدة', 'Useful Links') ?></h3>
                        <ul id="menu-footer-services">
                            <li><a href="<?= $core->getPageUrl("index" . $plang) ?>"><?= getTitle("index" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("about" . $plang) ?>"><?= getTitle("about" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("products" . $plang) ?>"><?= getTitle("products" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("order" . $plang) ?>"><?= getTitle("order" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("news" . $plang) ?>"><?= getTitle("news" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("gallery" . $plang) ?>"><?= getTitle("gallery" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("video" . $plang) ?>"><?= getTitle("video" . $plang) ?></a></li>
                            <li><a href="<?= $core->getPageUrl("contact" . $plang) ?>"><?= getTitle("contact" . $plang) ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                    <div class="widget widget_contact clearfix">
                        <h3 class="widget-title"><?= plang('ابقى على تواصل', 'Get In Touch') ?></h3>
                        <ul class="">
                            <li><i class="fal fa-map-marker"></i><?= getValue('header_address', $lang) ?></li>
                            <li><i class="fal fa-envelope"></i> <a href=""><?= getValue('email') ?></a></li>
                            <li><i class="fal fa-phone"></i> <?= getValue('header_phone') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text cmt-textcolor-white">
        <div class="container">
            <div class="row copyright">
                <div class="col-md-12">
                    <span>Copyright © 2022 All rights reserved Erasoft</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->
<!--back-to-top start-->
<a id="totop" href="#top">
    <i class="fal fa-angle-up"></i>
</a>
<!--back-to-top end-->
</div><!-- page end -->
<!-- Javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bootstrap-touchspin.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script>
    function cartTouchSpin() {
        if ($('.quantity-spinner').length) {
            $("input.quantity-spinner").TouchSpin({
                verticalbuttons: true
            });
            $('input.quantity-spinner').on('touchspin.on.startspin', function() {
                var id = $(this).attr("id").replace("qty", "");
                // console.log(id);
                addtocart(id, -3);
                //alert("HI");
            });

        }
    }
    $(window).load(function() {
        $('.flexslider2').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
        cartTouchSpin();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function addtocart(id, qy) {
        if (id == -2) {
            if (confirm("<?= plang('هل أنت متأكد من أنك تريد حذف جميع السلع من عربة التسوق؟', 'Are you sure you want to delete all items from the shopping cart?') ?>")) {
                setCookie("cartlist", null, 5);
                $("#inc_cart").load("order<?= $plang ?>.php?inc=1&plang=<?= $plang ?>", function() {
                    cartTouchSpin();
                });
                $(".myCart").load("ajax.php?inc=1&plang=<?= $plang ?>");
            }
            return false;
        }
        if ($(".addtocart" + id).hasClass("noprice")) {
            // alert("<?= plang("عذرا المنتج غير متوفر", "Sorry, the product is not available") ?>");
            location.replace($(".addtocart" + id).attr("href"));
            return true;
        }
        if ($(".addtocart" + id).hasClass("outofstock")) {
            alert("<?= plang("عذرا المنتج غير متوفر", "Sorry, the product is not available") ?>");
            return false;;
        }
        var q = 1;
        /*  if (qy == -2 || qy == -3) {
             q = parseInt($('#qty' + id).val());
             if (qy == -2)
                 q--;
             else
                 q++;
         } */
        q = parseInt($('#qty' + id).val());
        //if (qy && qy != -2 && qy != -3 && qy != -1)
        //   q = qy;
        var wishlist = getCookie("cartlist");
        var owishlist = {};
        if (!wishlist)
            wishlist = [];
        else
            wishlist = wishlist.split(",");
        var done = false;
        var inc = "q" + id + "-";
        for (var i = 0; i < wishlist.length; i++) {
            if (wishlist[i] == id) {
                if (qy == -1) wishlist.splice(i, 1);
                done = true;
            }
        }
        wishlist = wishlist.filter(item => !item.includes(inc));
        if (!done)
            wishlist.push(id);
        owishlist.data = wishlist;
        if (q && qy != -1) {
            var qt = "q" + id + "-" + q;
            wishlist.push(qt);
        }
        owishlist = JSON.stringify(owishlist);
        setCookie("cartlist", wishlist.join(","), 5);
        setCookie("owishlist", owishlist, 5);
        $("#inc_cart").load("order<?= $plang ?>.php?inc=1&plang=<?= $plang ?>", function() {
            cartTouchSpin();
        });
        $(".myCart").load("ajax.php?inc=1&plang=<?= $plang ?>");
        if (!done) {
            if (qy != -2 && qy != -3)
                alert("<?= plang("تم اضافة المنتج الى السلة", "Product has been added to cart") ?>");
        } else {
            if (qy == -1) {
                $("#pc" + id).hide();
                $("#pc2" + id).hide();
                alert("<?= plang("تم حذف المنتج من السلة", "Product removed from cart") ?>");
            } else if (qy != -2 && qy != -3)
                alert("<?= plang("المنتج موجود فى السلة بالفعل", "The product is already in the cart.") ?>");
        }
        if (q)
            $('#qty' + id).val(q);
    }
    $(document).on("change", ".fw-brand-check input,.price-input input,.shorting select", function() {
        $(this).closest("form").get(0).submit();
    });
    jQuery(document).ready(function($) {
        $('.venobox,.image-popup-vertical-fit').venobox({
            bgcolor: '',
            framewidth: '500px', // default: ''
            spinner: 'cube-grid', // default: ''
            frameheight: '400px', // default: ''
            overlayColor: 'rgba(6, 12, 34, 0.85)',
            closeBackground: '',
            closeColor: '#fff',
            titleattr: 'data-title',
            share: ['facebook', 'twitter', 'download'] // default: []
        });
    });
</script>
<script>
    'use strict';
    (function($) {
        var rangeSlider = $(".price-range"),
            minamount = $("#minamount"),
            maxamount = $("#maxamount"),
            minPrice = rangeSlider.data('min'),
            sminPrice = rangeSlider.data('smin'),
            maxPrice = rangeSlider.data('max'),
            smaxPrice = rangeSlider.data('smax');
        rangeSlider.slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [(sminPrice ? sminPrice : minPrice), (smaxPrice ? smaxPrice : maxPrice)],
            slide: function(event, ui) {
                minamount.val(ui.values[0]);
                maxamount.val(ui.values[1]);
            }
        });
        minamount.val(rangeSlider.slider("values", 0));
        maxamount.val(rangeSlider.slider("values", 1));
    })(jQuery);
</script>
<!-- <script>
    var onSubmit = function(token) {
        console.log('success!', token);
    };
    var onloadCallback = function() {
        var els = document.querySelectorAll('button[type=submit]');
        for (let i = 0; i < els.length; i++) {
            // els[i].style.backgroundColor = "red";
            var el = document.createElement("input");
            el.name = els[i].name;
            el.value = els[i].value;
            el.type = "hidden";
            els[i].closest("form").appendChild(el);
            grecaptcha.render(els[i], {
                'sitekey': '6LcFFcseAAAAAOoXiZ_JAaJ-AzCJLAYe70LZZdmt',
                'callback': function(token) {
                    console.log('success!', token);
                    els[i].closest("form").submit();
                },
                'badge': "bottomleft"
            });
        }
    };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script> -->
</body>

</html>