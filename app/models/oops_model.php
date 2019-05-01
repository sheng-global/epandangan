<?php

class Oops_model extends Model {
	
	public function listAll()
	{
		$result = $this->selectAll('error');
		return $result;
	}
	
	public function listSingle($id)
	{
		$result = $this->selectSingleById('error','id',$id);
		return $result;
	}
	
	public function addSetting($data)
	{
		$query = $this->insert('settings', array(
			'title' => $data['title'],
			'content' => $data['content']
		));
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
	
	public function editSetting($data,$id)
	{
		$query = $this->update('settings', $id, array(
			'title' => $data['title'],
			'content' => $data['content']
			));
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
	
	public function deleteSetting($id)
	{
		$query = $this->delete('settings', $id);
		if(empty($query)){
			return false;
		}else{
			return $query;
		}
	}
}