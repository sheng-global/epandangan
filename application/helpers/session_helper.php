<?php
/*
*  Title: Session Helper
*  Version: 1.0 from 28 July 2016
*  Author: Fadli Saad
*  Website: https://fadli.my
*/
use EasyCSRF\Interfaces\SessionProvider;
class Session_helper implements SessionProvider {

	function set($key, $val)
	{
		$_SESSION["$key"] = $val;
	}
	
	function get($key)
	{
		if(isset($_SESSION)) return $_SESSION["$key"];
	}

	function delete($key)
	{
		unset($_SESSION["$key"]);
	}
	
	function destroy()
	{
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		session_destroy();
	}

}