<?php
Class Language_model extends Model {
	
	public function getAll()
	{
		$stm  = "SELECT * FROM languages";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}

	public function get($id)
	{
		try{
			$stm  = "SELECT * FROM languages WHERE id = :id";
			$bind = array('id' => $id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function getLanguage($lang)
	{
		try{
			$stm  = "SELECT slug, content FROM languages WHERE language = :lang";
			$bind = array('lang' => $lang);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function add($data)
	{
		try{
			$stm  = "INSERT INTO languages (slug, language, content) VALUES (:slug, :language, :content)";
			$bind = array(
				'slug' => $data['slug'],
				'language' => $data['language'],
				'content' => $data['content']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function update($data)
	{
		try{
			$stm  = "UPDATE languages SET slug = :slug, content = :content, language = :language WHERE id = :id";
			$bind = array(
				'slug' => $data['slug'],
				'content' => $data['content'],
				'language' => $data['language'],
				'id' => $data['id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
}