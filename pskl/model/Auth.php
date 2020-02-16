<?php

class Auth {
	
	private $dbh;
	private $dbPrefix = '';
	public $result = null;
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}

	public function verifyUserPassword($username, $password){
		/*
		$sql = "SELECT * FROM ".$this->dbPrefix."user WHERE username = ? AND password=PASSWORD(?)";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($username, $password));
		$result = $sth->fetch();
		*/
		$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE email = ?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($username));
		$user = $sth->fetch();



		//$hash = password_hash($password, PASSWORD_DEFAULT);
		


		
		if (!password_verify($password, $user['password'])) return false; 
		
		// update authkey
		$sql = "UPDATE ".$this->dbPrefix."users SET auth_key = PASSWORD(?) WHERE email = ?";
		$sth = $this->dbh->prepare($sql);
		$authKey = $username.date("YmdHis");
		$sth->execute(array($authKey, $username));

		$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE email = ?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($username));
		$user = $sth->fetch();

		// get data
		//$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE id = ?";
		//$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE email = ?";
		$sql = "SELECT * FROM ".$this->dbPrefix."profile WHERE user_id = ?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($user['id']));
		$result = $sth->fetch();
		$result['auth_key'] = $user['auth_key'];
		
		return $result;
	}
	
	public function verifyUserAuthKey($authKey){	
		$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE auth_key = ?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($authKey));
		$result = $sth->fetch();
				
		return $result;
	}


}
?>