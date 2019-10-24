<?php
/**
* Error Controller
*
* Error controller for PIP.
*
* @package    	PIP
* @subpackage 	Error
* @author 		Fadli Saad (https://fadli.my)
*/
class Oops extends Controller {
	
	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
	}

	function index()
	{
		$template = $this->loadView('error');
		$template->render();
	}
}