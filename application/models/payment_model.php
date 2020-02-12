<?php

class Payment_model extends Model {
	
	public function listSingleTransaction($transaction_id)
	{
		$stm  = "SELECT * FROM payments WHERE transaction_id = :transaction_id";
		$bind = array('transaction_id' => $transaction_id);

		try{
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function addDownload($data)
	{
		$stm  = "INSERT INTO download (transaction_id, link, count) VALUES (:transaction_id, :link, :count)";
		$bind = array(
			'transaction_id' => $data['transaction_id'],
			'link' => $data['link'],
			'count' => $data['count']
		);
		$result = $this->pdo->fetchAffected($stm, $bind);
		return $result;
	}
	
	public function addPayment($data)
	{
		$stm  = "INSERT INTO payments (transaction_id, amount, payment_date, payment_time, payment_type, payment_mode, status, remarks) VALUES (:transaction_id, :amount, :payment_date, :payment_time, :payment_type, :payment_mode, :status, :remarks)";
		$bind = array(
			'transaction_id' => $data['transaction_id'],
			'amount' => $data['amount'],
			'payment_date' => $data['payment_date'],
			'payment_time' => $data['payment_time'],
			'payment_type' => $data['payment_type'],
			'payment_mode' => $data['payment_mode'],
			'status' => $data['status'],
			'remarks' => $data['remarks']
		);
		$result = $this->pdo->fetchAffected($stm, $bind);
		return $result;
	}

	public function updatePayment($data)
	{
		try{
			$stm  = "UPDATE payments SET status = :status WHERE transaction_id = :transaction_id";
			$bind = array(
				'status' => $data['status'],
				'transaction_id' => $data['transaction_id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
}