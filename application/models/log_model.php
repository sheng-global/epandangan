<?php

class Log_model extends Model {
	
	public function listSingle($tableView, $id)
	{
		$result = $this->selectSingleById($tableView,'id',$id);
		return $result;
	}

	public function listAll($table)
	{
		$result = $this->selectSQL("SELECT * FROM '.$table.'");
		return $result;
	}

	public function deleteLog($table)
	{
		$query = $this->truncateTables($table);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
	
}