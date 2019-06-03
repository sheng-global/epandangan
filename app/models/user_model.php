<?php

class User_model extends Model {
	
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

	public function listSinglePencalonan($user_id)
	{
		$stm  = "SELECT * FROM view_candidates WHERE voter_id = :user_id ORDER BY post_id";
		$bind = array('user_id' => $user_id);

		try{
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function addRecord($data)
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

	public function deleteCalon($candidate_id)
	{
		try{
			$stm  = "DELETE FROM candidates WHERE id = :id LIMIT 1";
			$bind = array(
				'id' => $candidate_id
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
}