<?php

class Site extends Controller
{

	public function __construct()
	{

	}

	public function index()
	{
		$header = $this->loadView('header');
		$header->render();

		$navigation = $this->loadView('navigation');
		$navigation->render();

        $template = $this->loadView('site/index');
		$template->render();

		$footer = $this->loadView('footer');
		$footer->render();
	}
}
