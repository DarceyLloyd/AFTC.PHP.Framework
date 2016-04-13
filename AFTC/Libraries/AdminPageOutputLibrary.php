<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 22/02/2016
 */

namespace AFTC\Framework\App\Libraries;

use AFTC\Framework\App\Variables;
use AFTC\Framework\Config;
use AFTC\Framework\Core\Controller;

class AdminPageOutputLibrary extends Controller
{

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	protected $security;
	protected $encryption;
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function __construct()
	{

	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public function generatePage()
	{
		if (!$this->security){
			$this->security = new SecurityLibrary("admin",false);
		}

		if (!$this->encryption){
			$this->encryption = new EncryptionLibrary();
		}

		// vars for view use
		$this->data["loggedin"] = $this->security->isLoggedin();
		$this->data["user"] = $this->security->isUser();
		$this->data["admin"] = $this->security->isAdmin();

		$this->data["postback_code"] = $this->security->getPostbackCode();


		$this->data["site-path"] = Config::$root_absolute_path;

		if ($this->getData("browser-title") != "") {
			$this->data["browser title"] = Variables::$browser_title . " > " . $this->data["browser-title"];
		} else {
			$this->data["browser title"] = Variables::$browser_title;
		}

		// Custom css & js
		$this->data["page-specific-css-includes"] = $this->cssIncludes($this->data["css-includes"]);
		$this->data["page-specific-js-includes"] = $this->jsIncludes($this->data["js-includes"]);

		// View template components
		$this->data["icons"] = $this->loadView("Templates/Admin/icons.php");
		$this->data["css-includes"] = $this->loadView("Templates/Admin/css_includes.php");
		$this->data["javascript-includes"] = $this->loadView("Templates/Admin/js_includes.php");
		$this->data["html5-shim"] = $this->loadView("Templates/Admin/html5_shim.php");
		$this->data["browser-upgrade"] = $this->loadView("Templates/Admin/browser_upgrade.php");
		$this->data["header"] = $this->loadView("Templates/Admin/header.php");
		$this->data["footer"] = $this->loadView("Templates/Admin/footer.php");


		// View template
		$this->data["column-1"] = $this->loadView($this->data["column-views"][0]);
		$this->data["column-2"] = $this->loadView($this->data["column-views"][1]);
		$this->html = $this->loadView("Templates/Admin/Template2ColumnSL.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}