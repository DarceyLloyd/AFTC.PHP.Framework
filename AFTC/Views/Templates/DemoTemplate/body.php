<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php $this->outputData("browser title"); ?></title>
		

	<?php $this->outputData("icons"); ?>

	<?php $this->outputData("generic-meta"); ?>

	<?php $this->outputData("css-includes"); ?>

	<?php $this->outputData("javascript-includes"); ?>

	<?php
	if (array_key_exists("page-specific-css-includes", $this->data)) {
		$this->outputData("page-specific-css-includes");
	}

	if (array_key_exists("page-specific-js-includes", $this->data)) {
		$this->outputData("page-specific-js-includes");
	}
	?>

	<?php $this->outputData("facebook"); ?>

	<?php $this->outputData("google"); ?>

	<?php $this->outputData("html5-shim"); ?>

</head>
<body role="document">

<div id='blanket'></div>

<?php $this->outputData("browser-upgrade"); ?>

<?php $this->outputData("header"); ?>

<?php $this->outputData("header-btm"); ?>

<?php $this->outputData("header-mobile"); ?>

<?php $this->outputData("header-print"); ?>

<form id="data" name="data" onsubmit="return false;" class="display-none">
	<input type="hidden" id="postback" name="postback" value="<?php $this->outputData("postback_code"); ?>"/>
</form>

<div id="main">
	<div class="container-centering-outer">
		<div class="container-centering-inner">
			<div class="row">
				<div class="col-1-of-2-outer">
					<div class="col-1-of-2-inner">
						<div id="aftc-nav">
							<div class="nav-top">Menu</div>
							<?php $this->outputData("column-1"); ?>
							<div class="nav-btm"></div>
						</div>
					</div>
				</div>
				<div class="col-2-of-2-outer">
					<div class="col-2-of-2-inner">
						<?php $this->outputData("column-2"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->outputData("footer"); ?>

</body>
</html>
