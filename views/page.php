<?php
/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/3/2017
 * Time: 6:43 PM
 */
return "<!DOCTYPE html>
<html>
<head>
	<title>$pageData->title</title>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
	$pageData->scriptElement
</head>
<body>
  $pageData->content
</body>
$pageData->jquery
$pageData->bootstrapjs
</html>";