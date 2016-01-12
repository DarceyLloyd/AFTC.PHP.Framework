<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

namespace AFTC\Framework\App\Controllers\Products;

use AFTC\Framework\Core\Controller as Controller;
use AFTC\Framework\Utilities as Utils;
use AFTC\Framework\Config;
use AFTC\Framework\Core\Database;

//$path = __DIR__ . "../../Models/ModelLogin.php";
//require_once($path);
use AFTC\Framework\App\Models\Login_Model;


class Test extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private $postback = 0;
	private $email = "";
	private $password = "";

	private $db;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		trace("Test.__constrcut()");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function Test()
	{
		trace("Test()");
		//new AFTC\Framework\App\Models\Login_Model();
		//new Login_Model();



		return;
		//trace("login.login()");
		//$this->loadHelper("encryption");
		//$this->loadHelper("session");
		//$this->listAvailableHelpers();

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

		$this->getHelper("session")->set("sid",$sid);
		$this->getHelper("session")->set("email",$this->email);
		$this->getHelper("session")->set("state","logged in");
		$this->getHelper("session")->set("user_id",1);
		$this->getHelper("session")->set("user_group_id","1");
		$this->getHelper("session")->set("access_level","admin");

		//Cookie::set("sid",$sid);
		$this->getHelper("cookie")->set("sid",$sid);
		$this->getHelper("cookie")->set("email",$this->email);

		$this->loadModel("login");
		$result = $this->getModel("login")->test("darcey.lloyd@gmail.com",md5("1234"));
		//trace("Query took [" . $this->models["login"]->getQueryTime() . "]");
		//trace($result["Name"]);
		trace($this->getModel("login")->getNumRows());
		echo($this->getModel("login")->query2HTML());

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

		$this->data["content title"] = "Home page security details";

		$this->data["content"] .= dumpSession();
		$this->data["content"] .= dumpCookies();
		$this->data["content view"] = $this->loadView("login.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>