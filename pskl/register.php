<?php 
include_once("include/config.php");	
include_once("model/User.php");	
include_once("model/Auth.php");	

header("Content-type: text/JSON"); 

$email = $_POST['email'];
if (empty($email)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid email'));
	return;
}

$name = $_POST['name'];
if (empty($name)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid name'));
	return;
}

$password = $_POST['password'];
if (empty($password)) {
	echo json_encode(Array('error' => '404','message' => 'Invalid password'));
	return;
}

$object=new User($dbHostname, $dbUsername, $dbPassword, $dbName);
$result = $object->findByEmail($email);


// START JSON
if($result != 'false' && $result != '') {
	echo json_encode(Array('code' => '404','message' => 'Email already exist['.$email.'|'.$result.']'));
} else {
	$data = Array('email' => $email,
				'name' => $name,
				'password' => $password
				);
	//var_dump($data);

	$result = $object->add($data);
	//var_dump($result);
	if($result == 'false') {
		echo json_encode(Array('code' => '404','message' => 'Failed'));
	} else {
		$objResult = json_decode($result);
		echo json_encode(Array('code' => '200', 'userid' => $result, 'message' => 'Successful'));
	}
}

return;
// END JSON


?>