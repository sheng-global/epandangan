<?php

class Space_model extends Model {
	
	public function getLink($transaction_id)
	{
		$stm  = "SELECT * FROM download WHERE transaction_id = :transaction_id";
		$bind = array('transaction_id' => $transaction_id);

		try{
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function updateCount($transaction_id)
	{
		try{
			$stm  = "UPDATE download SET count = count + 1 WHERE transaction_id = :transaction_id";
			$bind = array(
				'transaction_id' => $transaction_id
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

}