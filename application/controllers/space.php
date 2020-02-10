<?php

class Space extends Controller
{
	public function __construct()
	{

	}

	public function generateLink($userId)
	{
		$this->loadPlugin('DOSpace');
		$link = DOSpace::getLink('klmycity/draf-2-ppkl2040.pdf');
        $template = $this->loadView('space/index');
		$template->set('list', $list);
		$template->set('link', $link);
		$template->render();
	}
}
