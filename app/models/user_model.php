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
	
	public function addRecord($data)
	{
		$query = $this->insert('user_profile', $data);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}

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
	
	public function editRecord($data, $id)
	{
		$query = $this->updateWhere('user_profile', 'user_id', $id, $data);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
	
	public function deleteRecord($id)
	{
		$delete_user = $this->delete('user_profile', $id);
		$delete_approver = $this->deleteWhere('user_approver', 'user_id', $id);

		if(empty($delete_user)){
			return false;
		}else{
			return $delete_user;
			return $$delete_approver;
		}
	}
}