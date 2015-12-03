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

		Session::set("sid",$sid);
		Session::set("email",$this->email);
		Session::set("state","logged in");
		Session::set("user_id",1);
		Session::set("user_group_id","1");
		Session::set("access_level","admin");

		//Cookie::set("sid",$sid);
		Cookie::set("email",$this->email);

		header("location:home");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function showLoginPage()
	{
		// Set some data for the view template to use
		$this->data["browser title"] = "Login";

		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		$this->data["header"] = $this->loadView("header.php");
		$this->data["nav"] = $this->loadView("nav.php");
		$this->data["footer"] = $this->loadView("footer.php");
		$this->data["content"] = $this->loadView("login.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>