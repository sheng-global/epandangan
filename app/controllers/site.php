<?php

class Site extends Controller
{

	public function __construct()
	{
		$this->model = $this->loadModel('Vote_model');
		$this->filter = $this->loadHelper('filter_helper');
	}

	public function index()
	{
		$custom_css = "<style>
			.bg-gradient {
				background-color: -webkit-linear-gradient(left, red 0%, green 100%); /* Chrome10-25,Safari5.1-6 */
			}
		</style>";

		$post = $this->model->getPosts();

		$header = $this->loadView('header');
		$header->set('custom_css', $custom_css);
		$header->render();

        $template = $this->loadView('site/result');

        $template->set('post2', $this->model->viewResultOne('view_result_2'));
        $template->set('post3', $this->model->viewResultOne('view_result_3'));
        $template->set('post4', $this->model->viewResultOne('view_result_4'));
        $template->set('post5', $this->model->viewResultOne('view_result_5'));
        $template->set('post7', $this->model->viewResultOne('view_result_7'));
        $template->set('post8', $this->model->viewResultOne('view_result_8'));
        $template->set('post9', $this->model->viewResultOne('view_result_9'));

        $template->set('count2', $this->model->viewCount('view_result_2'));
        $template->set('count3', $this->model->viewCount('view_result_3'));
        $template->set('count4', $this->model->viewCount('view_result_4'));
        $template->set('count5', $this->model->viewCount('view_result_5'));
        $template->set('count7', $this->model->viewCount('view_result_7'));
        $template->set('count8', $this->model->viewCount('view_result_8'));
        $template->set('count9', $this->model->viewCount('view_result_9'));

        $template->set('helper', $this->loadHelper('upload_helper'));
		$template->render();

		$footer = $this->loadView('footer');
		$footer->render();
	}
}
