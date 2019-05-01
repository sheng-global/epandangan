<?php

class Dashboard extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->date = $this->loadHelper('date_helper');

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth/login');
		}
	}

	public function index()
	{
		$css = array(
			'assets/plugins/datatables/jquery.dataTables.min.css',
			'assets/plugins/datatables/responsive.bootstrap.min.css',
			'assets/plugins/datatables/buttons.bootstrap.min.css',
			'assets/css/jquery.loading.min.css',
			'assets/plugins/select2/select2.min.css'
		);

		$js = array(
			'assets/plugins/datatables/media/js/jquery.dataTables.min.js',
			'assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
			'assets/plugins/datatables/dataTables.responsive.min.js',
			'assets/plugins/datatables/responsive.bootstrap.min.js',
			'assets/pages/datatables.init.js',
			'assets/js/jquery.loading.min.js',
			'assets/plugins/select2/select2.min.js'
		);

		$custom_js = "<script type='text/javascript'>

		</script>";
		
		$header = $this->loadView('header');
		$header->set('css', $css);
		$header->render();

		$navigation = $this->loadView('navigation');
		$navigation->render();

        $template = $this->loadView('dashboard');
		$template->render();

		$footer = $this->loadView('footer');
		$footer->set('js', $js);
		$footer->set('custom_js', $custom_js);
		$footer->render();
	}

	// process order datatable
	public function process_order($order_type)
	{
		switch ($order_type) {
			case 'active':
				$query = "status IN ('pending', 'received', 'processing', 'approved')";
				break;
			
			case 'completed':
				$query = "status = 'completed'";
				break;

			case 'others':
				$query = "status IN ('cancelled', 'rejected')";
				break;
		}

		$datatable = $this->loadHelper('datatable_helper');

		// DB table to use
		$table = 'view_booking';

		// Condition
		$user_id = $this->session->get('user_id');
		
		switch ($this->session->get('role_id')) {
			case '0': # Super Admin
				$whereAll = $query;
				break;

			case '1': # Manager
				$whereAll = $query;
				break;

			case '2': # User
				$whereAll = $query." AND user_id = '".$user_id."' AND ".$query;
				break;
			
			default:
				$whereAll = $query." AND user_id = '".$user_id."' AND ".$query;
				break;
		}
		 
		// Table's primary key
		$primaryKey = 'id';

		$columns = array(
		    array( 'db' => 'group_id', 'dt' => 'group_id' ),
		    array(
		    	'db' => 'booking_date',
		    	'dt' => 'booking_date',
		    	'formatter' => function($d, $row){
		    		return $this->date->convertDate($d);
		    	}
		    ),
		    array( 'db' => 'full_name', 'dt' => 'full_name' ),
		    array( 'db' => 'facility', 'dt' => 'facility' ),
		    array(
		    	'db' => 'start_date',
		    	'dt' => 'start_date',
		    	'formatter' => function($d, $row){
		    		return $this->date->convertTimestamp($d);
		    	}
		    ),
		    array(
		    	'db' => 'end_date',
		    	'dt' => 'end_date',
		    	'formatter' => function($d, $row){
		    		return $this->date->convertTimestamp($d);
		    	}
		    ),
		    array(
		    	'db' => 'status',
		    	'dt' => 'status',
		    	'formatter' => function( $d, $row ) {
		    		switch ($d) {
		    			case 'received':
		    				return "<span class=\"label label-primary label-xs\">Received</span>";
		    				break;
		    			case 'processing':
		    				return "<span class=\"label label-success label-xs\">Processing</span>";
		    				break;
		    			case 'approved':
		    				return "<span class=\"label label-info label-xs\">Approved</span>";
		    				break;
		    			case 'cancelled':
		    				return "<span class=\"label label-warning label-xs\">Cancelled</span>";
		    				break;
		    			case 'rejected':
		    				return "<span class=\"label label-danger label-xs\">Rejected</span>";
		    				break;
		    			case 'completed':
		    				return "<span class=\"label label-purple label-xs\">Completed</span>";
		    				break;
		    			default:
		    				return "<span class=\"label label-default label-xs\">Pending</span>";
		    				break;
		    		}
        		}
		    ),
        	array(
		    	'db' => 'group_id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."catalog/booking_details/".$d."\" class=\"btn btn-info btn-xs\">Details</a>";
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
			  $datatable::complex( $_POST, $sql_details, $table, $primaryKey, $columns, $whereResult=null, $whereAll )
		);
		print_r($data);
	}

}