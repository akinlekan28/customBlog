<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/9/2017
 * Time: 9:21 AM
 */

if (isset($allEntries) === false ) {
    trigger_error('views/admin/entries-html.php needs $allEntries');
}
$entriesHTML = "<ul>";
while ($entry = $allEntries->fetchObject()) {
    $href = "admin.php?page=editor&amp;id=$entry->entry_id";
    $entriesHTML .= "<li><a href='$href'>$entry->entry_title</a></li>";
}

$entriesHTML .= "</ul>";
return $entriesHTML;