<?php
/*
*  Title: Query Helper
*  Version: 1.0
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

Class Query_helper extends Model
{
	public function getJSON($data, $cache = 120)
	{
		$file = ROOT_DIR.'query/'.$data['file'].'.json';
		$current_time = time();
		$expire_time = $cache * 60;

		if(file_exists($file) && $current_time - $expire_time < filemtime($file)) {
			$json = json_decode(file_get_contents($file));
		} else {
			$sql = "SELECT ".$data['query']." FROM ".$data['table'];
			$row['results'] = $this->pdo->fetchAll($sql);

			$content = json_encode($row);
			file_put_contents($file, $content);
			$json = $file;
		}
		return $json;
	}

	public function generateMenuCalon()
	{
		$stm  = "SELECT id, post_name FROM posts";
		$result = $this->pdo->fetchAll($stm);
		return $result;
	}
}