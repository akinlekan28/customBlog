<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/8/2017
 * Time: 7:12 PM
 */

$entryDataFound = isset($entryData);
if ($entryDataFound === false) {
    trigger_error('views/entry-html.php needs an $entryData object');

}
return "
<article>
  <h1>$entryData->entry_title</h1>
    <div class='date'>$entryData->date_created</div>
      <p>$entryData->entry_text</p>
</article>

<p><a href='index.php?page=blog' >Go back</a></p>";