<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/8/2017
 * Time: 5:55 PM
 */

$entriesFound = isset($entries);

if ($entriesFound === false) {
    trigger_error("views/list-entries-html.php needs $entries");
}

$entriesHTML = "<ul id='blog-entries'>";

while ( $entry = $entries->fetchObject()) {
    $href = "index.php?page=blog&amp;id=$entry->entry_id";
    $entriesHTML .= "<li>
       <h2>$entry->entry_title</h2>
         <div>$entry->intro<p><a href='$href'>Read More</a> </p>
         </div>
       </li>";
}

$entriesHTML .= "</ul>";
return $entriesHTML;