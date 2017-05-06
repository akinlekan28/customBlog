<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/7/2017
 * Time: 10:00 AM
 */

include_once "models/Blog_Entry_Table.php";
$entryTable = new Blog_Entry_Table($db);

$isEntryClicked = isset( $_GET['id'] );
if ($isEntryClicked) {

    $entryId = $_GET['id'];
    $entryData = $entryTable->getEntry($entryId);
    $blogOutput = include_once "views/entry-html.php";
    $blogOutput .= include_once "controllers/comments.php";
}
else {
    $entries = $entryTable->getAllEntries();
    $blogOutput = include_once "views/list-entries-html.php";
}
return $blogOutput;