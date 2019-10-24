<?php
Class Tetapan_model extends Model {
	
	public function getTetapan($table)
	{
		try{
			$stm  = "SELECT * FROM ".$table;
			$result = $this->pdo->fetchAll($stm);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getTetapanByID($table, $id)
	{
		try{
			$stm  = "SELECT * FROM ".$table." WHERE id = :id";
			$bind = array('id' => $id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function add($data)
	{
		try{
			$stm  = "INSERT INTO ".$data['table']." (nama) VALUES (:nama)";
			$bind = array(
				'nama' => $data['nama']
			);
			
			$this->pdo->fetchAffected($stm, $bind);
			echo "1";
		}
		catch(Exception $e){
			echo $e->getMessage();
			echo "0";
		}
	}

	public function update($data)
	{
		try{
			$stm  = "UPDATE ".$data['table']." SET name = ".$data['name']." WHERE id = :id";
			$bind = array(
				'id' => $data['id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function delete($data)
	{
		try{
			$stm  = "DELETE FROM ".$data['table']." WHERE id = :id LIMIT 1";
			$bind = array(
				'id' => $data['id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}
}