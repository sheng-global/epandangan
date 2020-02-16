<?php 
	#error_reporting(E_ALL ^ E_NOTICE);
	session_start();

    // Defines
    define('ROOT_DIR', realpath(dirname(__DIR__)) .'/');
    define('ROOT_PRIVATE', realpath(ROOT_DIR . '/../'));

    // Autoload by composer
    require(ROOT_PRIVATE .'/vendor/autoload.php');

    // Load env
    $dotenv = new Dotenv\Dotenv(ROOT_PRIVATE);
    $dotenv->load();

    // These variables define the connection information for your MySQL database 
    $dbUsername = getenv('DB_USER'); 
    $dbPassword = getenv('DB_PASS'); 
    $dbHostname = getenv('DB_HOST'); 
    $dbName = getenv('DB_NAME'); 
    
    $APP_API_KEY = getenv('API_KEY');
    
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
    try {
	    $db = new PDO("mysql:host={$dbHostname};dbname={$dbName};charset=utf8", $dbUsername, $dbPassword, $options);
	} 
    catch(PDOException $ex){
	    die("Failed to connect to the database: " . $ex->getMessage());
	}
	 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

?>