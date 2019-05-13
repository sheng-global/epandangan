<?php

class Vote extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Vote_model');

		$this->css = array(
			'assets/libs/datatables/dataTables.bootstrap4.css',
			'assets/libs/datatables/responsive.bootstrap4.css',
			'assets/libs/datatables/buttons.bootstrap4.css',
			'assets/libs/datatables/select.bootstrap4.css'
		);

		$this->js = array(
			'assets/libs/datatables/jquery.dataTables.min.js',
			'assets/libs/datatables/dataTables.bootstrap4.js',
			'assets/libs/datatables/dataTables.responsive.min.js',
			'assets/libs/datatables/responsive.bootstrap4.min.js',
			'assets/libs/datatables/dataTables.buttons.min.js',
			'assets/libs/datatables/buttons.html5.min.js',
			'assets/libs/datatables/buttons.flash.min.js',
			'assets/libs/datatables/buttons.print.min.js',
			'assets/libs/pdfmake/pdfmake.min.js',
			'assets/libs/pdfmake/vfs_fonts.js',
			'assets/js/pages/datatables.init.js'
		);

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth/login');
		}
	}

	public function addCandidate()
	{
		if(isset($_POST)){

			$data = array(
				'voter_id' => $_POST['session_id'],
				'user_id' => $_POST['user_id'],
				'post_id' => $_POST['post_id']
			);

			$this->model->addCandidate($data);

			$data2 = array(
				'nominee' => $_POST['user_id'],
				'nominated_by' => $_POST['session_id']
			);

			$this->model->addNomination($data2);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Vote',
				'function' => 'addCandidate',
				'action' => 'Add new candidate'
			);
			$log->add($data2);

			return true;
			
		}else{
			return false;
		}
	}

	public function addNomination()
	{
		if(isset($_POST)){

			$data = array(
				'nominee' => $_POST['user_id'],
				'nominated_by' => $_POST['session_id']
			);

			$this->model->addNomination($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Vote',
				'function' => 'addNomination',
				'action' => 'Add new nomination'
			);
			$log->add($data2);

			return true;
			
		}else{
			return false;
		}
	}

	public function updateCandidates()
	{
		if(isset($_POST)){

			$data = array(
				'voter_id' => $_POST['voter_id']
			);

			$this->model->updateCandidates($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Vote',
				'function' => 'updateCandidates',
				'action' => 'Update candidates submission'
			);
			$log->add($data2);

			return true;
			
		}else{
			return false;
		}
	}
}