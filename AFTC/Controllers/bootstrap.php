<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

namespace AFTC\Framework\App\Controllers;

use AFTC\Framework\Core\Controller as Controller;

use AFTC\Framework\Core\Model;
use AFTC\Framework\Utilities as Utils;
use AFTC\Framework\Config;


class bootstrap extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		// Var ini
		$this->data["content"] = "";

		// Set some data for the view template to use
		$this->data["browser title"] = "Login";

		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		$this->data["header"] = $this->loadView("header.php");

		$this->data["nav"] = $this->loadView("nav.php");
		$this->data["footer"] = $this->loadView("footer.php");

		$this->data["content title"] = "Usage example page details";

		$this->data["content"] .= dumpSession();
		$this->data["content"] .= dumpCookies();
		$this->data["content view"] = $this->loadView("bootstrap.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>