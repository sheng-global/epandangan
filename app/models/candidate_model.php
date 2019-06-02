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

	public function updatePost($data)
	{
		try{
			$stm  = "UPDATE posts SET post_name = :post_name, post_available = :post_available, min_nomination_require = :min_nomination_require, indicator = :indicator WHERE id = :id";
			$bind = array(
				'post_name' => $data['post_name'],
				'post_available' => $data['post_available'],
				'min_nomination_require' => $data['min_nomination_require'],
				'indicator' => $data['indicator'],
				'id' => $data['id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getNomination($user_id)
	{
		$stm  = "SELECT * FROM view_candidates WHERE user_id = :user_id";
		$bind = array('user_id' => $user_id);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}
}