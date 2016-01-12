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

use AFTC\Framework\App\Helpers\Encryption;
use AFTC\Framework\App\Helpers\Cookie;
use AFTC\Framework\App\Helpers\Session;

//use AFTC\Framework\App\Models\ModelLogin;


class Logout extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $encryption;
	private $session;
	private $cookie;
	private $model;

	private $db;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		// Helpers
		$this->encryption = new Encryption();
		$this->cookie = new Cookie();
		$this->session = new Session();

		// Reset
		$this->session->set("sid",null);
		$this->session->set("email",null);
		$this->session->set("state",null);
		$this->session->set("user_id",null);
		$this->session->set("user_group_id",null);
		$this->session->set("access_level",null);

		$this->session->destroySession();

		$this->cookie->set("sid",null);
		$this->cookie->set("email",null);
		$this->cookie->deleteAll();

		// Var ini
		$this->data["content"] = "";

		// Set some data for the view template to use
		$this->data["browser title"] = "Logout";

		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		$this->data["header"] = $this->loadView("header.php");

		$this->data["nav"] = $this->loadView("nav.php");
		$this->data["footer"] = $this->loadView("footer.php");

		$this->data["content title"] = "Logout page security details";

		$this->data["content"] .= dumpSession();
		$this->data["content"] .= dumpCookies();
		$this->data["content view"] = $this->loadView("logout.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>