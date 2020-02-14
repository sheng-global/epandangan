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
			'assets/libs/sweetalert2/sweetalert2.min.css',
			'assets/libs/select2/select2.min.css',
			'assets/libs/flatpickr/flatpickr.min.css'
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
			'assets/libs/select2/select2.min.js',
			'assets/libs/flatpickr/flatpickr.min.js'
		);

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth');
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

	function tambahSesi()
	{
		$easyCSRF = new EasyCSRF\EasyCSRF($this->session);

		# generate token
		$token = $easyCSRF->generate('token');

		$custom_js = "<script>
		var select_lokasi = '".BASE_URL."search.php?table=lokasi';
		var select_zon = '".BASE_URL."search.php?table=zon';

		$(document).ready(function(){
			
			$('#lokasi').select2({
				placeholder: 'Pilih lokasi',
			    ajax: {
			        url: select_lokasi,
			        dataType: 'json',
			        processResults: function (data) {
			            return {
			            	results: data
			            };
			        }
			    },
			    cache: true
			});

			$('#zon').select2({
				placeholder: 'Pilih zon strategik',
			    ajax: {
			        url: select_zon,
			        dataType: 'json',
			        processResults: function (data) {
			            return {
			            	results: data
			            };
			        }
			    },
			    cache: true
			});

			$('#datepicker').flatpickr({
				altInput: true,
				minDate: \"today\",
				altFormat: \"j F Y\",
				dateFormat: \"Y-m-d\"
			});

			$('.timepicker').flatpickr({
				enableTime: true,
				noCalendar: true,
				dateFormat: \"H:i K\"
			});
		});

		$(function () {
			$('#borang-sesi').parsley().on('field:validated', function() {
				var ok = $('.parsley-error').length === 0;
				$('.bs-callout-info').toggleClass('hidden', !ok);
				$('.bs-callout-warning').toggleClass('hidden', ok);
			});
		});
		</script>";

		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('jadual/tambah-sesi');

        $header->set('css', $this->css);
        $template->set('token', $token);
        $footer->set('js', $this->js);
        $footer->set('custom_js', $custom_js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function createSesi()
	{
		$easyCSRF = new EasyCSRF\EasyCSRF($this->session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			echo $e->getMessage();
		}

		if(isset($_POST['submit'])){

			$this->filter = $this->loadHelper('Filter_helper');
			
			$data = array(
				'lokasi_id' => $this->filter->sanitize($_POST['lokasi_id']),
				'zon_id' => $this->filter->sanitize($_POST['zon_id']),
				'tarikh' => $this->filter->sanitize($_POST['tarikh']),
				'slot_masa' => $this->filter->sanitize($_POST['masa_mula']).'-'.$this->filter->sanitize($_POST['masa_tamat']),
				'chairman' => $this->filter->sanitize($_POST['chairman']),
				'ajk_1' => $this->filter->sanitize($_POST['ajk_1']),
				'ajk_2' => $this->filter->sanitize($_POST['ajk_2']),
				'keterangan' => $this->filter->sanitize($_POST['keterangan'])
			);

			$insert = $this->model->addSesi($data);

			if($this->filter->isInt($insert)){

				$msg = array(
					'error_msg' => 'Maklumat jadual sesi pendengaran ini telah berjaya disimpan.',
					'error_url' => BASE_URL.'jadual/senarai',
					'error_type' => 'success',
					'error_title' => 'Sesi berjaya disimpan'
				);

			}else{

				$msg = array(
					'error_msg' => 'Tiada maklumat jadual sesi pendengaran diterima. Sila cuba semula.',
					'error_url' => BASE_URL.'jadual/tambahSesi',
					'error_type' => 'danger',
					'error_title' => 'Tiada maklumat disimpan'
				);
			}

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Jadual',
				'function' => 'createSesi',
				'action' => 'Tambah sesi pendengaran'
			);
			$log->add($data2);

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('error/notification');
			$template->set('data', $msg);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	public function process_senarai()
	{
		$table = 'view_sesi_jadual';
		 
		$primaryKey = 'id';

		$columns = array(
		    array( 'db' => 'id', 'dt' => 'id' ),
		    array( 'db' => 'lokasi', 'dt' => 'lokasi_id' ),
		    array( 'db' => 'zon', 'dt' => 'zon_id' ),
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