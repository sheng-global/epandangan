<?php
Class Vote_model extends Model {
	
	public function getPosts()
	{
		$stm  = "SELECT * FROM posts";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}

	public function getCandidates($user_id)
	{
		$stm  = "SELECT * FROM view_candidates WHERE voter_id = :user_id";
		$bind = array('user_id' => $user_id);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function addCandidate($data)
	{
		try{
			$stm  = "INSERT INTO candidates (voter_id, user_id, post_id, to_vote) VALUES (:voter_id, :user_id, :post_id, :to_vote)";
			$bind = array(
				'voter_id' => $data['voter_id'],
				'user_id' => $data['user_id'],
				'post_id' => $data['post_id'],
				'to_vote' => 'no'
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function addNomination($data)
	{
		try{
			$stm  = "INSERT INTO nominations (nominee, nominated_by, status, reason) VALUES (:nominee, :nominated_by, :status, :reason)";
			$bind = array(
				'nominee' => $data['nominee'],
				'nominated_by' => $data['nominated_by'],
				'status' => 'proses',
				'reason' => 'N/A'
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}