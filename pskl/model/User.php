<?php

class User {
	
	private $dbh;
	private $dbPrefix = '';
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}

	public function getUser($id){	
		$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE id=?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($id));
		
		$result = $sth->fetch();

		return json_encode($result);
	}
			
	public function findByEmail($email){	
		$sql = "SELECT * FROM ".$this->dbPrefix."users WHERE email=?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($email));
		$result = $sth->fetch();
		
		if ($result == false) return false;

		return json_encode($result);
	}
			
	public function add($data){
		$password = password_hash($data['password'], PASSWORD_DEFAULT);

		//$sql = "INSERT INTO ".$this->dbPrefix."users(email, password, permission, last_update) VALUES (?, ?, ?, NOW())";
		$sql = "INSERT INTO ".$this->dbPrefix."users(email, password) VALUES (?, ?)";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($data['email'], $password));

		$userId = $this->dbh->lastInsertId();
		
		$sql = "INSERT INTO ".$this->dbPrefix."profile(user_id, nama_penuh, last_update) VALUES (?, ?, NOW())";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($userId, $data['name']));
		//return json_encode($sth->errorInfo());
		
		/*
		
		$sql = "INSERT INTO ".$this->dbPrefix."profile(user_id, nama_penuh, ic_passport, alamat, poskod, telefon_rumah, telefon_pejabat, telefon_bimbit, last_update) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array($userId, $data['name'], $data['nric'], $data['address'], $data['postcode'], $data['housephone'], $data['officephone'], $data['mobile']));
		*/
		
		//if ($result == false) return false;
		
		//return json_encode($userId);
		return $userId;
	}
	
	public function updateProfile($data){
		$sql = "UPDATE ".$this->dbPrefix."profile SET nama_penuh=?, ic_passport=?, alamat=?, poskod=?, telefon_rumah=?, telefon_pejabat=?, telefon_bimbit=?, last_update=NOW() WHERE user_id=?";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array($data['name'], $data['nric'], $data['address'], $data['postcode'], $data['housephone'], $data['officephone'], $data['mobile'], $data['userid']));
		//return json_encode($sth->errorInfo());
				
		if ($result == false) return 0;

		return json_encode(1);	
	}
}
?>