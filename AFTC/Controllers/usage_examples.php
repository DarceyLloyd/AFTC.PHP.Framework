<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 12/11/2015
 */

use AFTC\Framework\Core\Controller as Controller;

use AFTC\Framework\Config as Config;
/*
use AFTC\Framework\Config as Config;
use AFTC\Framework\Utilities as Utils;
use AFTC\Framework\Helpers\Session as Session;
use AFTC\Framework\Helpers\Cookie as Cookie;
use AFTC\Framework\Helpers\Encryption as Encryption;
*/


class usage_examples extends Controller
{
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{
		$this->loadHelper("encryption");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function init()
	{
		// Var ini
		$this->data["content"] = "";

		// Set some data for the view template to use
		$this->data["browser title"] = "usage examples";

		// Does this view/page require any custom css includes?
		//$this->addCSSInclude("includes/css/welcome1.css");

		// Does this view/page require any custom js includes?
		//$this->addJSInclude("includes/js/welcome1.js");

		$this->data["header"] = $this->loadView("header.php");
		$this->data["nav"] = $this->loadView("nav.php");
		$this->data["footer"] = $this->loadView("footer.php");

		$this->data["content title"] = "Usage examples";

		$StringToEncrypt = "Darcey@AllForTheCode.co.uk";
		$EncryptedStringMethod1 = $this->helpers["encryption"]->encrypt($StringToEncrypt);
		$DecryptedStringMethod1 = $this->helpers["encryption"]->decrypt($EncryptedStringMethod1);
		$EncryptedStringMethod2 = $this->helpers["encryption"]->ecbEncrypt($StringToEncrypt);
		$DecryptedStringMethod2 = $this->helpers["encryption"]->ecbDecrypt($EncryptedStringMethod2);

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


		$this->data["database example"] = "TO DO";
		$this->data["content view"] = $this->loadView("usage_examples.php");

		$this->html = $this->loadView("template.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}
?>