<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

use AFTC\Framework\Core\Controller as Controller;

use AFTC\Framework\Utilities as Utils;

use Defuse\Crypto\Crypto as Crypto;
use Defuse\Crypto\Exception as Ex;

class access_denied extends Controller
{

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function init()
	{
		//\AFTC\Framework\Utilities::

		//$_SESSION["logged_in"] = null;
		//Utils::destroySession();
		//session_regenerate_id(true);
		//session_regenerate_id();
		session_destroy();
		//session_unset();



		// Set some data for the view template to use
		$this->data["browser title"] = "ACCESS DENIED";


		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		// Does this view/page require any custom in page css?
		$this->css_in_page = '';

		// Does this view/page require any custom in page js?
		$this->js_in_page = '
		<script></script>';

		$this->data["header"] = $this->loadView("header.php");
		$this->data["nav"] = $this->loadView("nav.php");
		$this->data["footer"] = $this->loadView("footer.php");
		$this->data["content"] = $this->loadView("access_denied.php");
		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>