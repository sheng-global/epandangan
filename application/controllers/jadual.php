<?php
class Jadual extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Jadual_model');

		$this->css = array(
			'assets/libs/datatables/dataTables.bootstrap4.css',
			'assets/libs/datatables/responsive.bootstrap4.css',
			'assets/libs/datatables/buttons.bootstrap4.css',
			'assets/libs/datatables/select.bootstrap4.css',
			'assets/libs/custombox/custombox.min.css',
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
			'assets/js/pages/datatables.init.js',
			'assets/libs/custombox/custombox.min.js',
			'assets/libs/sweetalert2/sweetalert2.min.js',
			'assets/js/pages/sweet-alerts.init.js',
			'assets/libs/parsleyjs/parsleyjs.min.js',
			'assets/libs/parsleyjs/il8n/ms.js',
			'assets/libs/jquery-countdown/jquery-countdown.min.js'
		);

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth/login');
		}
	}

	function senarai()
	{
		$custom_js = "<script type=\"text/javascript\">

			var base_url = '".BASE_URL."jadual/process_senarai';
			
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
			            { data: 'id' },
			            { data: 'lokasi_id' },
			            { data: 'zon_id' },
			            { data: 'tarikh' },
			            { data: 'slot_masa' },
			            { data: 'chairman' },
			            { data: 'ajk_1' },
			            { data: 'ajk_2' },
			            { data: 'action' }
			        ],
			        columnDefs: [
					    { width: '5%', 'targets': 0 },
					    { width: '10%', 'targets': 8 }
					]
    			});

    			// create entry
				function create(){

					var post_url = '".BASE_URL."jadual/addJadual';

					$.ajax({
						type: 'POST',
						url: post_url,
						dataType: 'html',
						data: $('form#jadual').serialize(),
						success:function(response){
							if(parseInt(response) == 0){
								Swal.fire({
									title: 'Ralat',
									text: 'Ruangan nama adalah kosong. Sila isi dengan betul.',
									type: 'warning'
								});
							}else{
								Swal.fire({
									title: 'Berjaya',
									text: 'Maklumat telah berjaya ditambah.',
									type: 'success'
								}).then(function() {
					                location.reload();
					            });
							}
						}
				    });

				}
    			
    		});

		</script>";
		
		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('jadual/index-jadual');

		$header->set('css', $this->css);
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	public function process_senarai()
	{
		$table = 'view_sesi_jadual';
		 
		$primaryKey = 'id';

		$columns = array(
		    array( 'db' => 'id', 'dt' => 'id' ),
		    array( 'db' => 'lokasi_id', 'dt' => 'lokasi_id' ),
		    array( 'db' => 'zon_id', 'dt' => 'zon_id' ),
		    array( 'db' => 'tarikh', 'dt' => 'tarikh' ),
		    array( 'db' => 'slot_masa', 'dt' => 'slot_masa' ),
		    array( 'db' => 'chairman', 'dt' => 'chairman' ),
		    array( 'db' => 'ajk_1', 'dt' => 'ajk_1' ),
		    array( 'db' => 'ajk_2', 'dt' => 'ajk_2' ),
		    array(
		    	'db' => 'id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."jadual/editJadual/".$d."\" class=\"btn btn-primary btn-xs\">Ubah</a>";
        		}
        	)
		);
		 
		$sql_details = array(
		    'user' => DB_USER,
		    'pass' => DB_PASS,
		    'db'   => DB_NAME,
		    'host' => DB_HOST
		);

		$datatable = $this->loadHelper('datatable_helper');
		 
		$data = json_encode(
		    $datatable::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
		);
		print_r($data);
	}

}