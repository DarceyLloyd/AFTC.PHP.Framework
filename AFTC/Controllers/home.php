<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

use AFTC\Framework\Core\Controller as Controller;

use AFTC\Framework\Config as Config;
use AFTC\Framework\Utilities as Utils;
use AFTC\Framework\Helpers\Session as Session;
use AFTC\Framework\Helpers\Cookie as Cookie;
use AFTC\Framework\Helpers\Encryption as Encryption;


class home extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		//$this->loadHelper("SecurityCheck");
		//$this->helpers["SecurityCheck"]->checkUser("admin");


		if (isset($_SESSION["logged_in"]))
		{

		} else {
			//header("location:access_denied");
			//exit;
		}
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function init()
	{
		// Set some data for the view template to use
		$this->data["browser title"] = "home";


		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		$this->data["header"] = $this->loadView("header.php");
		$this->data["nav"] = $this->loadView("nav.php");
		$this->data["footer"] = $this->loadView("footer.php");
		$this->data["content"] = $this->loadView("home.php");


		$a = Encryption::encrypt("Darcey.Lloyd@gmail.com");
		$b = Encryption::decrypt($a);
		$this->data["content"] .= "<hr>";
		$this->data["content"] .= "key1 = " . Encryption::getKey1() . "<br>";
		$this->data["content"] .= "Darcey.Lloyd@gmail.com Encrypted = <span style='font-size:10px;'>" . $a . "</span><br>";
		$this->data["content"] .= "Encrypted decrypted = " . $b . "<br>";


		$c = Encryption::ecbEncrypt("Darcey@AllForTheCode.co.uk");
		$d = Encryption::ecbDecrypt($c);
		$this->data["content"] .= "<hr>";
		$this->data["content"] .= "key1 = " . Encryption::getKey2() . "<br>";
		$this->data["content"] .= "Darcey@AllForTheCode.co.uk Encrypted = <span style='font-size:10px;'>" . $c . "</span><br>";
		$this->data["content"] .= "Encrypted decrypted = " . $d . "<br>";


		$this->data["content"] .= "<hr>";
		$this->data["content"] .= "cookie:email = " . Cookie::get("email") . "<br>";
		//$this->data["content"] .= "session[user_ip] = " . Session::get("user_ip") . "<br>";


		//$a = \AFTC\Framework\Utilities::getSession("email");
		//$this->data["content"] .= "<hr>" . $a;

		/*
		$this->data["header"] = "";
		$this->data["nav"] = "";
		$this->data["footer"] = "";
		$this->data["content"] = "";
		*/

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>