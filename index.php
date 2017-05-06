<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/7/2017
 * Time: 9:45 AM
 */
error_reporting( E_ALL);
ini_set( "display_errors", 1);
include_once "models/Page_Data.php";
$pageData = new Page_Data();
$pageData->title = "Akin's Blog";
$pageData->addCss("css/main-style.css");

$dbinfo = "mysql:host=localhost;dbname=myblog";
$dbuser = "root";
$dbpassword = "";

$db = new PDO($dbinfo, $dbuser, $dbpassword);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pageRequested = isset($_GET['page']);
$controller = "blog";
if ($pageRequested) {
    if ($_GET['page'] === "search") {
        $controller = "search";
    }
}

$pageData->content .= include_once 'views/search-form-html.php';

$pageData->content .= include_once "controllers/$controller.php";

$page = include_once "views/page.php";
echo $page;