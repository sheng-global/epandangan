<?php 
include_once("include/config.php");	
include_once("model/PandanganItem.php");	

header("Content-type: text/json"); 

$object=new PandanganItem($dbHostname, $dbUsername, $dbPassword, $dbName);

//echo $query;
$results = $object->getPandanganItems(); 

// JSON
echo $results;
return;

?>