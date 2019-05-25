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
	
	function edit($id)
	{
		$css = array(
			'assets/plugins/select2/select2.min.css',
			'assets/plugins/select2/select2-bootstrap.css',
			'assets/plugins/wysihtml5/bootstrap-wysihtml5.css',
			'assets/plugins/summernote/summernote.css',
		);

		$js = array(
			'assets/plugins/select2/select2.min.js',
			'assets/plugins/wysihtml5/wysihtml5-0.3.0.js',
			'assets/plugins/wysihtml5/bootstrap-wysihtml5.js',
			'assets/plugins/summernote/summernote.min.js'
		);

		$custom_js = "<script type='text/javascript'>

			$('.wysihtml5').wysihtml5();

			$('.summernote').summernote({
                height: 400,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });

			//Parameter
			var delete_url = '".BASE_URL."template/delete/".$id."';
			var main_url = '".BASE_URL."template/index/';

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

		$model = $this->loadModel('template_model');
		$data = $model->listSingle($id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('template/edit');

		$header->set('css', $css);
		$footer->set('js', $js);
		$footer->set('custom_js', $custom_js);
		$template->set('data', $data);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
	
	function update()
	{
		$model = $this->loadModel('Template_model');
		if(isset($_POST)){
			$id = $_POST['id'];
			$data = array(
				'subject' => $_POST['subject'], 
				'body' => $_POST['body']
			);
			$model->editRecord($data,$id);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $session->get('user_id'),
				'controller' => 'Template',
				'function' => 'update',
				'action' => 'Update email template #'.$id
			);
			$log->add($data2);

			$this->redirect('template/index');
			
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

	// process datatable
	function process($post_id)
	{
		$datatable = $this->loadHelper('datatable_helper');

		// DB table to use
		$table = 'view_candidates';
		 
		// Table's primary key
		$primaryKey = 'id';

		$where = 'post_id = '.$post_id.'';

		$columns = array(
		    array( 'db' => 'post_name', 'dt' => 'post_name' ),
		    array( 'db' => 'full_name', 'dt' => 'full_name' ),
		    array( 'db' => 'jawatan', 'dt' => 'jawatan' ),
		    array( 'db' => 'jabatan', 'dt' => 'jabatan' ),
        	array(
		    	'db' => 'id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."candidate/view/".$d."\" class=\"btn btn-info btn-xs\">Edit</a>";
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
}