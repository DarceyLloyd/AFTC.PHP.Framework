<div class="container-centering-outer">
	<div class="container-centering-inner">
		<div id="header">
			<div class="header-left">
				<h1><a href="<?php $this->outputData("site-path"); ?>">All For The Code</a></h1>
				<a href="mailto:Darcey@AllForTheCode.co.uk" target="_blank" class="header-email">Darcey@AllForTheCode.co.uk</a>
			</div>
			<div class="header-right">
				<form id="search-form" name="search-form" onsubmit="validate_search();" class="search-form">
					<input type="text" id="search-input" name="search-input" class="search-input" placeholder="Search"/>
					<button class="btnSearch">SEARCH</button>
				</form>

				<div id="header-nav">
					<?php if ($this->data["loggedin"]) { ?>
						<ul>
							<li><a href="#"><i class="fa fa-lock"></i> Logout</a></li>
							<li><a href="#"><i class="fa fa-user"></i> MyStuff</a></li>
						</ul>
					<?php } else { ?>
						<ul>
							<li><a href="#"><i class="fa fa-sign-in"></i></i> Login</a></li>
							<li><a href="#"><i class="fa fa-database"></i> Register</a></li>
						</ul>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</div>
