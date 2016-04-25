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


		$this->data["site_path"] = Config::$root_absolute_path;

		if ($this->getData("browser_title") != "") {
			$this->data["browser_title"] = Variables::$browser_title . " > " . $this->data["browser_title"];
		} else {
			$this->data["browser_title"] = Variables::$browser_title;
		}

		// Custom css & js
		$this->data["page_specific_css_includes"] = $this->cssIncludes($this->data["css_includes"]);
		$this->data["page_specific_js_includes"] = $this->jsIncludes($this->data["js_includes"]);

		// View template components
		$this->data["icons"] = $this->loadView("Templates/Admin/icons.php");
		$this->data["css_includes"] = $this->loadView("Templates/Admin/css_includes.php");
		$this->data["javascript_includes"] = $this->loadView("Templates/Admin/js_includes.php");
		$this->data["html5_shim"] = $this->loadView("Templates/Admin/html5_shim.php");
		$this->data["browser_upgrade"] = $this->loadView("Templates/Admin/browser_upgrade.php");
		$this->data["header"] = $this->loadView("Templates/Admin/header.php");
		$this->data["footer"] = $this->loadView("Templates/Admin/footer.php");


		// View template
		$this->data["column_1"] = $this->loadView($this->data["column-views"][0]);
		$this->data["column_2"] = $this->loadView($this->data["column-views"][1]);
		$this->html = $this->loadView("Templates/Admin/Template2ColumnSL.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}