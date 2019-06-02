<?php

class Candidate extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Candidate_model');

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

	function view($post_id)
	{
		$custom_js = "<script type=\"text/javascript\">
			var base_url = '".BASE_URL."candidate/process/".$post_id."';
			
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
			            { data: 'count' },
			            { data: 'action' }
			        ]
    			});
    			
    		});
		</script>";
		
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('candidate/view');

		$header->set('css', $this->css);
		$template->set('data', $this->model->getPosition($post_id));
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function nomination($user_id)
	{
		$custom_js = "<script>
		$(document).ready(function(){
			$('#add-picture').hide();
			$('#tambah-gambar').click(function(){
				$('#add-picture').toggle('slow');
			});
		});
		</script>";

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('candidate/nomination');

		$template->set('data', $this->model->getNomination($user_id));
		$template->set('helper', $this->loadHelper('upload_helper'));
		$footer->set('custom_js', $custom_js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function posts()
	{
		$custom_js = "<script type=\"text/javascript\">
			var base_url = '".BASE_URL."candidate/process_posts/';
			
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
			            { data: 'post_name' },
			            { data: 'post_available' },
			            { data: 'min_nomination_require' },
			            { data: 'indicator' },
			            { data: 'action' }
			        ]
    			});
    			
    		});
		</script>";
		
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('candidate/post');

		$header->set('css', $this->css);
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
	
	function add()
	{
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('template/insert');

        $header->set('css', $css);
		$footer->set('js', $js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
	
	function create()
	{
		$model = $this->loadModel('Template_model');
		if(isset($_POST)){
			
			$data = array(
				'recipient' => '{{EMAIL}}',
				'subject' => $_POST['subject'],
				'body' => $_POST['body']
			);
			$model->addRecord($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $session->get('user_id'),
				'controller' => 'Template',
				'function' => 'create',
				'action' => 'Add new email template'
			);
			$log->add($data2);

			$this->redirect('template/index');
			
		}else{
			die('Error: Unable to add the record.');
		}
	}
	
	function edit_post($id)
	{
		$custom_js = "<script type='text/javascript'>

			//Parameter
			var delete_url = '".BASE_URL."candidate/delete/".$id."';
			var main_url = '".BASE_URL."candidate/posts/';

		    $('#delete').click(function(){
		        swal({
		            title: 'Are you sure?',
		            text: 'You will not be able to recover this record!',
		            type: 'warning',
		            showCancelButton: true,
		            confirmButtonText: 'Yes, delete it!',
		            cancelButtonText: 'Cancel',
		            closeOnConfirm: false,
		            closeOnCancel: true
		        },function(){
					$.ajax({
						type: 'POST',
						url: delete_url,
						success: function(){
							
						}
					})
					.done(function() {
						swal({
							title: 'Success',
							text: 'The record is successfully deleted.',
							type: 'success'
						},function() {
							window.location.href = main_url;
						});
					})
					.error(function() {
						swal('Oops', 'Error connecting to the server!', 'error');
					});
				});
		    });
		</script>";

		$data = $this->model->getPosition($id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('candidate/edit_post');

		$footer->set('custom_js', $custom_js);
		$template->set('data', $data);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
	
	function update_post()
	{
		if(isset($_POST)){

			$data = array(
				'id' => $_POST['id'],
				'post_name' => $_POST['post_name'], 
				'post_available' => $_POST['post_available'],
				'min_nomination_require' => $_POST['min_nomination_require'],
				'indicator' => $_POST['indicator']
			);

			$this->model->updatePost($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Candidate',
				'function' => 'update',
				'action' => 'Update post #'.$_POST['id']
			);
			$log->add($data2);

			$this->redirect('candidate/posts');
			
		}else{
			die('Error: Unable to update the record.');
		}
	}
	
	function delete($id)
	{
		if(isset($id)){

			$model = $this->loadModel('Template_model');
			$model->deleteRecord($id);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $session->get('user_id'),
				'controller' => 'Template',
				'function' => 'delete',
				'action' => 'Delete email template #'.$id
			);
			$log->add($data2);

			$this->redirect('template/index');
		}else{
			die('Error: Unable to delete the record.');
		}
	}

	function updateNomination()
	{
		if(isset($_FILES)){

			$this->upload = $this->loadHelper('upload_helper');

			$data = array(
				'files' => $_FILES['files'],
				'controller' => 'candidate',
				'file_id' => $_POST['user_id']
			);
			$this->upload->add($data);
		}

		$this->redirect('candidate/nomination/'.$_POST['user_id']);
	}

	// process datatable
	function process($post_id)
	{
		$datatable = $this->loadHelper('datatable_helper');

		// DB table to use
		$table = 'view_candidates';
		 
		// Table's primary key
		$primaryKey = 'user_id';

		$where = 'post_id = '.$post_id.'';

		$columns = array(
		    array( 'db' => 'post_name', 'dt' => 'post_name' ),
		    array( 'db' => 'full_name', 'dt' => 'full_name' ),
		    array( 'db' => 'jawatan', 'dt' => 'jawatan' ),
		    array( 'db' => 'jabatan', 'dt' => 'jabatan' ),
		    array( 'db' => 'count', 'dt' => 'count' ),
        	array(
		    	'db' => 'user_id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."candidate/nomination/".$d."\" class=\"btn btn-info btn-xs\">Papar</a>";
        		}
        	)
		);
		 
		// SQL server connection information
		$sql_details = array(
		    'user' => DB_USER,
		    'pass' => DB_PASS,
		    'db'   => DB_NAME,
		    'host' => DB_HOST
		);
		 
		$data = json_encode(
		    $datatable::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $where )
		);
		print_r($data);
	}

	// process datatable
	function process_posts()
	{
		$datatable = $this->loadHelper('datatable_helper');

		// DB table to use
		$table = 'posts';
		 
		// Table's primary key
		$primaryKey = 'id';

		$columns = array(
		    array( 'db' => 'post_name', 'dt' => 'post_name' ),
		    array( 'db' => 'post_available', 'dt' => 'post_available' ),
		    array( 'db' => 'min_nomination_require', 'dt' => 'min_nomination_require' ),
		    array( 'db' => 'indicator', 'dt' => 'indicator' ),
        	array(
		    	'db' => 'id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."candidate/edit_post/".$d."\" class=\"btn btn-info btn-xs\">Ubah</a>";
        		}
        	)
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