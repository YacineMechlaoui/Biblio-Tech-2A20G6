<?php

define("WEBSITE_TITLE", 'MY SHOP');

//database name
if ($_SERVER['SERVER_NAME'] == "localhost") {
	define('DB_NAME', "eshop_db");
	define('DB_USER', "root");
	define('DB_PASS', "");
	define('DB_TYPE', "mysql");
	define('DB_HOST', "localhost");
} else {
	define('DB_NAME', "id21614106_eshop_db");
	define('DB_USER', "id21614106_root");
	define('DB_PASS', "GZ9q4;t&&YuT;s");
	define('DB_TYPE', "mysql");
	define('DB_HOST', "localhost");

}

define('THEME', 'eshop/');

define('DEBUG', true);

if (DEBUG) {

	ini_set('display_errors', 1);
} else {
	ini_set('display_errors', 0);
}
