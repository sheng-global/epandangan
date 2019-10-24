<?php

class Dashboard extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->date = $this->loadHelper('date_helper');
		$this->model = $this->loadModel('Dashboard_model');
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
			'assets/libs/sweetalert2/sweetalert2.min.css',
			'assets/libs/bootstrap-table/bootstrap-table.min.css'
		);

		$js = array(
			'assets/libs/select2/select2.min.js',
			'assets/js/pages/select2.init.js',
			'assets/libs/sweetalert2/sweetalert2.min.js',
			'assets/js/pages/sweet-alerts.init.js',
			'assets/libs/bootstrap-table/bootstrap-table.min.js',
			'assets/js/pages/bootstrap-tables.init.js'
		);

		$this->borang_model = $this->loadModel('Borang_model');
		$ptkl = $this->borang_model->getByUserID('ptkl', $this->session->get('user_id'));

		$template = $this->loadView('dashboard');

		$header = $this->loadView('header');
        $header->set('css', $css);
		$header->render();

		$topbar = $this->loadView('topbar');
		$topbar->render();

		$template->set('ptkl', $ptkl);
		$template->render();

		$footer = $this->loadView('footer');
        $footer->set('js', $js);
		$footer->render();
	}

	public function admin()
	{
		$header = $this->loadView('header');
		$topbar = $this->loadView('topbar');
        $template = $this->loadView('dashboard-admin');
		$footer = $this->loadView('footer');
		
		$header->render();
		$topbar->render();
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
		$template->set('data', $this->Candidate_model->getPosition($id));
		
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