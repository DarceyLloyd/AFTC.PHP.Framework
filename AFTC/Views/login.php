<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */
use AFTC\Framework\Core\AFTC as AFTC;

//echo( \AFTC\Framework\Config::$page_not_found );

?>


<form name="frm" id="frm" method="POST" role="form">
	<input type="hidden" name="postback" id="postback" value="1"/>

	<div class="container theme-showcase content" role="main">
		<div class="row">
			<div class="col-md-1 ">
				<h3>Login</h3>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="input-group" style="width:100%;">
					<span class="input-group-addon" id="sizing-addon2" style="width:150px;">Email</span>
					<input type="text" class="form-control" placeholder="email" aria-describedby="sizing-addon2" value="Darcey@AllForTheCode.co.uk">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="input-group" style="width:100%;">
					<span class="input-group-addon" id="sizing-addon2" style="width:150px;">Password</span>
					<input type="password" class="form-control" placeholder="password" aria-describedby="sizing-addon1" value="1234">
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<input type="submit" class="btn btn-success" value="LOGIN"/>
				<input type="button" class="btn btn-primary btn-float-right" value="REGISTER"/>
			</div>
		</div>


		<?php
		echo(dumpSession());
		echo(dumpCookies());
		?>

	</div>
</form>