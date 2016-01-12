<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

use AFTC\Framework\Core\Controller as Controller;

use AFTC\Framework\Config;
use Defuse\Crypto\Crypto as Crypto;
use Defuse\Crypto\Exception as Ex;

class index extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function init()
	{
		// Set some data for the view template to use
		$this->data["browser title"] = "AFTC Framework v0.1";


		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		//$key = Crypto::CreateNewRandomKey();
		//file_put_contents("key",$key);

		Config::$encryption_key = file_get_contents("key");
		$key = file_get_contents("key");
		$this->data["key"] = $key;

		$a = Crypto::Encrypt("Darcey",$key);
		$b = Crypto::Decrypt($a,$key);



		//$this->data["key"] = Crypto::CreateNewRandomKey();
		//$this->data["key"] = \AFTC\Framework\Config::$encryption_key;
		$this->data["stringForEncryption"] = "Darcey@AllForTheCode.co.uk";
		$this->data["stringEncrypted"] = Crypto::Encrypt($this->data["stringForEncryption"],$this->data["key"]);
		$this->data["stringDecrypted"] = Crypto::Decrypt($this->data["stringEncrypted"],$this->data["key"]);

		$this->data["sessionStringForEncryption"] = "Darcey.Lloyd@gmail.com";
		if (isset($_SESSION["sessionStringEncrypted"])){

		} else {
			$enc = Crypto::Encrypt($this->data["sessionStringForEncryption"],$this->data["key"]);
			$_SESSION["sessionStringEncrypted"] = $enc;
			$_SESSION["sessionStringDecrypted"] = Crypto::Decrypt($enc,$this->data["key"]);
			//header("location:./");
			//exit;
		}


		var_dump($_SESSION);


		$this->html = $this->loadView("template.php");


		/**/

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>