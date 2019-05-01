<?php
// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'app/');

require(ROOT_DIR .'vendor/autoload.php');

// Load env
$dotenv = new Dotenv\Dotenv(ROOT_DIR);
$dotenv->load();

use Aura\Sql\ExtendedPdo;
$pdo = new ExtendedPdo(
    'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').'',
    ''.getenv('DB_USER').'',
    ''.getenv('DB_PASS').'',
    [], // driver attributes/options as key-value pairs
    []  // queries to execute after connection
);

$json = [];

switch($_GET['action']) {

	case 'gred':
		if(isset($_GET['q'])){
			
			$sql = "SELECT id, gred_jawatan as text FROM user_profile WHERE gred_jawatan = :q LIMIT 1";
			$bind = array('q' => $_GET['q']);
			$row = $pdo->fetchAssoc($sql, $bind);

			try{	
				foreach ($row as $value) {
					$json[] = ['id'=>$value['id'], 'text'=>$value['text']];
				}
			}
			catch(Exception $e){
				return $e->getMessage();
			}
		}
		else{
			$sql = "SELECT id, gred_jawatan as text FROM user_profile GROUP BY gred_jawatan";
			$row = $pdo->fetchAll($sql);
			
			try{	
				foreach ($row as $value) {
					$json[] = ['id'=>$value['id'], 'text'=>$value['text']];
				}
			}
			catch(Exception $e){
				return $e->getMessage();
			}
		}
		break;
}

echo json_encode($json);