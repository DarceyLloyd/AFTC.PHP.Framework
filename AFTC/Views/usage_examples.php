<?php


?>




<div class="container theme-showcase content" role="main">

	<div class="well">
		<h3><?php echo($this->data["content title"]); ?></h3>

		<p>Examples on how to use:</p>
		<ul>
			<li>Encryption</li>
			<li>Encrypted sessions</li>
			<li>Encrypted cookies</li>
			<li>Database usage via PDO</li>
		</ul>
	</div>


	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Encryption example</h3>
				</div>
				<div class="panel-body">
					<h4>Encryption keys</h4>
					There are two methods of encryption used by the AFTC Framework, one rotates and the other doesn't and each uses it's own unique key.</h4>
					<p>The keys are stored in two files called key1 and key2 in the AFTC folder, they are created automatically if they are not found.</p>

					<div class="alert alert-success" role="alert">
						<strong>USAGE TIP 1:</strong> Deleting files "key1" and "key2" when you want to update the encryption keys.<br>
						<strong>USAGE TIP 2:</strong> Use ecbEncrypt & ecbDecrypt for associative keys, use encrypt & decrypt for everything else.
					</div>

					<pre>
$this->loadHelper("encryption");

// Rotating encryption
$this->helpers["encryption"]->encrypt("value");
$this->helpers["encryption"]->decrypt("value");

// Non-rotating encryption
$this->helpers["encryption"]->ecbEncrypt("value");
$this->helpers["encryption"]->ecbDecrypt("value");

// Other
$this->helpers["encryption"]->destory();
					</pre>
					<?php echo($this->data["encryption content"]); ?>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Session example</h3>
				</div>
				<div class="panel-body">
					<pre>
// Loading helpers
$this->loadHelper("encryption"); // The encryption helper is a dependency for the session helper
$this->loadHelper("session");

// Usage
$this->helpers["session"]->set("key","value");
$this->helpers["session"]->get("key");
$this->helpers["session"]->destory();

// Other
echo(dumpSession());
					</pre>
					<?php
						echo(dumpSession());
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Cookie example</h3>
				</div>
				<div class="panel-body">
					<pre>
// Loading helpers
$this->loadHelper("encryption"); // The encryption helper is a dependency for the session helper
$this->loadHelper("cookie");

// Usage
$this->helpers["cookie"]->set("key","value");
$this->helpers["cookie"]->get("key");

//Other
echo(dumpCookies());

// JavaScript AFTC.js utility function
&lt;div id=&quot;cookieDump&quot;&gt;&lt;/div&gt;
dumpCookies("cookieDump");
					</pre>
					<?php
					echo(dumpCookies());
					?>
					<div id="cookieDump"></div>
					<script>dumpCookies("cookieDump");</script>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Database example</h3>
				</div>
				<div class="panel-body">
					<pre>
// Loading helpers
$this->database->connect();

// Usage
$this->helpers["cookie"]->set("key","value");
$this->helpers["cookie"]->get("key");

//Other
echo(queryToTable());
					</pre>

					<div class="alert alert-success" role="alert">
						<strong>USAGE:</strong> Configure your database settings in Config.php
					</div>

					<?php echo($this->data["database example"]); ?>
				</div>
			</div>
		</div>
	</div>


</div> <!-- /container -->