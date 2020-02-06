<?php

class Pengguna_model extends Model {
	
	public function listSingle($user_id)
	{
		$stm  = "SELECT * FROM view_user WHERE user_id = :user_id";
		$bind = array('user_id' => $user_id);

		try{
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function addProfile($data)
	{
		$stm  = "INSERT INTO user_profile (phone_number, verification_code, sessionid, messageid, last_update) VALUES (:phone_number, :verification_code, :sessionid, :messageid, :last_update)";
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

	public function updateProfile($data)
	{
		try{
			$stm  = "UPDATE profile SET nama_penuh = :nama_penuh, ic_passport = :ic_passport, alamat = :alamat, poskod = :poskod, telefon_rumah = :telefon_rumah, telefon_pejabat = :telefon_pejabat, telefon_bimbit = :telefon_bimbit WHERE user_id = :user_id";
			$bind = array(
				'nama_penuh' => $data['nama_penuh'],
				'ic_passport' => $data['ic_passport'],
				'alamat' => $data['alamat'],
				'poskod' => $data['poskod'],
				'telefon_rumah' => $data['telefon_rumah'],
				'telefon_pejabat' => $data['telefon_pejabat'],
				'telefon_bimbit' => $data['telefon_bimbit']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
}