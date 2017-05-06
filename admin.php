<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/3/2017
 * Time: 7:01 PM
 */

error_reporting( E_ALL);
ini_set("display_errors", 1);

include_once "models/Page_Data.php";
$pageData = new Page_Data();
$pageData->title = "Akin's Blog";
$pageData->addCSS("css/main-style.css");
$pageData->addScript("js/editor.js");
$pageData->content = include_once "views/admin/admin-nav.php";

$dbinfo = "mysql:host=localhost;dbname=myblog";
$dbuser = "root";
$dbpassword = "";

$db = new PDO( $dbinfo, $dbuser, $dbpassword);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$navigationIsClicked = isset($_GET['page']);

if ($navigationIsClicked) {
    $control = $_GET['page'];
}
else {
    $control = "entries";
}
$pageData->content .=include_once "controllers/admin/$control.php";
$page = include_once "views/page.php";
echo $page;