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


class usage_examples extends Controller
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
		$this->encryption = new Encryption();
		$this->cookie = new Cookie();
		$this->session = new Session();

		$StringToEncrypt = "Darcey@AllForTheCode.co.uk";
		$EncryptedStringMethod1 = $this->encryption->encrypt($StringToEncrypt);
		$DecryptedStringMethod1 = $this->encryption->decrypt($EncryptedStringMethod1);
		$EncryptedStringMethod2 = $this->encryption->ecbEncrypt($StringToEncrypt);
		$DecryptedStringMethod2 = $this->encryption->ecbDecrypt($EncryptedStringMethod2);


		$this->data["encryption content"] = "";

		$this->data["encryption content"] .= "<p>Method 1 - Rotating encryption (refresh page to see rotation)</p>";
		$this->data["encryption content"] .= "<ul>";
		$this->data["encryption content"] .= "<li>\$StringToEncrypt = " . $StringToEncrypt . "</li>";
		$this->data["encryption content"] .= "<li>\$EncryptedStringMethod1 = " . $EncryptedStringMethod1 . "</li>";
		$this->data["encryption content"] .= "<li>\$DecryptedStringMethod1 = " . $DecryptedStringMethod1 . "</li>";
		$this->data["encryption content"] .= "</ul>";

		$this->data["encryption content"] .= "<p>Method 2 - Non-rotating encryption</p>";
		$this->data["encryption content"] .= "<ul>";
		$this->data["encryption content"] .= "<li>\$StringToEncrypt = " . $StringToEncrypt . "</li>";
		$this->data["encryption content"] .= "<li>\$EncryptedStringMethod2 = " . $EncryptedStringMethod2 . "</li>";
		$this->data["encryption content"] .= "<li>\$DecryptedStringMethod2 = " . $DecryptedStringMethod2 . "</li>";
		$this->data["encryption content"] .= "</ul>";

		$this->data["database example"] .= "- - AAA - -";


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
		$this->data["content view"] = $this->loadView("usage_examples.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>