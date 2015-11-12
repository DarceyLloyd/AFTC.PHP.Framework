<?php
/**
 * Author: Darcey Lloyd
 * Email: Darcey@AllForTheCode.co.uk
 * Date: 10/2015
 */

use AFTC\Framework\Config as Config;
Config::init();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Config::$show_page_generation_time = true;

// Can be injected into your views via [[domain]]
Config::$domain = "www.allforthecode.co.uk";

// Can be injectd into your views via [[root url]]
Config::$root_url = "http://127.0.0.1/TheresNoPlaceLikeHome";

// Can be injectd into your views via [[relative root]]  (NOTE: use leading / to get to root of your domain)
Config::$root_relative_path = "/TheresNoPlaceLikeHome"; // Leave blank if your webiste root is the root of your webserver (public_html/httpdocs etc)



//Config::$website_root_file_path = ""; \\ You should not need to modify this, however if you do, here it is
//Config::$website_root_file_path = __DIR__ . "\\"; // NOTE Added \ at end so I can easily remove AFTC dir from end as we need root
//Config::$website_root_file_path = str_replace("\\AFTC\\","",Config::$website_root_file_path);

Config::$page_not_found = "404.htm";

Config::$encryption_key = "+++___+++1234+++___!!!:@~@:@~}{}{&&*8asd3tsdgsdg88888csaoi98uIICZZZZZXC<>?.";

Config::$enable_sessions = true;
Config::$session_https = false;
Config::$session_http_only = true; // This stops javascript being able to access the session id
Config::$session_name = "AFTC";
Config::$cookie_expiration_time = 48; // Time in hours

Config::$live_server_domain = "www.allforthecode.co.uk";

// Live database configuration
Config::$database_live_host = "255.255.255.255";
Config::$database_live_name = "DB1";
Config::$database_live_username = "CrypticName";
Config::$database_live_password = "CrypticPassword";

// Dev database configuration
Config::$database_dev_host = "127.0.0.1"; // There's no place like home
Config::$database_dev_name = "DB1";
Config::$database_dev_username = "CrypticName";
Config::$database_dev_password = "CrypticPassword";



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// YOU SHOULD NOT NEED TO CHANGE ANYTHING PAST THIS POINT
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Used by the AFTC Framework for includes, you should only need to alter this if you are changing the structure of the AFTC Framework
//Config::$server_root_path = "";
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -