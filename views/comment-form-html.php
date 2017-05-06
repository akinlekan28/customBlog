<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/28/2017
 * Time: 11:34 AM
 */

$idIsFound = isset($entryId);
if ($idIsFound === false ) {
    trigger_error('views/comment-html.php needs an $entryId');
}
return "

<style>
form#comment-form{
 margin-top:2em;
 padding-top: 0.7em;
 border-top:1px solid grey;
}
form#comment-form label, form#comment-form input[type='submit']{
 padding-top:0.7em;
 display:block;
} 
</style>
  <form action='index.php?page=blog&amp;id=$entryId' method='post' id='comment-form'>
  <input type='hidden' name='entry-id' value='$entryId' />
  <label>Name</label>
  <input type='text' name='user-name' />
  <br>
  <label>Comment</label>
  <textarea name='new-comment'></textarea>
  <br><br>
  <input type='submit' value='Post' />
  </form>
  <p>$notifi->message</p>
";