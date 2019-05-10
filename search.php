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
			
			$sql = "SELECT id, gred_jawatan as text FROM user_profile WHERE gred_jawatan = :q";
			$bind = array('q' => "%".$_GET['q']."%");
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

	case 'jabatan':
		if(isset($_GET['q'])){
			
			$sql = "SELECT kod_jabatan AS id, jabatan as text FROM view_jabatan WHERE jabatan LIKE :q";
			$bind = array('q' => "%".$_GET['q']."%");
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
			$sql = "SELECT kod_jabatan AS id, jabatan as text FROM view_jabatan";
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

	case 'nama':

		if(isset($_GET['q'])){
			
			$sql = "SELECT id, full_name as text FROM user_profile WHERE full_name LIKE :q";
			$bind = array('q' => "%".$_GET['q']."%");
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
			$sql = "SELECT id, full_name as text FROM user_profile";
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

	case 'namaKewangan':

		if(isset($_GET['q'])){
			
			$sql = "SELECT id, full_name as text FROM user_profile WHERE gred_jawatan LIKE :gred_jawatan AND full_name LIKE :q";
			$bind = array(
				'gred_jawatan' => "%W%",
				'q' => "%".$_GET['q']."%"
			);
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
			$sql = "SELECT id, full_name as text FROM user_profile WHERE gred_jawatan LIKE :gred_jawatan";
			$bind = array(
				'gred_jawatan' => "%W%"
			);
			$row = $pdo->fetchAll($sql, $bind);
			
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

	case 'wanitaOnly':

		if(isset($_GET['q'])){
			
			$sql = "SELECT id, full_name as text FROM user_profile where RIGHT(ic_passport,1) REGEXP '[0-9]*[02468]' AND full_name LIKE :q";
			$bind = array(
				'ic_passport' => "%W%",
				'q' => "%".$_GET['q']."%"
			);
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
			$sql = "SELECT id, full_name as text FROM user_profile where RIGHT(ic_passport,1) REGEXP '[0-9]*[02468]'";
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