<?php 
include_once("include/config.php");	
include_once("model/User.php");	
include_once("model/Auth.php");	

header("Content-type: text/JSON"); 

$userid = $_POST['userid'];
if (empty($userid)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid user id'));
	return;
}

$nric = $_POST['nric'];
if (empty($nric)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid nric'));
	return;
}

$name = $_POST['name'];
if (empty($name)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid name'));
	return;
}

$address = $_POST['address'];
if (empty($address)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid address'));
	return;
}

$postcode = $_POST['postcode'];
if (empty($postcode)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid postcode'));
	return;
}

$mobile = $_POST['mobile'];
if (empty($mobile)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid mobile'));
	return;
}

$officephone = $_POST['officephone'];
if (empty($officephone)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid office phone'));
	return;
}

$housephone = $_POST['housephone'];
if (empty($housephone)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid house phone'));
	return;
}

$email = $_POST['email'];
if (empty($email)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid email'));
	return;
}

$object=new User($dbHostname, $dbUsername, $dbPassword, $dbName);
$result = $object->getUser($userid);

// START JSON
if($result != 'false' && $result != '') {
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
	//var_dump($data);

	$result = $object->updateProfile($data);

	//var_dump($result);
	if($result == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Failed'));
	} else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'userid' => $result, 'message' => 'Successful'));
	}
} else {
	echo json_encode(Array('code' => '404','message' => 'Email not exist['.$email.']'));
}

return;
// END JSON


?>