<?php

class Auth_model extends Model {

	public function processLogin($data)
	{
		$username = $data['username'];
		$password = $data['password'];
		$error_msg = NULL;
		
		$user = $this->getUserByEmail($username);
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

	public function getUserByEmail($email)
	{
		try{
			$stm  = "SELECT * FROM users WHERE email = :email LIMIT 1";
			$bind = array('email' => $email);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getUserProfile($user_id)
	{
		try{
			$stm  = "SELECT * FROM view_profile WHERE user_id = :user_id LIMIT 1";
			$bind = array('user_id' => $user_id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getUserProfileByEmail($email)
	{
		try{
			$stm  = "SELECT * FROM view_profile WHERE email = :email LIMIT 1";
			$bind = array('email' => $email);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function addUser($data)
	{
		try{
			$stm  = "INSERT INTO users (email, password, permission) VALUES (:email, :password, :permission)";
			$bind = array(
				'email' => $data['username'],
				'password' => password_hash($data['password'], PASSWORD_DEFAULT),
				'permission' => 'user'
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function addProfile($data)
	{
		try{
			$stm  = "INSERT INTO profile (user_id, nama_penuh) VALUES (:user_id, :nama_penuh)";
			$bind = array(
				'user_id' => $data['user_id'],
				'nama_penuh' => $data['nama_penuh']
			);

			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function addRecoveryToken($data)
	{
		try{
			$stm  = "INSERT INTO user_token (user_id, token, expiry) VALUES (:user_id, :token, :expiry)";
			$bind = array(
				'user_id' => $data['user_id'],
				'token' => $data['token'],
				'expiry' => $data['expiry']
			);

			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function checkToken($token)
	{
		try{
			$stm  = "SELECT * FROM user_token WHERE token = :token LIMIT 1";
			$bind = array('token' => $token);
			return $this->pdo->fetchAll($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function deleteRecoveryToken($token)
	{
		try{
			$stm  = "DELETE FROM user_token WHERE token = :token LIMIT 1";
			$bind = array('token' => $token);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function updatePassword($data)
	{
		try{
			$stm  = "UPDATE users SET password = :password WHERE id = :id";
			$bind = array(
				'password' => password_hash($data['password'], PASSWORD_DEFAULT),
				'id' => $data['id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
	
}