<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/16/2017
 * Time: 9:17 AM
 */

include_once "models/Uploader.php";

$imageSubmitted = isset($_POST['new-image']);

if ($imageSubmitted) {
    $uploader = new Uploader('image-data');
    $uploader->saveIn("img");


    try {
        $uploader->save();
        $uploadMessage = "File uploaded!";
    } catch (Exception $exception) {
        $uploadMessage = $exception->getMessage();
    }
}

$imageManagerHtml = include_once "views/admin/images-html.php";
return $imageManagerHtml;