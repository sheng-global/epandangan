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
		$stm  = "SELECT * FROM view_candidates WHERE voter_id = :user_id ORDER BY post_id";
		$bind = array('user_id' => $user_id);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function getVote()
	{
		$stm  = "SELECT * FROM view_candidates WHERE to_vote = :to_vote";
		$bind = array('to_vote' => 'yes');
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function addCandidate($data)
	{
		// check if data already exist
		$check = "SELECT * FROM candidates WHERE voter_id = :voter_id AND user_id = :user_id AND post_id = :post_id";
		$checkBind = array(
			'voter_id' => $data['voter_id'],
			'user_id' => $data['user_id'],
			'post_id' => $data['post_id']
		);

		$checkResult = $this->pdo->fetchAll($check, $checkBind);

		if($checkResult){
			return false;
		}else{
			try{
				$stm  = "INSERT INTO candidates (voter_id, user_id, post_id, to_vote) VALUES (:voter_id, :user_id, :post_id, :to_vote)";
				$bind = array(
					'voter_id' => $data['voter_id'],
					'user_id' => $data['user_id'],
					'post_id' => $data['post_id'],
					'to_vote' => 'yes'
				);
				
				$this->pdo->fetchAffected($stm, $bind);
				return true;
			}
			catch(Exception $e){
				echo $e->getMessage();
			}
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
			return $e->getMessage();
		}
	}

	public function countSubmission($user_id)
	{
		$stm  = "SELECT COUNT(voter_id) AS total FROM view_candidates WHERE voter_id = :user_id";
		$bind = array('user_id' => $user_id);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function countToVote($user_id)
	{
		$stm  = "SELECT COUNT(to_vote) AS total FROM view_candidates WHERE voter_id = :user_id AND to_vote = :to_vote";
		$bind = array(
			'user_id' => $user_id,
			'to_vote' => 'yes'
		);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function countPost()
	{
		$stm  = "SELECT SUM(post_available) AS total FROM posts";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}

	public function updateCandidates($data)
	{
		try{
			$stm  = "UPDATE candidates SET to_vote = 'yes' WHERE voter_id = :voter_id";
			$bind = array(
				'voter_id' => $data['voter_id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function toVote($data)
	{
		try{
			$stm  = "INSERT INTO to_vote (voter_id, status) VALUES (:voter_id, :status)";
			$bind = array(
				'voter_id' => $data['voter_id'],
				'status' => $data['status']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function checkNomination($voter_id)
	{
		$stm  = "SELECT * FROM to_vote WHERE voter_id = :voter_id";
		$bind = array(
			'voter_id' => $voter_id
		);
		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}

	public function addVote($data)
	{
		try{
			$stm  = "INSERT INTO votes (user_id, post_id) VALUES (:user_id, :post_id)";
			$bind = array(
				'user_id' => $data['user_id'],
				'post_id' => $data['post_id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
}