<?php

class PandanganItem {
	
	private $dbh;
	private $dbPrefix = 'pskl_';
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}

	public function getPandanganItem($id){	
		$sql = "SELECT * FROM ".$this->dbPrefix."form_item WHERE id=?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($id));
		
		$result = $sth->fetch();

		return json_encode($result);
	}

	public function getPandanganItems(){
		$sql = 	"SELECT * FROM ".$this->dbPrefix."form_item";		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return json_encode($sth->fetchAll());
	}

}
?>