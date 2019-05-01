<?php
/*
*  Title: Log Helper
*  Version: 1.0 from 28 July 2016
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

class Log_helper extends Model {
	
	public function add($data){

		$stm  = 'INSERT INTO audit_log (user_id, controller, function, action) VALUE (:user_id, :controller, :function, :action)';
		$bind = array(
			'user_id' => $data['user_id'],
			'controller' => $data['controller'],
			'function' => $data['function'],
			'action' => $data['action']
		);
		$result = $this->pdo->fetchAffected($stm, $bind);
		if(empty($result)){
			return false;
		}else{
			return $result;
		}
	}

	public function email($data){

		$query = $this->insert('email_log', $data);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}

	public function error($data){

		$query = $this->insert('error_log', $data);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
}