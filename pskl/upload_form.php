<?php 
include_once("include/config.php");	
include_once("model/Pandangan.php");	
include_once("model/Auth.php");	

header("Content-type: text/JSON"); 

$userid = $_POST['userid'];
if (empty($userid)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid user id'));
	return;
}

/*
$server_form_id = $_POST['server_form_id'];
if (empty($server_form_id)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid server form id'));
	return;
}

$agency = $_POST['agency'];
if (empty($agency)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid agency'));
	return;
}
*/

$object=new Pandangan($dbHostname, $dbUsername, $dbPassword, $dbName);
$result = $object->getForm($server_form_id);

// START JSON
if($result != 'false' && $result != '') {
	/*
	$data = Array('userid' => $userid,
				'name' => $name,
				'nric' => $nric,
				'address' => $address,
				'postcode' => $postcode,
				'mobile' => $mobile,
				'officephone' => $officephone,
				'housephone' => $housephone,
				'email' => $email
				);
	*/
	$data = $_POST['agency'];
	//var_dump($data);

	$result = $object->updateForm($data);

	//var_dump($result);
	if($result == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Failed'));
	} else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'userid' => $result, 'message' => 'Update successful'));
	}
} else {
	$data = $_POST['agency'];
	//var_dump($data);

	$result = $object->addForm($data);

	//var_dump($result);
	if($result == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Failed'));
	} else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'userid' => $result, 'message' => 'Add successful'));
	}
}

return;
// END JSON


?>