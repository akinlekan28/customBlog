<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/6/2017
 * Time: 9:01 AM
 */

include_once "models/Blog_Entry_Table.php";

$entryTable = new Blog_Entry_Table($db);

$allEntries = $entryTable->getAllEntries();
$entriesHTML = include_once "views/admin/entries-html.php";
return $entriesHTML;
