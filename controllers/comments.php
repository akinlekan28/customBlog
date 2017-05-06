<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/28/2017
 * Time: 11:47 AM
 */

include_once 'models/Comment_Table.php';

$commentTable = new Comment_Table($db);
$notifi = new stdClass();
$notifi->message = "";

$newCommentSubmitted = isset($_POST['new-comment']);
if ($newCommentSubmitted) {
    $whichEntry = $_POST['entry-id'];
    $user = $_POST['user-name'];
    $comment = $_POST['new-comment'];
    $commentTable->saveComment($whichEntry, $user, $comment);
    $notifi->message = "Your Comment has been added!";
}
if ($commentTable->getAllById($entryId)->rowCount() === 0) {
    $notifi->message = "Be the first to comment!";
}

$comments = include_once 'views/comment-form-html.php';

$allComments = $commentTable->getAllById($entryId);

$comments .= include_once "views/comment-html.php";
return $comments;