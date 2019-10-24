<?php
/*
*  Title: PHP Filter Helper
*  Version: 1.0 from 07 May 2017
*  Author: Fadli Saad
*  Website: https://fadli.my
*
*  	Definition and Usage
	The FILTER_SANITIZE_STRING filter removes tags and remove or encode special characters from a string.

	Possible options and flags:

	FILTER_FLAG_NO_ENCODE_QUOTES - Do not encode quotes
	FILTER_FLAG_STRIP_LOW - Remove characters with ASCII value < 32
	FILTER_FLAG_STRIP_HIGH - Remove characters with ASCII value > 127
	FILTER_FLAG_ENCODE_LOW - Encode characters with ASCII value < 32
	FILTER_FLAG_ENCODE_HIGH - Encode characters with ASCII value > 127
	FILTER_FLAG_ENCODE_AMP - Encode the "&" character to &amp;
*/

class Filter_helper {

	function sanitize($string)
	{
		return filter_var($string, FILTER_SANITIZE_STRING);
	}

	function isEmail($string)
	{
		return filter_var($string, FILTER_VALIDATE_EMAIL);
	}

	/*
	*  Usage:
	*  if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
    *  		echo("Integer is valid");
	*  } else {
	*      echo("Integer is not valid");
	*  }
	*/
	function isInt($int)
	{
		return filter_var($int, FILTER_VALIDATE_INT);
	}

	function escape($string)
	{
		return mysqli_escape_string($string,true);
	}
}