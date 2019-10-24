<?php

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'application/');

//Start the Session
session_save_path(ROOT_DIR.'tmp');
session_start();

// Autoload by composer
require(ROOT_DIR .'vendor/autoload.php');

// Load env
$dotenv = new Dotenv\Dotenv(ROOT_DIR);
$dotenv->load();

// Includes
require(APP_DIR .'config/config.php');
require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/pip.php');

// General setting
define('BASE_URL', getenv('BASE_URL'));
define('SITE_TITLE', getenv('SITE_TITLE'));
define('UPLOAD_FOLDER', getenv('UPLOAD_FOLDER'));
define('UPLOAD_TMP_FOLDER', getenv('UPLOAD_TMP_FOLDER'));
date_default_timezone_set("Asia/Kuala_Lumpur");

// Database setting
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));

// Set language
$session = new EasyCSRF\NativeSessionProvider();
if(!$session->get('lang')){
	setcookie('lang', 'my', time() + (3600 * 24 * 30));
	$session->set('lang', 'my');
}

$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];

$controller = new Controller();
$languageFile = $controller->loadHelper('Lang_helper');
$languageFile->createLanguageFile($session->get('lang'));

pip();