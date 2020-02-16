<?php 
include_once("include/config.php");	
include_once("model/Pandangan.php");	

header("Content-type: text/json"); 

$object=new Pandangan($dbHostname, $dbUsername, $dbPassword, $dbName);

//echo $query;
$results = $object->getPandangans(); 

// JSON
echo $results;
return;

?>