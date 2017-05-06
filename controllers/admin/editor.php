<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/6/2017
 * Time: 8:59 AM
 */
include_once "models/Blog_Entry_Table.php";

$entryTable = new Blog_Entry_Table($db);

$editorSubmited = isset($_POST['action']);

if ($editorSubmited) {
    $buttonClicked = $_POST['action'];
    $save = ($buttonClicked === 'save');
    $id = $_POST['id'];
    $insertNewEntry = ( $save and $id === '0');
    $deleteEntry = ($buttonClicked === 'delete');
    $updateEntry = ( $save and $insertNewEntry === false);
    $author = $_POST['author'];
    $title = $_POST['title'];
    $entry = $_POST['entry'];

    if ($insertNewEntry) {
        $savedEntryId = $entryTable->saveEntry($author, $title, $entry);
    }
    else if ($updateEntry) {
        $entryTable->updateEntry($id, $author, $title, $entry);
        $savedEntryId = $id;
    }
    else if ($deleteEntry) {
     $entryTable->deleteEntry($id);
    }
}
$entryRequested = isset($_GET['id']);
if ($entryRequested) {
    $id = $_GET['id'];
    $entryData = $entryTable->getEntry($id);
    $entryData->entry_id = $id;
    $entryData->legend = "Edit Saved Entry";
    $entryData->message = "";
}

$entrySaved = isset( $savedEntryId );
if ($entrySaved) {
    $entryData = $entryTable->getEntry($savedEntryId);
    $entryData->legend = "Last Entry";
    $entryData->message = "Entry was Saved";
}
$editorOutput = include_once "views/admin/editor-html.php";
return $editorOutput;