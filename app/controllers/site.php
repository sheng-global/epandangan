<?php

class Site extends Controller
{
	public function index()
	{
       	$template = $this->loadView('site/tutup');
		$template->render();
	}
}
