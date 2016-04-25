<?php

use AFTC\Framework\Config as Config;

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// NOTE: If you want to turn on / off page generation times please see index.php in project root
Config::$show_page_generation_time = true;
Config::$page_generation_time_logging = true;
Config::$page_generation_time_append_string = " Site hosted with xxxxx.";

Config::$server_root_path = "";

Config::$domain_dev = "http://127.0.0.1";
Config::$domain_live = "http://framework.aftc.co.uk";

// Full url to the root of your website
Config::$root_url_dev = "http://127.0.0.1/Dev/AFTC_PHP_Framework/www";
Config::$root_url_live = "http://framework.aftc.co.uk";

// Relative html path to the root of your website / AFTC Framework installation
Config::$root_relative_path_dev = "./";
Config::$root_relative_path_live = "./";

// Absolute html path to the root of your website / AFTC Framework installation
// WARNING: Always ensure your path for dev and live end with a "/"
Config::$root_absolute_path_dev = "/Dev/AFTC_PHP_Framework/www";
Config::$root_absolute_path_live = "/";

// When using AFTC view commands this will change whether it uses
Config::$path_method = "relative"; // relative || absolute || url && *

// Configure your 404 page not found here (The AFTC Framework router will use this)
Config::$page_not_found = "404.htm";

// Configure sessions
Config::$enable_sessions = true;
Config::$session_https = false;
Config::$session_http_only = true; // This stops javascript being able to access the session id
Config::$session_name = "AFTC";
Config::$cookie_expiration_time = 1440; // Time in hours

// Security (used by Security helper for saled hashed password string generation for unsalted php7 compliant password_hash function use)
Config::$password_hashing_cost = 12; // MUST BE 4 AND ABOVE. WARNING: NUMBERS OVER 10 CAN SLOW DOWN PAGE GENERATION TIME CONSIDERABLY!!

// DB Driver
Config::$database_driver = "pdo"; // PDO || MySQLi (TODO)

// Live database configuration
Config::$database_live_host = "xxxxxxxxxxxxxxxxxxxxxx";
Config::$database_live_port = "xxxxxxxxxxxxxxxxxxxxxx";
Config::$database_live_name = "xxxxxxxxxxxxxxxxxxxxxx";
Config::$database_live_username = "xxxxxxxxxxxxxxxxxxxxxx";
Config::$database_live_password = "xxxxxxxxxxxxxxxxxxxxxx";

// Dev database configuration
Config::$database_dev_host = "127.0.0.1"; // There's no place like home
Config::$database_dev_port = "3306";
Config::$database_dev_name = "aftc_framework";
Config::$database_dev_username = "root";
Config::$database_dev_password = "1234";