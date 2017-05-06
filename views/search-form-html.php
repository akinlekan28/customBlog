<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/2/2017
 * Time: 9:34 AM
 */

return "
<style>
 #search-bar {
   float: right;
   margin-top: -5px;
 }
</style>
<aside id='search-bar'>
  <form method='post' action='index.php?page=search'>
    <input type='search' name='search-term' />
    <input type='submit' value='Search'>
  </form>
</aside>
";