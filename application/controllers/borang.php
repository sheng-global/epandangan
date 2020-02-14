<?php
use Carbon\Carbon as Carbon;
class Borang extends Controller {

	public function __construct()
	{
		$this->session = $this->loadHelper('session_helper');
		$this->model = $this->loadModel('Borang_model');

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
			'assets/libs/jquery-countdown/jquery-countdown.min.js',
			'assets/js/jquery.chained.js',
			'assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js'
		);

		if(empty($this->session->get('loggedin'))){
			$this->redirect('auth/login');
		}
	}

	function ptkl()
	{
		$custom_js = "<script type=\"text/javascript\">

			var base_url = '".BASE_URL."borang/process/borang_ptkl';
			
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
			            { data: 'nama_penuh' },
			            { data: 'ic_passport' },
			            { data: 'tarikh_terima' },
			            { data: 'action' }
			        ],
			        columnDefs: [
					    { width: '5%', 'targets': 0 },
					    { width: '50%', 'targets': 1 },
					    { width: '20%', 'targets': 2 },
					    { width: '10%', 'targets': 3 },
					    { width: '10%', 'targets': 4 }
					]
    			});

    			// create entry
				function create(){

					var post_url = '".BASE_URL."borang/addPTKL';

					$.ajax({
						type: 'POST',
						url: post_url,
						dataType: 'html',
						data: $('form#ptkl').serialize(),
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
        $template = $this->loadView('borang/index-ptkl');

		$header->set('css', $this->css);
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function pskl()
	{
		$custom_js = "<script type=\"text/javascript\">

			$('#rootwizard').bootstrapWizard({
		        'onNext': function (tab, navigation, index) {
		            var form = $($(tab).data(\"targetForm\"));
		            if (form) {
		                form.addClass('was-validated');
		                if (form[0].checkValidity() === false) {
		                    event.preventDefault();
		                    event.stopPropagation();
		                    return false;
		                }
		            }
		        }
		    });

			var base_url = '".BASE_URL."borang/process/borang_pskl';

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
			            { data: 'nama_penuh' },
			            { data: 'ic_passport' },
			            { data: 'tarikh_terima' },
			            { data: 'action' }
			        ],
			        columnDefs: [
					    { width: '5%', 'targets': 0 },
					    { width: '50%', 'targets': 1 },
					    { width: '20%', 'targets': 2 },
					    { width: '10%', 'targets': 3 },
					    { width: '10%', 'targets': 4 }
					]
    			});

    			// create entry
				function create(){

					var post_url = '".BASE_URL."borang/addPSKL';

					$.ajax({
						type: 'POST',
						url: post_url,
						dataType: 'html',
						data: $('form#pskl').serialize(),
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
        $template = $this->loadView('borang/index-pskl');

		$header->set('css', $this->css);
		$footer->set('custom_js', $custom_js);
		$footer->set('js', $this->js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function papar_ptkl($id)
	{
		$custom_css = "<style>
		@media print {
		    .printable {
		        background-color: white;
		        height: 100%;
		        width: 100%;
		        position: fixed;
		        top: 0;
		        left: 0;
		        margin: 0;
		        padding: 15px;
		        font-size: 14px;
		        line-height: 18px;
		    }
		}
		</style>";

		$data = $this->model->getByID('ptkl', $id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('borang/view-ptkl');

		$header->set('custom_css', $custom_css);
		$template->set('data', $data);
		$template->set('helper', $this->loadHelper('upload_helper'));
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function papar_ptkl_2($id)
	{
		$custom_css = "<style>
		@media print {
		    .printable {
		        background-color: white;
		        height: 100%;
		        width: 100%;
		        position: fixed;
		        top: 0;
		        left: 0;
		        margin: 0;
		        padding: 15px;
		        font-size: 14px;
		        line-height: 18px;
		    }
		}
		</style>";

		$data = $this->model->getByID('ptkl_2', $id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('borang/view-ptkl-2');

		$header->set('custom_css', $custom_css);
		$template->set('data', $data);
		$template->set('helper', $this->loadHelper('upload_helper'));
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function papar_pskl($id)
	{
		$custom_css = "<style>
		@media print {
		    .printable {
		        background-color: white;
		        height: 100%;
		        width: 100%;
		        position: fixed;
		        top: 0;
		        left: 0;
		        margin: 0;
		        padding: 15px;
		        font-size: 14px;
		        line-height: 18px;
		    }
		}
		</style>";

		$data = $this->model->getByID('pskl', $id);
		$matlamat = $this->model->getByID('matlamat', $id);

		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('borang/view-pskl');

		$header->set('custom_css', $custom_css);
		$template->set('data', $data);
		$template->set('matlamat', $matlamat);
		$template->set('helper', $this->loadHelper('upload_helper'));
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function pandangan($borang)
	{
		$easyCSRF = new EasyCSRF\EasyCSRF($this->session);

		# generate token
		$token = $easyCSRF->generate('token');

		$custom_js = "<script>

		var borang = '".$borang."';

		$(document).ready(function() {

			if(borang == 'ptkl'){
				Swal.fire({
					title: 'Makluman',
					text: 'Borang Penyertaan Awam Draf Perubahan 1 PBRKL 2020 telah ditutup',
					type: 'info'
				});
			}else{
				Swal.fire({
					title: 'Makluman',
					text: 'Sila baca Panduan Mengisi Borang terlebih dahulu sebelum mengisi borang penyertaan awam ini.',
					type: 'info'
				});
			}

			$('[data-countdown]').each(function () {
				finalDate = $(this).data('countdown');
				$(this).countdown(finalDate, function (event) {
					$(this).html(event.strftime('' + '%D hari %H jam %M minit %S s'));
				});
			});

			$(\"input[name='kategori']\").on('click', function(){
			    $('#row-organisasi').toggle(this.value === 'Organisasi' && this.checked);
			});
		});

		$(function () {
			$('#borang-".$borang."').parsley().on('field:validated', function() {
				var ok = $('.parsley-error').length === 0;
				$('.bs-callout-info').toggleClass('hidden', !ok);
				$('.bs-callout-warning').toggleClass('hidden', ok);
			});
		});

		$('#rootwizard').bootstrapWizard();

		$('#borang_pandangan_1').hide(); 

		$('#halatuju_1').chained('#matlamat_1');
		$('#tindakan_1').chained('#halatuju_1');

	    $('#tindakan_1').bind('change', function(event) {
	        if ('' != $('option:selected', this).val() && '' != $('option:selected', $('#halatuju_1')).val()) {
	            $('#borang_pandangan_1').fadeIn();
	        } else {
	            $('#borang_pandangan_1').hide();          
	        }
	    });

	    $('#borang_pandangan_2').hide();
	    $('#borang_matlamat_2').hide(); 

		$('#halatuju_2').chained('#matlamat_2');
		$('#tindakan_2').chained('#halatuju_2');

	    $('#tindakan_2').bind('change', function(event) {
	        if ('' != $('option:selected', this).val() && '' != $('option:selected', $('#halatuju_2')).val()) {
	            $('#borang_pandangan_2').fadeIn();
	        } else {
	            $('#borang_pandangan_2').hide();          
	        }
	    });

	    $('#borang_pandangan_3').hide();
	    $('#borang_matlamat_3').hide();  

		$('#halatuju_3').chained('#matlamat_3');
		$('#tindakan_3').chained('#halatuju_3');

	    $('#tindakan_3').bind('change', function(event) {
	        if ('' != $('option:selected', this).val() && '' != $('option:selected', $('#halatuju_3')).val()) {
	            $('#borang_pandangan_3').fadeIn();
	        } else {
	            $('#borang_pandangan_3').hide();          
	        }
	    });

	    $('#btnAdd1').click(function(){
	    	Swal.fire({
				title: 'Tambah',
				text: 'Sila pilih matlamat, halatuju dan tindakan yang selanjutnya.',
				type: 'info'
			});
	    	$('#borang_matlamat_2').show();
	    });

	    $('#btnAdd2').click(function(){
	    	Swal.fire({
				title: 'Tambah',
				text: 'Sila pilih matlamat, halatuju dan tindakan yang selanjutnya.',
				type: 'info'
			});
	    	$('#borang_matlamat_3').show();
	    });

	    $('#btnDel2').click(function(){
	    	Swal.fire({
				title: 'Hapus',
				text: 'Anda pasti? Pandangan dan justifikasi anda dalam ruangan ini akan dipadam.',
				type: 'warning'
			});
	    	$('#borang_matlamat_2').hide(function(){
	    		$('#borang_matlamat_2 textarea').val('');
	    	}); 
	    });

	    $('#btnDel3').click(function(){
	    	Swal.fire({
				title: 'Hapus',
				text: 'Anda pasti? Pandangan dan justifikasi anda dalam ruangan ini akan dipadam.',
				type: 'warning'
			});
	    	$('#borang_matlamat_3').hide(function(){
	    		$('#borang_matlamat_3 textarea').val('');
	    	}); 
	    });

		</script>";

		$this->auth_model = $this->loadModel('Auth_model');
		$profile = $this->auth_model->getUserProfile($this->session->get('user_id'));

		$header = $this->loadView('header');
		$navigation = $this->loadView('topbar');
		$footer = $this->loadView('footer');
        $template = $this->loadView('borang/tambah-'.$borang);

        if($borang == 'pskl'){

        	# dropdown chain select
        	$matlamat = $this->model->getDropdown('pskl_matlamat');
        	$halatuju = $this->model->getDropdown('pskl_halatuju');
        	$tindakan = $this->model->getDropdown('pskl_tindakan');

        	$template->set('matlamat', $matlamat);
        	$template->set('halatuju', $halatuju);
        	$template->set('tindakan', $tindakan);
        }

        $header->set('css', $this->css);
        $template->set('token', $token);
        $template->set('profile', $profile);
        $footer->set('js', $this->js);
        $footer->set('custom_js', $custom_js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	function add_ptkl()
	{
		$easyCSRF = new EasyCSRF\EasyCSRF($this->session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			echo $e->getMessage();
		}

		if(isset($_POST['submit'])){

			$this->filter = $this->loadHelper('Filter_helper');
			
			$dataBorang = array(
				'kategori' => $this->filter->sanitize($_POST['kategori']),
				'nama_organisasi' => $this->filter->sanitize($_POST['nama_organisasi']),
				'jumlah_nama' => $this->filter->sanitize($_POST['jumlah_nama']),
				'peta_indeks' => $this->filter->sanitize($_POST['peta_indeks']),
				'no_lot' => $this->filter->sanitize($_POST['no_lot']),
				'muka_surat' => $this->filter->sanitize($_POST['muka_surat']),
				'pandangan_awam' => $this->filter->sanitize($_POST['pandangan_awam']),
				'cadangan' => $this->filter->sanitize($_POST['cadangan']),
				'user_id' => $this->session->get('user_id'),
				'tarikh_terima' => Carbon::now()->toDateString(),
				'hadir' => $this->filter->sanitize($_POST['hadir'])
			);

			$insert = $this->model->addPTKL($dataBorang);

			$dataProfile = array(
				'nama_penuh' => $this->filter->sanitize($_POST['nama_penuh']),
				'ic_passport' => $this->filter->sanitize($_POST['ic_passport']),
				'alamat' => $this->filter->sanitize($_POST['alamat']),
				'poskod' => $this->filter->sanitize($_POST['poskod']),
				'telefon_rumah' => $this->filter->sanitize($_POST['telefon_rumah']),
				'telefon_pejabat' => $this->filter->sanitize($_POST['telefon_pejabat']),
				'telefon_bimbit' => $this->filter->sanitize($_POST['telefon_bimbit']),
				'user_id' => $this->session->get('user_id'),
			);

			$this->u_model = $this->loadModel('User_model');
			$this->u_model->updateProfile($dataProfile);

			# TODO: hantar notifikasi email

			$msg = array(
				'error_msg' => 'Maklumat borang pandangan awam anda telah berjaya dihantar.',
				'error_url' => BASE_URL.'dashboard',
				'error_type' => 'success',
				'error_title' => 'Borang berjaya dihantar'
			);

			if($this->filter->isInt($insert)){

				if(isset($_FILES)){

					$this->upload = $this->loadHelper('upload_helper');

					if(isset($_FILES['lampiran_a'])){

						$lampiran_a = array(
							'files' => $_FILES['lampiran_a'],
							'file_id' => $insert
						);

						$this->upload->add($lampiran_a);
					}

					if(isset($_FILES['lampiran_c'])){

						$lampiran_c = array(
							'files' => $_FILES['lampiran_c'],
							'file_id' => $insert
						);

						$this->upload->add($lampiran_c);
					}
				}

			}else{
				$msg = array(
					'error_msg' => 'Tiada maklumat pandangan awam diterima. Sila cuba semula.',
					'error_url' => BASE_URL.'borang/pandangan/ptkl',
					'error_type' => 'danger',
					'error_title' => 'Tiada maklumat'
				);
			}

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Borang',
				'function' => 'add',
				'action' => 'Add new PTKL form'
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

	function add_pskl()
	{
		$easyCSRF = new EasyCSRF\EasyCSRF($this->session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			echo $e->getMessage();
		}

		if(isset($_POST['submit'])){

			$this->filter = $this->loadHelper('Filter_helper');
			
			$dataBorang = array(
				'kategori' => $this->filter->sanitize($_POST['kategori']),
				'nama_organisasi' => $this->filter->sanitize($_POST['nama_organisasi']),
				'jumlah_nama' => $this->filter->sanitize($_POST['jumlah_nama']),
				'komen_bentuk_kandungan' => $this->filter->sanitize($_POST['komen_bentuk_kandungan']),
				'komen_lain_lain' => $this->filter->sanitize($_POST['komen_lain_lain']),
				'user_id' => $this->session->get('user_id'),
				'tarikh_terima' => Carbon::now()->toDateString(),
				'hadir' => $this->filter->sanitize($_POST['hadir'])
			);

			$borang_id = $this->model->addBorangPSKL($dataBorang);

			$dataBorangMatlamat = array(
				'borang_id' => $borang_id,
				'matlamat_id' => $this->filter->sanitize($_POST['matlamat']),
				'halatuju_id' => $this->filter->sanitize($_POST['halatuju']),
				'tindakan_id' => $this->filter->sanitize($_POST['tindakan']),
				'cadangan' => $this->filter->sanitize($_POST['cadangan']),
				'justifikasi' => $this->filter->sanitize($_POST['justifikasi'])
			);

			$this->model->addBorangMatlamat($dataBorangMatlamat);

			$dataProfile = array(
				'nama_penuh' => $this->filter->sanitize($_POST['nama_penuh']),
				'ic_passport' => $this->filter->sanitize($_POST['ic_passport']),
				'alamat' => $this->filter->sanitize($_POST['alamat']),
				'poskod' => $this->filter->sanitize($_POST['poskod']),
				'telefon_rumah' => $this->filter->sanitize($_POST['telefon_rumah']),
				'telefon_pejabat' => $this->filter->sanitize($_POST['telefon_pejabat']),
				'telefon_bimbit' => $this->filter->sanitize($_POST['telefon_bimbit']),
				'user_id' => $this->session->get('user_id'),
			);

			$this->u_model = $this->loadModel('Pengguna_model');
			$this->u_model->updateProfile($dataProfile);

			# TODO: hantar notifikasi email

			$msg = array(
				'error_msg' => 'Maklumat borang pandangan awam anda telah berjaya dihantar.',
				'error_url' => BASE_URL.'dashboard',
				'error_type' => 'success',
				'error_title' => 'Borang berjaya dihantar'
			);

			if($this->filter->isInt($borang_id)){

				if(isset($_FILES)){

					$this->upload = $this->loadHelper('upload_helper');

					if(isset($_FILES['lampiran_a'])){

						$lampiran_a = array(
							'files' => $_FILES['lampiran_a'],
							'file_id' => $insert
						);

						$this->upload->add($lampiran_a);
					}
				}

			}else{
				$msg = array(
					'error_msg' => 'Tiada maklumat pandangan awam diterima. Sila cuba semula.',
					'error_url' => BASE_URL.'borang/pandangan/pskl',
					'error_type' => 'danger',
					'error_title' => 'Tiada maklumat'
				);
			}

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Borang',
				'function' => 'add_pskl',
				'action' => 'Add new PSKL form'
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
	
	function edit($id)
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

	function update()
	{
		if(isset($_POST)){

			$data = array(
				'table' => $_POST['table'],
				'name' => $_POST['name'],
				'id' => $_POST['id']
			);

			$this->model->update($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Tetapan',
				'function' => 'update',
				'action' => 'Update data'
			);
			$log->add($data2);
			return true;

		}else{
			return false;
		}
	}
	
	function delete()
	{
		if(isset($_POST)){

			$data = array(
				'table' => $_POST['table'],
				'id' => $_POST['id']
			);

			$this->model->delete($data);

			# log user action
			$log = $this->loadHelper('log_helper');
			$data2 = array(
				'user_id' => $this->session->get('user_id'),
				'controller' => 'Tetapan',
				'function' => 'delete',
				'action' => 'Delete data'
			);
			$log->add($data2);
			return true;

		}else{
			return false;
		}
	}

	// process datatable
	function process($table)
	{
		$datatable = $this->loadHelper('datatable_helper');
		 
		// Table's primary key
		$primaryKey = 'borang_id';

		if($table == 'borang_ptkl'){
			$columns = array(
			    array(
			    	'db' => 'borang_id',
			    	'dt' => 'id',
			    	'formatter' => function( $d, $row ) {
	            		return "PBRKL2040/DRAF/".$d;
	        		}
	        	),
			    array( 'db' => 'nama_penuh', 'dt' => 'nama_penuh' ),
			    array( 'db' => 'ic_passport', 'dt' => 'ic_passport' ),
			    array( 'db' => 'tarikh_terima', 'dt' => 'tarikh_terima' ),
	        	array(
			    	'db' => 'borang_id',
			    	'dt' => 'action',
			    	'formatter' => function( $d, $row ) {
	            		return "<a class=\"btn btn-xs btn-info\" href=\"".BASE_URL."borang/papar_ptkl/".$d."\"> <i class=\"mdi mdi-square-edit-outline\"></i> Papar</a>";
	        		}
	        	)
			);
		}else{

		}
		 
		// SQL server connection information
		$sql_details = array(
		    'user' => DB_USER,
		    'pass' => DB_PASS,
		    'db'   => DB_NAME,
		    'host' => DB_HOST
		);
		 
		$data = json_encode(
		    $datatable::simple( $_POST, $sql_details, 'view_'.$table, $primaryKey, $columns )
		);
		print_r($data);
	}
}