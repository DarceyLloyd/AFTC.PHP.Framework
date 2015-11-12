<?php
/**
 * Author: Darcey Lloyd
 * Email: Darcey@AllForTheCode.co.uk
 * Date: 10/2015
 */


// Error configuration
//error_reporting(0); // Turn off all error reporting
error_reporting(-1); // Report all PHP errors


// Profiling start
$before = microtime(true);


// Autoload namespace method
//composer dumpautoload -o
require_once(__DIR__ . "/vendor/autoload.php");

// Get access to config
use AFTC\Framework\Config as Config;

// Instantiate the AFTC Framework (Singleton)
use AFTC\Framework\Core\AFTC;
$aftc = AFTC::getInstance();


// Profiling end
if (Config::$show_page_generation_time) {
	$sec = number_format((microtime(true) - $before), 4);
	$html = "<div style='";
	$html .= "display:table; margin: 15px 5px 15px 0px; padding:2px; border:2px solid #FF9900; ";
	$html .= "background:#000000; color:#FFFFFF; font-family:arial; font-size:11px;";
	$html .= "'>";
	$html .= "AFTC PHP Framework generate the page in " . $sec . " seconds";
	$html .= "</div>";
	echo($html);
}