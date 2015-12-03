<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */
//use AFTC\Framework\Core\AFTC as AFTC;
use AFTC\Framework\Core\Controller as Controller;
use AFTC\Framework\Config as Config;

?>
<!doctype html>
<html lang="en">
<head>
	<title><?php echo($this->data["browser title"]); ?></title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

	<!-- meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="AFTC Framework">
	<meta name="keywords" content="aftc framework,AFTC Framework,aftc,framework,php" />
	<meta name="author" content="Darcey@AllForTheCode.co.uk" />

	<meta name="robots" content="all, index, follow" />

	<!-- facebook meta -->
	<meta property="og:title" content="AFTC Framework" />
	<meta property="og:site_name" content="AFTC GIFS"/>
	<meta property="og:site_name" content="My Favorite News"/>
	<meta property="og:url" content="https://github.com/DarceyLloyd/AFTC_PHP_Framework" />
	<meta property="og:description" content="AFTC Framework" />
	<meta property="og:image" content="http://www.allforthecode.co.uk/fun/gifs/11.gif" />

	<meta name="google-site-verification" content="" />
	<link rel="canonical" href="http://www.allforthecode.co.uk/" />

	<!-- JS
	<script type="application/javascript" src="[[root]]includes/js/global1.js"></script>
	<script type="application/javascript" src="[[root path]]includes/js/global2.js"></script>
	<script type="application/javascript" src="[[root url]]/includes/js/global3.js"></script>
	<script type="application/javascript" src="[[root relative path]]includes/js/global4.js"></script>-->

	<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="<?php echo(Config::$root_relative_path); ?>includes/css/base.css"/>

	[[css includes]]
	[[js includes]]

	<?php

	?>

</head>
<body>

<div id="outer_container">
	<div id="inner_container">


		<div id="header">
			<?php echo($this->data["header"]); ?>
		</div>

		<div id="nav">
			<?php echo($this->data["nav"]); ?>
		</div>

		<div id="content_container">
			<?php echo($this->data["content"]); ?>
		</div>

		<div id="footer">
			<?php echo($this->data["footer"]); ?>
		</div>

	</div>
</div>

</body>
</html>
