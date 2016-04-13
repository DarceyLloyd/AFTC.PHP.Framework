<?php
// Error configuration
//error_reporting(-1); // Report all PHP errors dev server only!
//error_reporting(0); // Turn off all error reporting live server only!

// Page render time var
$before = microtime(true);

// Autoload namespace method
// composer dumpautoload -o
require_once(__DIR__ . "/vendor/autoload.php");
use AFTC\Framework\Core\AFTC;

// Instantiate the AFTC Framework (Singleton)
$aftc = AFTC::getInstance();
$aftc->processRoute();

use AFTC\Framework\Core\Database;
$db = Database::getInstance();
if ($db->isConnected()){
	$db->disconnect();
	unset($db);
	$db = null;
}

// Page render time end
$show_page_generation_time = \AFTC\Framework\Config::$show_page_generation_time;
if ($show_page_generation_time) {
	$sec = number_format((microtime(true) - $before), 4);
	$html = "<div id='AFTCFrameworkPageRenderTime' style='";
	$html .= "display:table; margin: 15px 5px 15px 0px; padding:2px; border:2px solid #BBBBBB; ";
	$html .= "background:#CCCCCC; color:#666666; font-family:arial; font-size:11px; margin: 10px 0 0 0";
	$html .= "'>";
	$html .= "AFTC Framework: Page was generated in " . $sec . " seconds";
	$html .= "</div>";
	echo($html);
}
