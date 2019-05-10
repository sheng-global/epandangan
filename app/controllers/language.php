<?php
/**
* Language Controller
*
* Language controller for PIP.
*
* @package    	PIP
* @subpackage 	Language
* @author 		Fadli Saad (https://fadli.my)
*/
class Language extends Controller {
	
	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Language_model');

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
			'assets/libs/sweetalert2/sweetalert2.min.js',
			'assets/js/pages/sweet-alerts.init.js'
		);

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth/login');
		}
	}

	public function index()
	{
		$custom_js = "<script type='text/javascript'>
			var base_url = '".BASE_URL."language/process';
			
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
			            { data: 'slug' },
			            { data: 'language' },
			            { data: 'content' },
			            { data: 'action' }
			        ],
				    order: [
						[ 0, 'desc' ]
					]
    			});

    			var regenerate_url = '".BASE_URL."language/regenerate';
				var main_url = '".BASE_URL."language/index/';

    			$('#regenerate-language').on('click', function(){
			        swal({
			            title: 'Are you sure?',
			            text: 'New language files will be regenerate.',
			            type: 'question',
			            showCancelButton: true,
			            confirmButtonText: 'Yes, do it!',
			            cancelButtonText: 'Cancel'
			        }).then(function(){
						$.ajax({
							type: 'POST',
							url: regenerate_url,
							success: function(){
								
							}
						})
						.done(function() {
							swal({
								title: 'Success',
								text: 'The language files is successfully generated.',
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

    		});
		</script>";
		
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('language/index');

		$header->set('css', $this->css);
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();

		$log = $this->loadHelper('log_helper');
		$log_data = array(
			'user_id' => $this->session->get('user_id'),
			'controller' => 'Language',
			'function' => 'index',
			'action' => 'View language index page'
		);
		$log->add($log_data);
	}

	function regenerate()
	{
		$lang = new Lang_helper();
		$lang->createLanguageFile('en',true);
		$lang->createLanguageFile('my',true);

		# log user action
		$log = $this->loadHelper('log_helper');
		$log_data = array(
			'user_id' => $this->session->get('user_id'),
			'controller' => 'Language',
			'function' => 'regenerate',
			'action' => 'New languages file regerated'
		);
		$log->add($log_data);
	}

	function changeLanguage($lang)
	{
		setcookie('lang', $lang, time() + (3600 * 24 * 30));
		$session->set('lang', $lang);
	}

	public function process()
	{
		$table = 'languages';
		 
		$primaryKey = 'id';

		$columns = array(
		    array( 'db' => 'slug', 'dt' => 'slug' ),
		    array( 'db' => 'language', 'dt' => 'language' ),
		    array( 'db' => 'content', 'dt' => 'content' ),
		    array(
		    	'db' => 'id',
		    	'dt' => 'action',
		    	'formatter' => function( $d, $row ) {
            		return "<a href=\"".BASE_URL."language/edit/".$d."\" class=\"btn btn-primary btn-xs\">Edit</a>";
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

	function add()
	{
		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('language/add');
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
	
	function create()
	{
		if(isset($_POST)){

			$dataEn = array(
				'slug' => $_POST['slug'],
				'language' => 'en',
				'content' => $_POST['content-en']
			);

			$this->model->add($dataEn);

			$dataMy = array(
				'slug' => $_POST['slug'],
				'language' => 'my',
				'content' => $_POST['content-my']
			);

			$this->model->add($dataMy);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Language',
				'function' => 'create',
				'action' => 'Add new language'
			);
			$log->add($data2);

			$this->redirect('language/index');
			
		}else{
			die('Error: Unable to add the record.');
		}
	}
	
	function edit($id)
	{
		$custom_js = "<script type='text/javascript'>

			//Parameter
			var delete_url = '".BASE_URL."language/delete/".$id."';
			var main_url = '".BASE_URL."language/index/';

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

		$data = $this->model->get($id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('language/edit');

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
				'user_id' => $this->session->get('user_id'),
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
				'user_id' => $this->session->get('user_id'),
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

}