<?php

class Auth_model extends Model {

	public function processLogin($data)
	{
		$username = $data['username'];
		$password = $data['password'];
		$error_msg = NULL;
		
		$user = $this->getUser($username);
		$result = password_verify($password, $user[0]['password']);
		$success = ($result) ? 'true': 'false';

		if(empty($result)){
			return $error_msg = "Wrong credential.";
		}else{

			if($success == 'false') {
				return $error_msg = "Wrong password.";
			}else{
				// TODO: incomplete session storage
				if(empty($user)){
					return $error_msg = "Cannot create session.";
				}else{
					return $user;
				}
			}
		}
	}

	public function processLoginVoter($data)
	{
		$error_msg = NULL;
		$user = $this->checkIC($data);

		if(empty($user)){
			return $error_msg = "No. gaji atau kad pengenalan tidak sah";
		}else{
			return $user;
		}
	}

	public function checkSMS($phone_no)
	{
		$stm  = "SELECT * FROM otp WHERE phone_number = :phone_no AND verified = '0'";
		$bind = array('phone_no' => $phone_no);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function getUser($username)
	{
		$stm  = "SELECT * FROM view_users WHERE email = :email";
		$bind = array('email' => $username);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function checkIC($data)
	{
		$stm  = "SELECT * FROM user_profile WHERE ic_passport = :ic_passport AND no_gaji = :no_gaji";
		$bind = array(
			'ic_passport' => $data['ic_passport'],
			'no_gaji' => $data['no_gaji']
		);
		$result = $this->pdo->fetchAssoc($stm, $bind);
		return $result;
	}

	public function getVoter($ic_passport)
	{
		$stm  = "SELECT * FROM user_profile WHERE ic_passport = :ic_passport";
		$bind = array('ic_passport' => $ic_passport);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	# insert otp sms
	public function insertSMS($data)
	{
		$stm  = "INSERT INTO otp (phone_number, verification_code, sessionid, messageid, last_update) VALUES (:phone_number, :verification_code, :sessionid, :messageid, :last_update)";
		$bind = array(
			'phone_number' => $data['phone_number'],
			'verification_code' => $data['verification_code'],
			'sessionid' => $data['sessionid'],
			'messageid' => $data['messageid'],
			'last_update' => $data['last_update']
		);
		$result = $this->pdo->fetchAffected($stm, $bind);
		return $result;
	}
	
}