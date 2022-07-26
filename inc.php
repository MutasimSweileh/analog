<?php
$inc = (isset($_GET["inc"]));
$plang = (isset($_GET["plang"]) && trim($_GET["plang"]) ? $_GET["plang"] : "");
include_once("classes/core.php");
$core = new core;
include("inc/inc_formemail.php");
$name = pathinfo(basename($_SERVER["PHP_SELF"]))["filename"];
$lang = (strpos($name, "arabic") !== false || $plang ? "arabic" : "english");
$plang = ($lang == "arabic" ? $lang : "");
$clang = ($lang == "english" ? "" : "_arabic");
if (strpos($FUr, "php") === false && !isv("id") && !isv("level")) {
    //header("Location: indexarabic.php");
}
if (!$inc)
    include  "inc/header.php";
if ($pagg == 1)
    include  "inc/slider.php";

//die();
