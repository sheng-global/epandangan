<?php

class Template_model extends Model {
	
	public function listSingle($id)
	{
		$result = $this->selectSingleById('email_template','id',$id);
		return $result;
	}
	
	public function addRecord($data)
	{
		$query = $this->insert('email_template', $data);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
	
	public function editRecord($data,$id)
	{
		$query = $this->update('email_template', $id, $data);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
	
	public function deleteRecord($id)
	{
		$query = $this->delete('email_template', $id);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
}