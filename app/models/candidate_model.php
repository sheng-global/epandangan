<?php
Class Candidate_model extends Model {
	
	public function getAll()
	{
		$stm  = "SELECT * FROM view_candidates";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}

	public function getPosition($post_id)
	{
		$stm  = "SELECT * FROM posts WHERE id = :post_id";
		$bind = array('post_id' => $post_id);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}
}