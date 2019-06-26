<?php

class Dashboard extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->date = $this->loadHelper('date_helper');
		$this->model = $this->loadModel('Dashboard_model');
		$this->filter = $this->loadHelper('filter_helper');
		$this->vote_model = $this->loadModel('vote_model');
		$this->Candidate_model = $this->loadModel('Candidate_model');

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

		$template = $this->loadView('dashboard');

		$posts = $this->vote_model->getPosts();
		$candidates = $this->vote_model->getCandidates($this->filter->isInt($this->session->get('user_id')));
		$submission = $this->vote_model->countSubmission($this->filter->isInt($this->session->get('user_id')));
		$toVote = $this->vote_model->checkNomination($this->filter->isInt($this->session->get('user_id')));

		if($submission){
			$total = $submission[0]['total'];
		}else{
			$total = 0;
		}

		if($toVote){
			$checkNomination = $toVote[0]['status'];
		}else{
			$checkNomination = 'no';
		}

		$post = $this->vote_model->countPost();

		# semak jika user ada terpilih sebagai calon
		$nominated = $this->Candidate_model->checkVoteListByID($this->session->get('user_id'));
		if($nominated){
			if(array_search('yes', $nominated)){
				$jsNominated = 'no';
			}else{
				$jsNominated = 'yes';
			}
		}else{
			$jsNominated = 'no';
		}

		$custom_js = "<script>

			var submission = '".$total."';
			var post = '".$post[0]['total']."';
			var diff = parseInt(post) - parseInt(submission);
			var voter_id = '".$this->session->get('user_id')."';
			var toVote = '".$checkNomination."';
			var nominated = '".$jsNominated."';

			// assign random color to ribbon
			var klasses = ['ribbon-primary', 'ribbon-info', 'ribbon-success', 'ribbon-warning', 'ribbon-danger', 'ribbon-dark', 'ribbon-blue', 'ribbon-pink', 'ribbon-secondary'];

			$('.ribbon').each(function(i, val) {
				$(this).addClass(klasses[i]);
			});

			$(document).on('click', '.open-modal', function () {
			    var postID = $(this).data('post-id');
			    
			    $('.modal-footer #postID').val( postID );
			    $('#modal').modal('show');

			    if(parseInt(postID) === 4 || parseInt(postID) === 7){
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

				// semak jika user ada terpilih sebagai calon
				if(nominated == 'yes'){
					swal('Perhatian', 'Anda mempunyai '+ '".count($nominated)."' + ' pencalonan bagi pemilihan kali ini. Sila semak pencalonan anda dan sahkan samada anda menerima atau menolak pencalonan ini. Jika anda mempunyai lebih dari 2 pencalonan, anda hanya boleh memilih maksima 2 jawatan sahaja.', 'info')
				}

				// agree to nomination
				function agreeNomination(){

					var create_url = '".BASE_URL."candidate/agreeNomination';

					return $.ajax({
						type: 'POST',
						url: create_url,
						dataType: 'html',
						data: $('form#agree-form').serialize()
				    });
				}

				$('#save-nomination').bind('click', function (e) {

					e.preventDefault();
					$(this).attr('disabled', 'disabled');
					agreeNomination();
					swal({
						title: 'Berjaya',
						text: 'Persetujuan anda telah diterima dan direkodkan.',
						type: 'success'
					}).then(function() {
		                location.reload();
		            });
				});

				/* 

				swal('Pencalonan Tutup', 'Terima kasih kerana menggunakan perkhidmatan e-voting bagi pemilihan calon kali ini. Pencalonan telah ditutup.', 'success');

				var submit_url = '".BASE_URL."vote/updateCandidates';

				if(parseInt(submission) < parseInt(post)){
					swal('Makluman', 'Pencalonan anda masih belum lengkap. Terdapat '+ diff + ' lagi kekosongan yang perlu diisi. Sila lengkapkan borang pencalonan anda', 'info')
				}

				if(toVote == 'no'){

					if(parseInt(submission) === parseInt(post)){
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

				}else{
					swal('Terima kasih', 'Terima kasih kerana menggunakan perkhidmatan e-voting bagi pemilihan calon kali ini. Pencalonan anda telah selesai.', 'success')
				}

				if(parseInt(submission) === 0){
					swal('Selamat datang', 'Terima kasih kerana menggunakan perkhidmatan e-voting bagi pemilihan calon kali ini. Sila klik pada butang Pilih Calon bagi setiap jawatan yang dipertandingkan.', 'info')
				} */
			});

		</script>";

		$header = $this->loadView('header');
        $header->set('css', $css);
		$header->render();

		$navigation = $this->loadView('navigation');
		$navigation->render();

        $template->set('posts', $posts);
        $template->set('candidates', $candidates);
        $template->set('nomination', $nominated);
		$template->render();

		$footer = $this->loadView('footer');
        $footer->set('custom_js', $custom_js);
        $footer->set('js', $js);
		$footer->render();
	}

	public function admin()
	{
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
        $template = $this->loadView('dashboard-admin');
		$footer = $this->loadView('footer');
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	public function view($id)
	{
		$custom_js = "<script type=\"text/javascript\">
			var base_url = '".BASE_URL."dashboard/process/".$id."';
			
			$(document).ready(function() {

    			$('#datatable').DataTable({
    				serverSide : true,
    				processing : true,
    				ajax : {
    					url : base_url,
    					type : 'POST'
    				},
    				deferRender : true,
    				error : true,
    				columns: [
			            { data: 'full_name' },
			            { data: 'jawatan' },
			            { data: 'jabatan' },
			            { data: 'count' }
			        ],
			        order: [
						[ 3, 'desc' ]
					]
    			});
    			
    		});
		</script>";

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
        $template = $this->loadView('result');
		$footer = $this->loadView('footer');

		$header->set('css', $this->css);
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	// process datatable
	function process($post_id)
	{
		$datatable = $this->loadHelper('datatable_helper');

		// DB table to use
		$table = 'view_result_'.$post_id;
		 
		// Table's primary key
		$primaryKey = 'id';

		$columns = array(
		    array( 'db' => 'full_name', 'dt' => 'full_name' ),
		    array( 'db' => 'jawatan', 'dt' => 'jawatan' ),
		    array( 'db' => 'jabatan', 'dt' => 'jabatan' ),
		    array( 'db' => 'count', 'dt' => 'count' )
		);
		 
		// SQL server connection information
		$sql_details = array(
		    'user' => DB_USER,
		    'pass' => DB_PASS,
		    'db'   => DB_NAME,
		    'host' => DB_HOST
		);
		 
		$data = json_encode(
		    $datatable::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
		);
		print_r($data);
	}

}