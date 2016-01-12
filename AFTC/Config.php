<?php
/**
 * Author: Darcey Lloyd
 * Email: Darcey@AllForTheCode.co.uk
 * Date: 10/2015
 */

use AFTC\Framework\Config as Config;

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Config::$show_page_generation_time = true;
Config::$server_root_path = "";

// Can be injected into your views via [[domain]]
Config::$domain_dev = "http://127.0.0.1";
//Config::$domain_live = "http://dev.aftc.co.uk";
Config::$domain_live = "http://framework.aftc.co.uk";

// Full url to the root of your website, can be injectd into your views via [[root url]]
Config::$root_url_dev = "http://127.0.0.1/Dev/AFTC_PHP_Framework/www";
//Config::$root_url_live = "http://dev.aftc.co.uk/php/aftc_php_framework";
Config::$root_url_live = "http://framework.aftc.co.uk";

// Relative html path to the root of your website / AFTC Framework installation
// Leave blank if your webiste root is the root of your webserver eg public_html/httpdocs etc
// Can be injectd into your views via [[root relative path]]
Config::$root_relative_path_dev = "./";
Config::$root_relative_path_live = "./";

// Absolute html path to the root of your website / AFTC Framework installation
// Leave blank if your webiste root is the root of your webserver eg public_html/httpdocs etc
// Can be injectd into your views via [[root absolute path]]
Config::$root_absolute_path_dev = "/Dev/AFTC_PHP_Framework/www";
//Config::$root_absolute_path_live = "/php/aftc_php_framework";
Config::$root_absolute_path_live = "/";

// When using AFTC view commands this will change whether it uses
// $root_url or $root_relative_path or $_root_absolute_path for [[root path]] || [[root]]
Config::$path_method = "relative"; // relative || absolute || url && *

// Configure your 404 page not found here (The AFTC Framework router will use this)
Config::$page_not_found = "404.htm";

// Configure sessions
Config::$enable_sessions = true;
Config::$session_https = false;
Config::$session_http_only = true; // This stops javascript being able to access the session id
Config::$session_name = "AFTC";
Config::$cookie_expiration_time = 48; // Time in hours

// Additional security values (salt 1,2 & 3)
Config::$salt1 = "SALT1";
Config::$salt2 = "SALT2";
Config::$salt3 = "SALT3";

// DB Driver
Config::$database_driver = "pdo"; // PDO || MySQLi (direct query or manual bind in model)

// Live database configuration
Config::$database_live_host = "10.169.0.61";
Config::$database_live_port = "3306";
Config::$database_live_name = "framewor3_aftcdev";
Config::$database_live_username = "framewor3_aftcd1";
Config::$database_live_password = "moonpigdelivers";

// Dev database configuration
Config::$database_dev_host = "127.0.0.1"; // There's no place like home
Config::$database_dev_port = "3306";
Config::$database_dev_name = "aftc_framework";
Config::$database_dev_username = "root";
Config::$database_dev_password = "1234";



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// YOU SHOULD NOT NEED TO CHANGE ANYTHING PAST THIS POINT
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Used by the AFTC Framework for includes, you should only need to alter this if you are changing the structure of the AFTC Framework
//Config::$server_root_path = "";
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -