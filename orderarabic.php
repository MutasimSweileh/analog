<?php
$pagg = 8;
include "inc.php";
$contactmessage = "";
$id = isv("level");
$msg = "";
$agreement = 1;
$do_submit = isv("do_submit");
if ($do_submit) {
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
    if ($agreement) {
        $_product = isv("_product");
        $_product2 = isv("_product2");
        unset($_POST["do_submit"]);
        unset($_POST["_product"]);
        unset($_POST["_product2"]);
        unset($_POST["quantity"]);
        $_POST["date"] = date("Y-m-d", time());
        $sql = $core->SqlIn("order", $_POST);
        if ($sql) {
            $order_id = $sql;
            foreach ($_product as $p) {
                $p_ep = explode("-", $p);
                $sql = $core->SqlIn("order_products", array("product_id" => $p_ep[0], "order_id" => $order_id, "price" => $p_ep[2], "quantity" => $p_ep[1]));
            }
            if ($sql) {
                $titlee = $core->getEngines(array("page" => "info"))[0];
                $alt = $titlee["title"];
                $text = "لقد قمت بإرسال الرسالة التالية إليك من خلال نموذج موجود على ";
                $text .= '<a href="' . $PUr . '">' . $alt . '</a><br><br>';
                $text .= '<strong style="    color: blue;">معلومات الطلب</strong><br>';
                $text .= '<strong>رقم الطلب</strong> : ' . $order_id . '<br>';
                unset($_POST["date"]);
                $total = $_POST["total"];
                unset($_POST["message"]);
                unset($_POST["total"]);
                $array2 = array("name" => "الاسم", "city" => "المدينة", "mobile" => "الموبيل", "email" => "الاميل", "message" => "معلومات اضافيه");
                $orderedArray = array();
                foreach ($array2 as $key => $v) {
                    if ($_POST[$key])
                        $orderedArray[$v] = $_POST[$key];
                }
                foreach ($orderedArray as $k => $v)
                    $text .= ($k == "Delivery Note" ? "<br>" : "") . "<strong>" . ucfirst($k) . "</strong> : " . $v . '<br>';
                $text .= '<br><strong>المنتجات</strong> : <br>';
                $text .= '<style>td, th {
    border: 1px solid;
        padding: 5px;
}</style><table style="width: 100%">
    <tr>
        <th>#</th>
        <th>المنتج</th>
        <th>الكمية</th>
        <th>سعر الوحده</th>
        <th>الاجمالى</th>
    </tr>
';
                $t = 0;
                foreach ($_product2 as $x => $v) {
                    $s = explode("[&]", $v);
                    $text .= '<tr>
        <td>' . ($x + 1) . '</td>
        <td>' . $s[0] . '</td>
        <td>' . $s[1] . '</td>
        <td>' . number_format($s[2]) . '</td>
        <td>' . number_format(($s[1] * $s[2])) . '</td>
    </tr>';
                    $t += ($s[1] * $s[2]);
                }
                $text .= '</table><strong>الاجمالى</strong> : ' . number_format($t) . ' LE<br>';
                $text .= "<br>شكرا لك.";
                $mail->FromName = $alt;
                $info_media["code"] = "email";
                $contents = $core->getinfo_media($info_media);
                $emaills = $contents[0]["link"];
                $mail->AddAddress($emaills);
                $mail->AddAddress($_POST["email"]);
                $mail->IsHTML(true);
                $mail->Subject = $alt . " - Order";
                $mail->Body = $text;
                $mail->Send();
                $cartClear = true;
                $core->Sion("cartlist", null);
                $msg = plang("تم ارسال طلبك بنجاح ستواصل معك احد المسؤلين  قريبا شكرا لك .", "Your request has been successfully sent. An official will contact you shortly. Thank you.");
                $er = 0;
            } else {
                $msg = $core->DBgetError();
            }
        } else {
            $msg = $core->DBgetError();
        }
    } else
        $msg = plang("برجاء الموافقه علي الشروط والأحكام وسياسات البيع .", "Please agree to the terms and conditions and sales policies.");
}
$cartlist = $core->Sion("cartlist");
if (!$cartlist) {
    $msg = "لايوجد اى منتجات فى عربة التسوق";
}
?>
<style>
    .cart-area .cart-table .cart-header {
        color: #131313;
    }
