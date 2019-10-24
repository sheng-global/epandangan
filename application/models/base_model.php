<?php
Class Base_model extends Model {
	
	public function getPosts()
	{
		$stm  = "SELECT * FROM posts";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}
}