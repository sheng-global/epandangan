<?php

class Vote extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Vote_model');
		$this->filter = $this->loadHelper('filter_helper');

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

	public function index()
	{
		$css = array(
			'assets/libs/select2/select2.min.css',
			'assets/libs/sweetalert2/sweetalert2.min.css'
		);

		$js = array(
			'assets/libs/select2/select2.min.js',
			'assets/js/pages/select2.init.js',
			'assets/libs/sweetalert2/sweetalert2.min.js',
			'assets/js/pages/sweet-alerts.init.js'
		);

		$posts = $this->model->getPosts();
		$candidates = $this->model->getVotingList();

		$post = $this->model->countPost();

		$custom_js = "<script>

			// assign random color to button
			var klasses = ['btn-primary', 'btn-info', 'btn-success', 'btn-pink', 'btn-warning', 'btn-danger', 'btn-pink', 'btn-dark', 'btn-blue', 'btn-secondary'];

			$('.title').each(function(i, val) {
				$(this).addClass(klasses[i]);
			});

			// post vote
			function createVote(postData){

				var post_url = '".BASE_URL."vote/addVote';

				$.ajax({
					type: 'POST',
					url: post_url,
					dataType: 'html',
					data: 'user_id=' + postData[0] +'&voter_id=' + postData[1] +'&post_id=' + postData[2],
					success:function(response){
						if(parseInt(response) == 0){
							swal({
								title: 'Ralat',
								text: 'Pemilihan bagi jawatan ini telah dipenuhi.',
								type: 'warning'
							});
						}else{
							swal({
								title: 'Berjaya',
								text: 'Pemilihan telah berjaya dibuat.',
								type: 'success'
							}).then(function() {
				                location.reload();
				            });
						}
					}
			    });

			}

			$('.save-vote').bind('click', function (e) {

				var user_id = $(this).data('user-id');
				var voter_id = $(this).data('voter-id');
				var post_id = $(this).data('post-id');

				var postData = new Array(user_id,voter_id,post_id);

				e.preventDefault();
				$(this).attr('disabled', 'disabled');
				createVote(postData);
			});

			// delete vote
			function deleteVote(postData){

				var post_url = '".BASE_URL."vote/deleteVote';

				$.ajax({
					type: 'POST',
					url: post_url,
					dataType: 'html',
					data: 'user_id=' + postData[0] +'&voter_id=' + postData[1] +'&post_id=' + postData[2],
					success:function(response){
						swal({
							title: 'Info',
							text: 'Undian telah dibatalkan. Sila pilih undian yang baru.',
							type: 'info'
						}).then(function() {
			                location.reload();
			            });
					}
			    });

			}

			$('.delete-vote').bind('click', function (e) {

				var user_id = $(this).data('user-id');
				var voter_id = $(this).data('voter-id');
				var post_id = $(this).data('post-id');

				var postData = new Array(user_id,voter_id,post_id);

				e.preventDefault();
				$(this).attr('disabled', 'disabled');
				deleteVote(postData);
			});

		</script>";

		$header = $this->loadView('header');
        $header->set('css', $css);
		$header->render();

		$navigation = $this->loadView('navigation');
		$navigation->render();

        $template = $this->loadView('vote/index');
        $template->set('posts', $posts);
        $template->set('candidates', $candidates);
        $template->set('helper', $this->loadHelper('upload_helper'));
		$template->render();

		$footer = $this->loadView('footer');
        $footer->set('custom_js', $custom_js);
        $footer->set('js', $js);
		$footer->render();
	}

	public function addCandidate()
	{
		if(isset($_POST)){

			$data = array(
				'voter_id' => $_POST['session_id'],
				'user_id' => $_POST['user_id'],
				'post_id' => $_POST['post_id'],
				'to_vote' => 'yes'
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

			$data2 = array(
				'voter_id' => $_POST['voter_id'],
				'status' => 'yes'
			);

			$this->model->toVote($data2);

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

	public function addVote()
	{
		if(isset($_POST)){

			// check logic of allowable vote per post
			$post = $this->model->getPostByID($_POST['post_id']);

			$data = array(
				'voter_id' => $this->session->get('user_id'),
				'user_id' => $_POST['user_id'],
				'post_id' => $_POST['post_id'],
				'post_count' => $post[0]['post_available']
			);

			$vote = $this->model->addVote($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Vote',
				'function' => 'addVote',
				'action' => serialize($data)
			);
			$log->add($data2);

			return $vote;
			
		}else{
			return false;
		}
	}

	public function deleteVote()
	{
		if(isset($_POST)){

			$data = array(
				'voter_id' => $this->session->get('user_id'),
				'user_id' => $_POST['user_id'],
				'post_id' => $_POST['post_id']
			);

			$vote = $this->model->deleteVote($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Vote',
				'function' => 'deleteVote',
				'action' => serialize($data)
			);
			$log->add($data2);
			
		}else{
			return false;
		}
	}
}