</style>
<link rel="stylesheet" href="css/font-awesome.min.css">
<form id="inc_cart" method="POST">
    <section class="cart-area">
        <div class="container">
            <? if ($msg) { ?>
                <div class="row no-gutters">
                    <div class="col-md-12 alert alert-info" style="text-align: center;color: #237a57;
    font-size: 17px;
    margin-bottom: 10px;
    font-weight: 600;">
                        <?= $msg ?>
                    </div>
                </div>
            <? } else { ?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="table-outer">
                            <table class="cart-table">
                                <thead class="cart-header">
                                    <tr>
                                        <th class="prod-column"><?= plang('المنتج', 'Product') ?></th>
                                        <th>&nbsp;</th>
                                        <th><?= plang('الكمية', 'Qty') ?></th>
                                        <th class="price"><?= plang('السعر', 'Price') ?></th>
                                        <th><?= plang('المجموع', 'Total') ?></th>
                                        <th><?= plang('حذف', 'Remove') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $variable = $core->getData('products', array("in" => $cartlist));
                                    $_price = 0;
                                    $_wight = 0;
                                    $_qt = 0;
                                    foreach ($variable as $k => $v) {
                                        $qt = $core->qty($v["id"]);
                                        $id = $v["id"];
                                        $price = $v["price"];
                                        if ($v["discount"])
                                            $price = $v["discount"];
                                        $_qt =  $price * $qt;
                                        $_price +=  $_qt;
                                    ?>
                                        <tr>
                                            <input type="hidden" name="_product[]" value="<?= $id ?>[&]<?= $qt ?>[&]<?= $price ?>">
                                            <input type="hidden" name="_product2[]" value="<?= str_replace('"', "'", $v["name"]) ?>[&]<?= $qt ?>[&]<?= $price ?>">
                                            <td colspan="2" class="prod-column">
                                                <div class="column-box">
                                                    <div class="prod-thumb">
                                                        <a href="#"><img src="images/<?= $v["image"] ?>" alt="<?= $v["name"] ?>"></a>
                                                    </div>
                                                    <div class="title">
                                                        <h3 class="prod-title"><?= $v["name"] ?></h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="qty">
                                                <input class="quantity-spinner" id="qty<?= $id ?>" type="text" value="<?= $qt ?>" name="quantity">
                                            </td>
                                            <td class="price"><?= number_format($price) ?> <?= plang('جنية', 'EGP') ?></td>
                                            <td class="sub-total"><?= number_format($_qt) ?> <?= plang('جنية', 'EGP') ?></td>
                                            <td>
                                                <div class="remove available-info">
                                                    <span onclick="addtocart('<?= $id ?>',-1); return false;" class="icon fal fa-times thm-bg-clr2"></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row cart-bottom">
                    <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12">
                        <div class="calculate-shipping">
                            <div class="shop-page-title">
                                <div class="title"><?= plang('معلومات العميل', 'Client information') ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 pull-righta">
                                    <div class="form-group">
                                        <input name="name" class="form-control" type="text" placeholder="<?= plang(" ادخل الاسم", "Your name") ?>" required="required" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="email" class="form-control required email" type="email" placeholder="<?= plang("ادخل البريد الالكتروني", "Your email") ?>" value="" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input name="mobile" class="form-control" type="text" placeholder="<?= plang("الموبيل", "Mobile") ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="city" class="form-control required " type="text" placeholder="<?= plang("ادخل مدينتك", "City") ?>" value="" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control required" rows="5" placeholder="<?= plang("معلومات اضافية", "Additional information") ?>" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Start cart total -->
                    <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12">
                        <div class="cart-total">
                            <div class="shop-page-title">
                                <div class="title"><?= plang('مجموع سلة التسوق', 'Cart Total') ?> </div>
                            </div>
                            <ul class="cart-total-table">
                                <li class="clearfix">
                                    <span class="col col-title"><?= plang('المجموع الكلى', 'Total') ?></span>
                                    <input type="hidden" name="total" value="<?= number_format($_price) ?> جنية">
                                    <span class="col"><?= number_format($_price) ?> <?= plang('جنية', 'EGP') ?></span>
                                </li>
                            </ul>
                            <div class="update-cart pull-left mt-3">
                                <button class="shop-btn btn-primary btn" style="color: #fff;" name="do_submit" value="do_submit" type="submit"><?= plang('اطلب الان', 'Order now') ?> </button>
                            </div>
                        </div>
                    </div>
                    <!--End cart total -->
                </div>
            <? } ?>
        </div>
</form>
</div>
<?php if (!$inc) include "inc/footer.php" ?>