<?php
/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */
use AFTC\Framework\Core\AFTC as AFTC;

//echo( \AFTC\Framework\Config::$page_not_found );

?>
<form name="frm" id="frm" method="POST">
	<input type="hidden" name="postback" id="postback" value="1"/>

	<label for="email">Email:</label>
	<input type="text" name="email" id="email" value="Darcey@AllForTheCode.co.uk"/>

	<label for="email">Password:</label>
	<input type="password" name="password" id="password" value="1234"/>

	<input type="submit" value="LOGIN"/>
</form>

<?php
	echo(dumpSession());
?>