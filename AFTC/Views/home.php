<?php


?>




<div class="container theme-showcase content" role="main">


	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo($this->data["content title"]); ?></h3>
				</div>
				<div class="panel-body">

					<?php echo($this->data["content"]); ?>

					<div id="cookieDump"></div>
					<script>
						dumpCookies("cookieDump");
					</script>
				</div>
			</div>
		</div>
	</div>



	<?php
	echo(dumpSession());
	echo(dumpCookies());
	?>


</div> <!-- /container -->