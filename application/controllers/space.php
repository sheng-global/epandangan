<?php

class Space extends Controller
{
	public function __construct()
	{
		$this->model = $this->loadModel('Space_model');
	}

	public function generateLink()
	{
		$this->loadPlugin('DOSpace');
		$link = DOSpace::getLink('klmycity/draf-2-ppkl2040.pdf');
        return $link;
	}

	public function download($trans_id)
	{
		$custom_js = "<script>
			// update count
			function updateCount(){

				var post_url = '".BASE_URL."space/updateCount/".$trans_id."';

				$.ajax({
					type: 'POST',
					url: post_url,
			    });

			}
		</script>";

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('space/download');

        $data = $this->model->getLink($trans_id);

        $template->set('data', $data);
        $footer->set('custom_js', $custom_js);

		$header->render();
		$template->render();
		$footer->render();
	}

	public function updateCount($trans_id)
	{
		$this->model->updateCount($trans_id);
	}
}
