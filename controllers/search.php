<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/2/2017
 * Time: 9:55 AM
 */

include_once "models/Blog_Entry_Table.php";

$blogTable = new Blog_Entry_Table($db);

$searchOutput = "";
if (isset($_POST['search-term'])) {
    $searchTerm = $_POST['search-term'];
    $searchData = $blogTable->searchEntry($searchTerm);

    $searchOutput = include_once "views/search-results-html.php";
}
return $searchOutput;