<?php

class Pandangan {
	
	private $dbh;
	private $dbPrefix = 'pskl_';
	
	public function __construct($host,$user,$pass,$db)	{		
		$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}

	public function getPandangan($id){	
		$sql = "SELECT * FROM ".$this->dbPrefix."borang WHERE id=?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($id));
		
		$result = $sth->fetch();

		return json_encode($result);
	}

	public function getPandangans(){	
		$sql = 	"SELECT * FROM ".$this->dbPrefix."borang";		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return json_encode($sth->fetchAll());
	}

	/*************************
	********* Form  **********
	*************************/
	public function getForm($id){	
		$sql = "SELECT * FROM ".$this->dbPrefix."borang WHERE id=?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($id));
		
		$result = $sth->fetch();

		return $result;
	}

	public function addForm($data){
		$sql = "INSERT ".$this->dbPrefix."borang (user_id, pegawai_id, tarikh_terima, tarikh_key_in, hadir, kategori, nama_organisasi, jumlah_nama, komen_bentuk_kandungan, komen_lain_lain, last_update)"
			."VALUES (?, 0, NOW(), NOW(), ?, ?, ?, ?, ?, ?, NOW())";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array($data['user_id'], $data['hadir'], $data['kategori'], $data['nama_organisasi'], $data['jumlah_nama'], $data['bentuk_kandungan'], $data['lain_lain']));
		//return json_encode($sth->errorInfo());
		
		$formId = $this->dbh->lastInsertId();
		
		return $formId;	
	}

	public function updateForm($data){
		$sql = "UPDATE ".$this->dbPrefix."borang SET hadir=?, kategori=?, nama_organisasi=?, jumlah_nama=?, komen_bentuk_kandungan=?, komen_lain_lain=?, last_update=NOW() WHERE id=?";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array($data['hadir'], $data['kategori'], $data['nama_organisasi'], $data['jumlah_nama'], $data['bentuk_kandungan'], $data['lain_lain'], $data['id']));
		//return json_encode($sth->errorInfo());
				
		return json_encode(1);	
	}	


	/*************************
	****** Form Item *********
	*************************/
	public function getItemByIds($borang_id, $matlamat_id, $halatuju_id, $tindakan_id){	
		$sql = "SELECT * FROM ".$this->dbPrefix."borang_matlamat WHERE borang_id=? AND matlamat_id=? AND halatuju_id=? AND tindakan_id=?";
		$sth = $this->dbh->prepare($sql);
		$sth->execute(array($borang_id, $matlamat_id, $halatuju_id, $tindakan_id));
		
		$result = $sth->fetch();

		return $result;
	}

	public function addItem($data){

		$sql = "INSERT ".$this->dbPrefix."borang_matlamat (borang_id, matlamat_id, halatuju_id, tindakan_id, cadangan, justifikasi, last_update)"
			."VALUES (?, ?, ?, ?, ?, ?, NOW())";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array($data['borang_id'], $data['matlamat_id'], $data['halatuju_id'], $data['tindakan_id'], $data['cadangan'], $data['justifikasi']));
		//return json_encode($sth->errorInfo());
		
		$itemId = $this->dbh->lastInsertId();

		return $itemId;	
	}
	
	public function updateItem($data){
		
		$sql = "UPDATE ".$this->dbPrefix."borang_matlamat SET borang_id=?, matlamat_id=?, halatuju_id=?, tindakan_id=?, cadangan=?, justifikasi=?, last_update=NOW() WHERE id=?";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array($data['borang_id'], $data['matlamat_id'], $data['halatuju_id'], $data['tindakan_id'], $data['cadangan'], $data['justifikasi'], $data['id']));
		//return json_encode($sth->errorInfo());
				
		return json_encode(1);	
	}

}
?>
