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
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

	<!-- meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="AFTC Framework">
	<meta name="keywords" content="aftc framework,AFTC Framework,aftc,framework,php"/>
	<meta name="author" content="Darcey@AllForTheCode.co.uk"/>

	<meta name="robots" content="all, index, follow"/>

	<!-- facebook meta -->
	<meta property="og:title" content="AFTC Framework"/>
	<meta property="og:site_name" content="AFTC GIFS"/>
	<meta property="og:site_name" content="My Favorite News"/>
	<meta property="og:url" content="https://github.com/DarceyLloyd/AFTC_PHP_Framework"/>
	<meta property="og:description" content="AFTC Framework"/>
	<meta property="og:image" content="http://www.allforthecode.co.uk/fun/gifs/11.gif"/>

	<meta name="google-site-verification" content=""/>
	<link rel="canonical" href="http://www.allforthecode.co.uk/"/>

	<!-- CSS -->
	<link type="text/css" href="<?php echo(Config::$root_relative_path); ?>includes/css/aftc/aftc.css" rel="stylesheet"/>
	<link type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href="http://weloveiconfonts.com/api/?family=brandico|entypo|openwebicons|zocial" rel="stylesheet">
	<link type="text/css" href="<?php echo(Config::$root_relative_path); ?>includes/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
	<!--<link type="text/css" href="<?php echo(Config::$root_relative_path); ?>includes/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet"/>-->
	<!--<link href='http://fonts.googleapis.com/css?family=Arimo:400,700|Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
	<link type="text/css" rel="stylesheet" href="<?php echo(Config::$root_relative_path); ?>includes/css/base.css"/>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo(Config::$root_relative_path); ?>includes/js/underscore-min.js"></script>
	<script type="text/javascript" src="<?php echo(Config::$root_relative_path); ?>includes/js/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo(Config::$root_relative_path); ?>includes/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo(Config::$root_relative_path); ?>includes/js/aftc/aftc.js"></script>
	<script type="text/javascript" src="<?php echo(Config::$root_relative_path); ?>includes/js/gsap/TweenMax.min.js"></script>
	<!-- A Globally (site wide) script ready for customisation -->
	<script type="text/javascript" src="<?php echo(Config::$root_relative_path); ?>includes/js/global.js"></script>


	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<!--
	<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X','auto');ga('send','pageview');
	</script>
	-->

	<!-- Any on page javascripting should go here -->
	<!--<script type="text/javascript">
	</script>-->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php

	?>

</head>
<body role="document">

<!--[if lt IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<?php echo($this->data["nav"]); ?>


<?php echo($this->data["content view"]); ?>


<div id="footer" class="container">
	<?php echo($this->data["footer"]); ?>
</div>


</body>
</html>
