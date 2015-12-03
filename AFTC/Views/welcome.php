<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */
use AFTC\Framework\Core\AFTC as AFTC;

//echo( \AFTC\Framework\Config::$page_not_found );

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo($this->data["browser title"]); ?></title>
	<script type="application/javascript" src="[[root]]includes/js/global1.js"></script>
	<script type="application/javascript" src="[[root path]]includes/js/global2.js"></script>
	<script type="application/javascript" src="[[root url]]/includes/js/global3.js"></script>
	<script type="application/javascript" src="[[root relative path]]includes/js/global4.js"></script>
	<link type="text/css" rel="stylesheet" href="[[root path]]/includes/css/base.css"/>

	<?php

	?>

</head>
<body>

<h1>AFTC Framework - Welcome!</h1>

<p>[domain] = [[domain]]</p>
<p>[root url] = [[root url]]</p>
<p>[root relative path] = [[root relative path]]</p>
<p>[root absolute path] = [[root absolute path]]</p>
<p>$root_path_method = <?php echo(\AFTC\Framework\Config::$root_path_method); ?></p>
<p>[root path] = [[root path]]</p>
<p>[root] = [[root]]</p>
<p>$this->data["browser title"] = <?php echo($this->data["borwser title"]); ?></p>
<?php

vd($this);

?>

</body>
</html>
