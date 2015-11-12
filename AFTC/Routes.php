<?php
/**
 * Author: Darcey Lloyd
 * Email: Darcey@AllForTheCode.co.uk
 * Date: 10/2015
 */

use AFTC\Framework\Core\Router as Router;

/**
 * USAGE:
 * $param1 = url
 * $param2 = controller file name
 * $param3 = controller function name (blank will default call the function "init" if it exists)
 * $param4 = cache (true||false - this will full cache the whole controller)
 *
 */

Router::addRoute("","index","",false);
Router::addRoute("home","home","",false);
Router::addRoute("products/red car","products/index","",false);
Router::addRoute("products/red_car","products/index","",false);
Router::addRoute("products/red-car","products/index","",false);
Router::addRoute("products/redcar","products/index","",false);