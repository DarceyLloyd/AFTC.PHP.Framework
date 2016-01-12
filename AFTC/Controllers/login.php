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

use AFTC\Framework\App\Models\ModelLogin;


class Login extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $encryption;
	private $session;
	private $cookie;
	private $model;

	private $postback = 0;
	private $email = "";
	private $password = "";

	private $db;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
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
		$this->encryption = new Encryption();
		$this->cookie = new Cookie();
		$this->session = new Session();
		
		$sid = Config::$salt1 . Utils::getUserIP() . Config::$salt2 . $_SERVER['HTTP_USER_AGENT'] . Config::$salt3;
		
		$this->session->set("sid",$sid);
		$this->session->set("email",$this->email);
		$this->session->set("state","logged in");
		$this->session->set("user_id",1);
		$this->session->set("user_group_id","1");
		$this->session->set("access_level","admin");

		//Cookie::set("sid",$sid);
		$this->cookie->set("sid",$sid);
		$this->cookie->set("email",$this->email);


		$this->model = new ModelLogin();

		$result = $this->model->test("darcey.lloyd@gmail.com",md5("1234"));
		//trace("Query took [" . $this->models["login"]->getQueryTime() . "]");
		//trace($result["Name"]);
		trace($this->model->getNumRows());
		echo($this->model->query2HTML());

		//$db = Database::getInstance();
		//echo($db->driver->query2HTML());


		//header("location:home");
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

		$this->data["content title"] = "Login page security details";

		$this->data["content"] .= dumpSession();
		$this->data["content"] .= dumpCookies();
		$this->data["content view"] = $this->loadView("login.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>