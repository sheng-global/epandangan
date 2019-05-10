<?php

class Dashboard extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->date = $this->loadHelper('date_helper');
		$this->model = $this->loadModel('Dashboard_model');
		$this->filter = $this->loadHelper('filter_helper');

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

		$custom_js = "<script>
			// assign random color to ribbon
			var klasses = ['ribbon-primary', 'ribbon-info', 'ribbon-success', 'ribbon-warning', 'ribbon-danger', 'ribbon-dark', 'ribbon-blue', 'ribbon-pink', 'ribbon-secondary'];

			$('.ribbon').each(function(i, val) {
				$(this).addClass(klasses[i]);
			});

			$(document).on('click', '.open-modal', function () {
			    var postID = $(this).data('post-id');
			    
			    $('.modal-footer #postID').val( postID );
			    $('#modal').modal('show');

				if (parseInt(postID) === 9){
			    	var nama_url = '".BASE_URL."search.php?action=namaKewangan';
			    }
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
					createVote()
					.done(function(data){
						swal({
							title: 'Berjaya',
							text: 'Pencalonan telah berjaya dihantar.',
							type: 'success'
						}).then(function() {
			                location.reload();
			            });
					})
					.error(function(){
						swal('Oops', 'We could not complete the action!', 'error');
					});
				});

			});

		</script>";

		$this->vote_model = $this->loadModel('vote_model');
		$posts = $this->vote_model->getPosts();
		$candidates = $this->vote_model->getCandidates($this->filter->isInt($this->session->get('user_id')));

		$header = $this->loadView('header');
        $header->set('css', $css);
		$header->render();

		$navigation = $this->loadView('navigation');
		$navigation->render();

        $template = $this->loadView('dashboard');
        $template->set('posts', $posts);
        $template->set('candidates', $candidates);
		$template->render();

		$footer = $this->loadView('footer');
        $footer->set('custom_js', $custom_js);
        $footer->set('js', $js);
		$footer->render();
	}

}