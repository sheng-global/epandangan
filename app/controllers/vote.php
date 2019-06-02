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
		$candidates = $this->model->getVote();
		$submission = $this->model->countSubmission($this->filter->isInt($this->session->get('user_id')));

		if($submission){
			$total = $submission[0]['total'];
			$toVote = $submission[0]['to_vote'];
		}else{
			$total = 0;
			$toVote = 0;
		}

		$post = $this->model->countPost();

		$custom_js = "<script>

			var submission = '".$total."';
			var post = '".$post[0]['total']."';
			var toVote = '".$toVote."';
			var diff = parseInt(post) - parseInt(submission);
			var voter_id = '".$this->session->get('user_id')."';

			// assign random color to ribbon
			var klasses = ['ribbon-primary', 'ribbon-info', 'ribbon-success', 'ribbon-warning', 'ribbon-danger', 'ribbon-dark', 'ribbon-blue', 'ribbon-pink', 'ribbon-secondary'];

			$('.ribbon').each(function(i, val) {
				$(this).addClass(klasses[i]);
			});

			$(document).on('click', '.open-modal', function () {
			    var postID = $(this).data('post-id');
			    
			    $('.modal-footer #postID').val( postID );
			    $('#modal').modal('show');

			    if(parseInt(postID) === 4){
			    	var nama_url = '".BASE_URL."search.php?action=wanitaOnly';
		    	}
		    	else{
					var nama_url = '".BASE_URL."search.php?action=nama';
		    	}
				
				$('#nama').select2({
					dropdownParent: $('#modal'),
					width: 'resolve',
					placeholder: 'Pilih calon',
					minimumInputLength: 2,
				    ajax: {
				        url: nama_url,
				        dataType: 'json',
				        delay: 250,
				        processResults: function (data) {
				            return {
				            	results: data
				            };
				        },
				        cache: true
				    }
				});

				// Create vote
				function createVote(){

					var create_url = '".BASE_URL."vote/addCandidate';

					return $.ajax({
						type: 'POST',
						url: create_url,
						dataType: 'html',
						data: $('form#voting-form').serialize()
				    });
				}

				$('#save-vote').bind('click', function (e) {

					e.preventDefault();
					$('#save-vote').attr('disabled', 'disabled');
					createVote();
					swal({
						title: 'Berjaya',
						text: 'Pencalonan telah berjaya dibuat.',
						type: 'success'
					}).then(function() {
		                location.reload();
		            });
				});

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

			$data = array(
				'user-id' => $_POST['user_id'],
				'post_id' => $_POST['post_id']
			);

			$this->model->addVote($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Vote',
				'function' => 'addVote',
				'action' => 'Add new vote'
			);
			$log->add($data2);

			return true;
			
		}else{
			return false;
		}
	}
}