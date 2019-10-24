<?php
/*
*  Title: URL Helper
*  Version: 1.0 from 28 July 2016
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

class Url_helper {

	function base_url()
	{
		global $config;
		return $config['base_url'];
	}
	
	function segment($seg)
	{
		if(!is_int($seg)) return false;
		
		$parts = explode('/', $_SERVER['REQUEST_URI']);
	    return isset($parts[$seg]) ? $parts[$seg] : false;
	}
	
}