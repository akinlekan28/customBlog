<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/3/2017
 * Time: 6:06 AM
 */

$searchDataFound = isset($searchData);
if ($searchDataFound === false) {
    trigger_error('views/search-results-html.php needs $searchData');
}
$searchHtml = "<section id='search'> <p>You searched for <em>$searchTerm</em></p><ul>";

if ($searchData->fetchObject() === false) {
    $searchHtml .= "No entries match your search";
}

while ($searchRow = $searchData->fetchObject()) {
    $href = "index.php?page=blog&amp;id=$searchRow->entry_id";
    $searchHtml .= "<li><a href='$href'>$searchRow->entry_title</a></li>";
}

$searchHtml .= "</ul></section>";

return $searchHtml;
