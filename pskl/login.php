<?php 
include_once("include/config.php");	
include_once("model/Auth.php");	

header("Content-type: text/JSON"); 

// get parameter
$apiKey = $_POST['api_key'];
$authUser = $_POST['username'];
$authPwd = $_POST['password'];

// verify api key
if ($apiKey != $APP_API_KEY) {
	echo json_encode(Array('error' => '404','message' => 'Invalid API Key.'));
	http_response_code(404);
	return;
}

if (empty($authUser)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid username'));
	return;
}


// verify password
$objAuth = new Auth($dbHostname, $dbUsername, $dbPassword, $dbName);

$result = $objAuth->verifyUserPassword($authUser, $authPwd);
if (!$result) {
	echo json_encode(Array('error' => '404','message' => 'Authentication failed..'));
	http_response_code(404);
	return;
}

echo json_encode(Array('userid' => intval($result["user_id"]), 'email' => $authUser, 'name' => $result["nama_penuh"], 'nric' => $result["ic_passport"], 'address' => $result["alamat"],'postcode' => $result["poskod"], 'housephone' => $result["telefon_rumah"], 'officephone' => $result["telefon_pejabat"], 'mobile' => $result["telefon_bimbit"], 'last_update' => $result["last_update"], 'auth_key' => $result["auth_key"]));

return;
// END JSON


?>