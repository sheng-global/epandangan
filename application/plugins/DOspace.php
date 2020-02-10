<?php
/*
*  Title: DigitalOcean Space Plugins
*  Version: 1.0 from 8 February 2020
*  Author: Fadli Saad
*  Website: https://apadmedia.website
*/

class DOSpace extends Controller
{
	/*
	* Connect to space
	*/
	public static function connect()
	{
		$key='E63CVDVVBRJVUT7LKYMX';
		$secret='dQa9zo3rP1SsXLE3iuudOz1ueZW21ZdDB0ruke7oYIQ';

		$space_name = "lavaspace";
		$region = "sgp1";

		try{
			$space = new SpacesConnect($key, $secret, $space_name, $region);
			return $space;
		}catch (\SpacesAPIException $e) {
    		$error = $e->GetError();
    		echo "<pre>";
    		print_r($error);
    		echo "</pre>";
		}
	}

	public static function list($path = NULL)
	{
		$space = DOSpace::connect();
		try{
			return $space->ListObjects($path);
		}catch (\SpacesAPIException $e) {
    		$error = $e->GetError();
    		echo "<pre>";
    		print_r($error);
    		echo "</pre>";
		}
	}

	public static function getLink($file, $validity = '1 day')
	{
		$space = DOSpace::connect();

		// check if file exist
		if($space->DoesObjectExist($file)){
			// create temporary file link
			try{
				return $space->CreateTemporaryURL($file, $validity);
			}catch (\SpacesAPIException $e) {
	    		$error = $e->GetError();
	    		echo "<pre>";
	    		print_r($error);
	    		echo "</pre>";
			}
		}else{
			echo "File does not exist";
		}
		
	}
}		