<?php

$aftc = \AFTC\Framework\Core\AFTC::getInstance();

//var_dump($aftc->route["url"]);
$selected = array(
		"login"=>"",
		"logout"=>"",
		"home"=>"",
		"bootstrap"=>"",
		"usage_examples"=>"",
		"user_manager"=>""
);
$selected[$aftc->route["url"]] = "active";


?>

<nav class="navbar navbar-inverse navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">AFTC Framework</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="<?php echo($selected["login"]); ?>"><a href="./">Login</a></li>
				<li class="<?php echo($selected["logout"]); ?>"><a href="logout">Logout</a></li>
				<li class="<?php echo($selected["home"]); ?>"><a href="home">home</a></li>
				<li class="<?php echo($selected["usage_examples"]); ?>"><a href="usage_examples">usage examples</a></li>
				<li class="<?php echo($selected["bootstrap"]); ?>"><a href="bootstrap">bootstrap</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MENU <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="<?php echo($selected["login"]); ?>"><a href="./">Login</a></li>
						<li class="<?php echo($selected["logout"]); ?>"><a href="logout">Logout</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Content</li>
						<li class="<?php echo($selected["home"]); ?>"><a href="home">Home</a></li>
						<li class="<?php echo($selected["usage_examples"]); ?>"><a href="usage_examples">usage examples</a></li>
						<li class="<?php echo($selected["bootstrap"]); ?>"><a href="bootstrap">Bootstrap</a></li>
						<li role="separator" class="divider"></li>
						<li class="<?php echo($selected["user_manager"]); ?>"><a href="user_manager">User manager</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>