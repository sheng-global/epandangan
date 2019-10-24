<?php

class Mailer_model extends Model {
	
	public function getByID($id)
	{
		try{
			$stm  = "SELECT * FROM email_template WHERE id = :id";
			$bind = array('id' => $id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}