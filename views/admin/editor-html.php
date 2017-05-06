<?php

$entryDataFound = isset($entryData);
if ($entryDataFound === false ) {
    $entryData = new StdClass();
    $entryData->entry_id = 0;
    $entryData->author_name = "";
    $entryData->entry_title = "";
    $entryData->entry_text = "";
    $entryData->message = "";
    $entryData->legend = "New Entry Submission";
}
  return "
    <style>
      form#editor{
    width: 300px;
    margin:0px;
    padding:0px;
}
form#editor label, form#editor input[type='text']{
    display:block;
}
form#editor #editor-buttons{
    border:none;
    text-align:right;
}
form#editor textarea, form#editor input[type='text']{
    width:90%;
    margin-bottom:2em;
}
form#editor textarea{
    height:10em;
}
#author-warning, #title-warning, #entry-warning  {
 color: red;
 font-size: small;
 font-weight: bold;
}
.reshift {
float: left;
margin-left: -12px;
}
    </style>
     <form method='post' action='admin.php?page=editor' id='editor'>
     <input type='hidden' name='id' value='$entryData->entry_id' />
      <fieldset>
        <legend>$entryData->legend</legend>
          <label>Author's Name</label> <span id='author-warning'></span>
            <input type='text' name='author' maxlength='150' value='$entryData->author_name' required> 
          <label>Title</label> <span id='title-warning'></span>
            <input type='text' name='title' maxlength='150' value='$entryData->entry_title' required><br>
          <label>Entry</label> <span id='entry-warning'></span>
            <textarea name='entry' required>$entryData->entry_text</textarea>
          <fieldset id='editor-buttons'>
              <input type='reset' value='clear'>
              <input type='submit' name='action' value='save' class='reshift'>
              <input type='submit' name='action' value='delete'>
              <p id='editor-message'>$entryData->message</p>
          </fieldset>
      </fieldset>
    </form>
  ";