<?php
Class Jadual_model extends Model {
	
	public function get($table = 'sesi_jadual')
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

	public function getByID($id)
	{
		try{
			$stm  = "SELECT * FROM view_".$table." WHERE id = :id";
			$bind = array('id' => $id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function addJadual($data)
	{
		try{
			$stm  = "INSERT INTO sesi_jadual (lokasi_id, zon_id, tarikh, slot_masa, chairman, ajk_1, ajk_2, keterangan) VALUES (:lokasi_id, :zon_id, :tarikh, :slot_masa, :chairman, :ajk_1, :ajk_2, :keterangan)";
			$bind = array(
				'lokasi_id' => $data['lokasi_id'],
				'zon_id' => $data['zon_id'],
				'tarikh' => $data['tarikh'],
				'slot_masa' => $data['slot_masa'],
				'chairman' => $data['chairman'],
				'ajk_1' => $data['ajk_1'],
				'ajk_2' => $data['ajk_2'],
				'keterangan' => $data['keterangan']
			);
			
			$this->pdo->fetchAffected($stm, $bind);
			return $this->pdo->lastInsertId();
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function updateJadual($data)
	{
		try{
			$stm  = "UPDATE sesi_jadual SET lokasi_id = ".$data['lokasi_id'].", zon_id = ".$data['zon_id'].", tarikh = ".$data['tarikh'].", slot_masa = ".$data['slot_masa'].", chairman = ".$data['chairman'].", ajk_1 = ".$data['ajk_1'].", ajk_2 = ".$data['ajk_2'].", keterangan = ".$data['keterangan']." WHERE id = :id";
			$bind = array(
				'lokasi_id' => $data['lokasi_id'],
				'zon_id' => $data['zon_id'],
				'tarikh' => $data['tarikh'],
				'slot_masa' => $data['slot_masa'],
				'chairman' => $data['chairman'],
				'ajk_1' => $data['ajk_1'],
				'ajk_2' => $data['ajk_2'],
				'keterangan' => $data['keterangan'],
				'id' => $data['id'],
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