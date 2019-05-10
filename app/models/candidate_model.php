<?php
Class Candidate_model extends Model {
	
	public function getAll()
	{
		$stm  = "SELECT * FROM view_candidates";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}
}