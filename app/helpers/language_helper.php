<?php
/*
*  Title: Language Helper
*  Version: 1.0 from 28 July 2016
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

Class Language_helper extends Controller
{
	public function __construct()
	{
		if ($_SESSION['last_ip'] == false){
			$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
		}

		if ($_SESSION['last_ip'] != $_SERVER['REMOTE_ADDR']){
			
			session_unset();
			session_destroy();
		}

		header('Cache-control: private'); // IE 6 FIX
	}

	public function getLanguageFile($cache = 30)
	{
		$model = $this->loadModel('Language_model');
		$language = $_SESSION['lang'];
		$file = ROOT_DIR.'languages/'.$language.'.json';
		$current_time = time();
		$expire_time = $cache * 60;

		if(file_exists($file) && $current_time - $expire_time < filemtime($file)) {
			$language_file = json_decode(file_get_contents($file));
		} else {
			$content = $model->translation($language);
			$content = json_encode($content);
			file_put_contents($file, $content);
			$language_file = $file;
		}
		return $language_file;
	}
}