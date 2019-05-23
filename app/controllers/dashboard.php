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

		$this->vote_model = $this->loadModel('vote_model');
		$posts = $this->vote_model->getPosts();
		$candidates = $this->vote_model->getCandidates($this->filter->isInt($this->session->get('user_id')));
		$submission = $this->vote_model->countSubmission($this->filter->isInt($this->session->get('user_id')));
		$post = $this->vote_model->countPost();

		$custom_js = "<script>

			var submission = '".$submission[0]['total']."';
			var post = '".$post[0]['total']."';
			var toVote = '".$submission[0]['to_vote']."';
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

			$(document).ready(function(){

				var submit_url = '".BASE_URL."vote/updateCandidates';

				console.log(toVote);

				if(parseInt(submission) === parseInt(post) && toVote === 'no'){
					swal('Terima kasih!', '', 'info');
					swal({
			            title: 'Tahniah!',
			            text: 'Anda telah melengkapkan borang pencalonan ini. Jika anda bersetuju dengan pencalonan anda, sila klik pada butang Hantar untuk mengesahkan pencalonan anda. Jika anda ingin menukar pencalonan anda, sila tekan butang Batal.',
			            type: 'question',
			            showCancelButton: true,
			            confirmButtonText: 'Hantar',
			            cancelButtonText: 'Batal'
			        }).then(function(){
						$.ajax({
							type: 'POST',
							url: submit_url,
							data: 'voter_id='+ voter_id,
							success: function(){
								swal({
									title: 'Berjaya',
									text: 'Borang pencalonan anda telah dihantar. Terima kasih kerana menggunakan perkhidmatan e-voting ini.',
									type: 'success'
								}).then(function() {
									location.reload();
								})
							}
						})
						.error(function() {
							swal('Oops', 'Error connecting to the server!', 'error');
						});
					}, function (dismiss) {
						if (dismiss === 'cancel') {
							swal(
								'Batal',
								'Pencalonan anda belum dihantar kepada urusetia. Sila sahkan pencalonan anda sebelum tamat tempoh pencalonan.',
								'info'
							)
						}
					});
				}

				if(parseInt(submission) < parseInt(post)){
					swal('Makluman', 'Pencalonan anda masih belum lengkap. Terdapat '+ diff + ' lagi kekosongan yang perlu diisi. Sila lengkapkan borang pencalonan anda', 'info')
				}

				if(parseInt(submission) === 0){
					swal('Selamat datang', 'Terima kasih kerana menggunakan perkhidmatan e-voting bagi pemilihan calon kali ini. Sila klik pada butang Pilih Calon bagi setiap jawatan yang dipertandingkan.', 'info')
				}

				if(toVote === 'yes'){
					swal('Tahniah!', 'Pencalonan anda masih telah lengkap. Terima kasih kerana menggunakan perkhidmatan e-voting ini. Sila tunggu hari pengundian untuk memilih calon pilihan anda.', 'success')
				}
			});

		</script>";

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