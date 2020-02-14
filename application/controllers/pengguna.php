<?php

class Pengguna extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Pengguna_model');
		$this->filter = $this->loadHelper('filter_helper');

		$this->css = array(
			'assets/libs/datatables/dataTables.bootstrap4.css',
			'assets/libs/datatables/responsive.bootstrap4.css',
			'assets/libs/datatables/buttons.bootstrap4.css',
			'assets/libs/datatables/select.bootstrap4.css',
			'assets/libs/sweetalert2/sweetalert2.min.css'
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
			'assets/js/pages/datatables.init.js',
			'assets/js/pages/select2.init.js',
			'assets/libs/sweetalert2/sweetalert2.min.js',
			'assets/js/pages/sweet-alerts.init.js'
		);

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth');
		}
	}

	function index()
	{
		$custom_js = "<script type='text/javascript'>
			var base_url = '".BASE_URL."pengguna/process';
			
			$(document).ready(function() {

    			$('#datatable').DataTable({
    				responsive : true,
    				serverSide : true,
    				processing : true,
    				ajax : {
    					url : base_url,
    					type : 'POST'
    				},
    				error : true,
    				columns: [
			            { data: 'full_name' },
			            { data: 'email' },
			            { data: 'role_id' },
			            { data: 'status' },
			            { data: 'action' }
			        ],
			        columnDefs: [
					    { width: '10%', 'targets': 1 },
					    { width: '5%', 'targets': 3 },
					    { width: '5%', 'targets': 4 }
					]
    			});
    		});
		</script>";
		
		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('pengguna/index');

		$header->set('css', $this->css);
		$footer->set('js', $this->js);
		$footer->set('custom_js', $custom_js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();

		$log = $this->loadHelper('log_helper');
		$log_data = array(
			'user_id' => $this->session->get('user_id'),
			'controller' => 'User',
			'function' => 'index',
			'action' => 'View user index'
		);
		$log->add($log_data);
	}
	
	function add()
	{
		$css = array(
			'assets/plugins/select2/select2.min.css'
		);

		$js = array(
			'assets/plugins/select2/select2.min.js'
		);

		$custom_js = "<script>

			$('#role_id').select2({
				placeholder: 'Choose user level'
			});

		</script>";

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('pengguna/insert');

        $header->set('css', $css);
		$footer->set('js', $js);
        $footer->set('custom_js', $custom_js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
	
	function create()
	{
		if(isset($_POST)){

			$latest = $this->model->getLatest();
			$id = $latest[0]['id']+1;

			$user_data = array(
				'user_id' => $id,
				'full_name' => $_POST['full_name'],
				'email' => $_POST['email'],
				'role_id' => $_POST['role_id']
			);

			$this->model->addRecord($user_data);

			$log = $this->loadHelper('log_helper');
			$log_data = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'User',
				'function' => 'create',
				'action' => 'Create new user'
			);
			$log->add($log_data);


			$this->redirect('pengguna/index');
			
		}else{
			die('Error: Unable to add the record.');
		}
	}
	
	function edit($id)
	{
		$css = array(
			'assets/plugins/select2/select2.min.css',
			'assets/plugins/datatables/jquery.dataTables.min.css',
			'assets/plugins/datatables/responsive.bootstrap.min.css'
		);

		$js = array(
			'assets/plugins/select2/select2.min.js',
			'assets/plugins/datatables/media/js/jquery.dataTables.min.js',
			'assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
			'assets/plugins/datatables/dataTables.responsive.min.js',
			'assets/plugins/datatables/responsive.bootstrap.min.js',
			'assets/pages/datatables.init.js'
		);

		$custom_js = "<script>

			$('#role_id').select2({
				placeholder: 'Choose user level'
			});

			//Parameter
			var delete_url = '".BASE_URL."pengguna/delete/".$id."';
			var main_url = '".BASE_URL."pengguna/index';

		    $('#delete').on('click', function(){
		        swal({
		            title: 'Are you sure?',
		            text: 'You will not be able to recover this record!',
		            type: 'question',
		            showCancelButton: true,
		            confirmButtonText: 'Yes, delete it!',
		            cancelButtonText: 'Cancel'
		        }).then(function(){
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
						}).then(function() {
							window.location.href = main_url;
						});
					})
					.error(function() {
						swal('Oops', 'Error connecting to the server!', 'error');
					});
				}, function (dismiss) {
					if (dismiss === 'cancel') {
						swal(
							'Cancelled',
							'The record is safe :)',
							'info'
						)
					}
				});
		    });

		</script>";

		$data = $this->model->listSingle($id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('pengguna/edit');

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
		if(isset($_POST)){

			$id = $_POST['id'];
			$data = array(
				'full_name' => $_POST['full_name'],
				'email' => $this->filter->isEmail($_POST['email']),
				'role_id' => $_POST['role_id'],
				'status' => $_POST['status']
			);

			$this->model->editRecord($data, $id);

			$log = $this->loadHelper('log_helper');
			$log_data = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'User',
				'function' => 'update',
				'action' => 'Update user '.$_POST['full_name']
			);
			$log->add($log_data);


			$this->redirect('pengguna/index');
			
		}else{
			die('Error: Unable to update the record.');
		}
	}

	public function profile($id)
	{
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('pengguna/profile');
		$template->set('user', $this->model->listSingle($id));

		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();

		$log = $this->loadHelper('log_helper');
		$log_data = array(
			'user_id' => $this->session->get('user_id'),
			'controller' => 'User',
			'function' => 'profile',
			'action' => 'View user profile #'.$id
		);
		$log->add($log_data);
	}
	
	function delete($id)
	{
		if(isset($id)){

			$this->model->delete($id);

			$log = $this->loadHelper('log_helper');
			$log_data = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'User',
				'function' => 'delete_calon',
				'action' => 'Delete calon #'.$id
			);
			$log->add($log_data);

		}else{
			die('Error: Unable to delete the record.');
		}
	}

	// process datatable
	function process()
	{
		global $config;

		$datatable = $this->loadHelper('datatable_helper');

		// DB table to use
		$table = 'view_user';
		 
		// Table's primary key
		$primaryKey = 'user_id';

		$columns = array(
		    array( 'db' => 'full_name', 'dt' => 'full_name' ),
		    array( 'db' => 'email', 'dt' => 'email' ),
		    array(
		    	'db' => 'role_id',
		    	'dt' => 'role_id',
		    	'formatter' => function( $d, $row ) {
		    		switch ($d) {
		    			case '0':
		    				return "Super Administrator";
		    				break;
		    			case '1':
		    				return "Administrator";
		    				break;
		    			case '2':
		    				return "User";
		    				break;
		    			default:
		    				return "User";
		    				break;
		    		}
        		}
		    ),
		   	array(
		    	'db' => 'status',
		    	'dt' => 'status',
		    	'formatter' => function( $d, $row ) {
		    		if ($d == 'active') return "<span class=\"label label-success label-xs\">Active</span>";
		    		else return "<span class=\"label label-warning label-xs\">Inactive</span>";
        		}
		    ),
        	array(
		    	'db' => 'user_id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."pengguna/edit/".$d."\" class=\"btn btn-primary btn-xs\">Edit</a>";
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