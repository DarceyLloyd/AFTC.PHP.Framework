<?php

/**
 * Author: Darcey@AllForTheCode.co.uk
 * Date: 22/02/2016
 */

namespace AFTC\Framework\App\Libraries;

use AFTC\Framework\App\Variables;
use AFTC\Framework\Config;
use AFTC\Framework\Core\Controller;

class UserPageOutputLibrary extends Controller
{

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	protected $security;
	protected $encryption;
	protected $session;
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
			$this->security = new SecurityLibrary("public",false);
		}

		if (!$this->encryption){
			$this->encryption = new EncryptionLibrary();
		}

		if (!$this->session){
			$this->session = new SessionLibrary();
		}

		// vars for view use
		$this->data["loggedin"] = $this->security->isLoggedin();
		$this->data["user"] = $this->security->isUser();
		$this->data["admin"] = $this->security->isAdmin();

		// User data
		if ($this->data["loggedin"]){
			$this->data["first_name"] = $this->session->get("first_name");
			$this->data["last_name"] = $this->session->get("last_name");
			$this->data["email"] = $this->session->get("email");
		} else {
			$this->data["first_name"] = "unknown";
			$this->data["last_name"] = "unknown";
			$this->data["email"] = "unknown@unknown.com";
		}


		$this->data["postback_code"] = $this->security->getPostbackCode();


		$this->data["server_root_path"] = Config::$server_root_path;
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
		$this->data["generic_meta"] = $this->loadView("Templates/User/generic_meta.php");
		$this->data["google"] = $this->loadView("Templates/User/google.php");
		$this->data["icons"] = $this->loadView("Templates/User/icons.php");
		$this->data["css_includes"] = $this->loadView("Templates/User/css_includes.php");
		$this->data["javascript_includes"] = $this->loadView("Templates/User/js_includes.php");
		$this->data["html5_shim"] = $this->loadView("Templates/User/html5_shim.php");
		$this->data["browser_upgrade"] = $this->loadView("Templates/User/browser_upgrade.php");
		$this->data["footer"] = $this->loadView("Templates/User/footer.php");

		// Nav
		$left_nav_html = file_get_contents(Config::$server_root_path . Config::$root_absolute_path . "data/nav.php");
		$this->data["left_nav_html"] = $left_nav_html;
		$this->data["mobile_nav"] = $this->loadView("Templates/User/mobile_nav.php");
		$this->data["header"] = $this->loadView("Templates/User/header.php");


			// View template
		$this->data["column_1"] = $left_nav_html;
		$this->data["column_2"] = $this->loadView($this->data["view"]);
		$this->html = $this->loadView("Templates/User/Template2ColumnSL.php");
	}
	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	
}