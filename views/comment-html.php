<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/1/2017
 * Time: 6:50 PM
 */

$commentFound = isset($allComments);
if ($commentFound === false) {
    trigger_error('views/comments-html.php needs $allComments');
}

$allCommentsHtml = "<ul id='comments'>";

while ($commentData = $allComments->fetchObject()) {
       $allCommentsHtml .= "<li>
$commentData->author wrote:
<p>$commentData->comment_txt</p> 
<p>$commentData->date</p>
</li>";

    $allCommentsHtml .= "</ul>";
}

return $allCommentsHtml;