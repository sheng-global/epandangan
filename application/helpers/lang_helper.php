<?php
/*
*  Title: Language Helper
*  Version: 1.0
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

class Lang_helper extends Model {
	
	function createLanguageFile($lang, $regenerate = FALSE)
	{
		if($regenerate){
			unlink(ROOT_DIR.'languages/'.$lang.'.json');
		}

		$filename = ROOT_DIR.'languages/'.$lang.'.json';

		if (!file_exists($filename)) {

			try{

				$stm  = "SELECT slug, content FROM languages WHERE language = :lang";
				$bind = array('lang' => $lang);
				$result = $this->pdo->fetchAssoc($stm, $bind);

				$cleanResult = "{";

				foreach ($result as $value) {
					$cleanResult .= '"'.$value['slug'].'":"'.$value['content'].'"';
					if (next($result)==true) $cleanResult .= ",";
				}

				$cleanResult .= "}";

				//Save the JSON string to a text file.
				file_put_contents($filename, $cleanResult);

			}
			catch(Exception $e){
				return $e->getMessage();
			}
		}
	}
	
}