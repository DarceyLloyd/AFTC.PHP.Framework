<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

use AFTC\Framework\Core\Controller as Controller;

use AFTC\Framework\Utilities as Utils;
use AFTC\Framework\Config as Config;
use AFTC\Framework\Helpers\Encryption as Encryption;
use AFTC\Framework\Helpers\Session as Session;
use AFTC\Framework\Helpers\Cookie as Cookie;

class login extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $postback = 0;
	private $email = "";
	private $password = "";
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function init()
	{
		$this->postback = getPost("postback");
		$this->email = getPost("email");
		$this->password = getPost("password");

		if ($this->postback == 1){
			$this->loadHelper("encryption");
			$this->loadHelper("session");
			$this->loadHelper("cookie");
			$this->processLogin();
		} else {
			$this->showLoginPage();
		}
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
	
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function processLogin()
	{
		$sid = Utils::getUserIP() . $_SERVER['HTTP_USER_AGENT'];

		$this->helpers["session"]->set("sid",$sid);
		$this->helpers["session"]->set("email",$this->email);
		$this->helpers["session"]->set("state","logged in");
		$this->helpers["session"]->set("user_id",1);
		$this->helpers["session"]->set("user_group_id","1");
		$this->helpers["session"]->set("access_level","admin");

		//Cookie::set("sid",$sid);
		$this->helpers["cookie"]->set("sid",$sid);
		$this->helpers["cookie"]->set("email",$this->email);

		header("location:home");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function showLoginPage()
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

		$this->data["content title"] = "Home page security details";

		$this->data["content"] .= dumpSession();
		$this->data["content"] .= dumpCookies();
		$this->data["content view"] = $this->loadView("login.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>