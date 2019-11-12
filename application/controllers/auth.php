<?php
use Carbon\Carbon as Carbon;

class Auth extends Controller {

	function __construct()
	{
		$this->model = $this->loadModel('Auth_model');
	}

	public function admin()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('login');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	public function register()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('register');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	# user login page
	public function index()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('login-user');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	# user login page
	public function admin_login()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard/admin');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('login-user');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	# user recover password page
	public function recover()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('recover');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);
			$template->set('expiry', Carbon::now()->addMinutes(15));

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	# reset password with token
	public function password_token()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('token');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	# Process login for administrator
	public function process_login()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();
		$easyCSRF = new EasyCSRF\EasyCSRF($session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			echo $e->getMessage();
		}

		if(isset($_POST['submit'])){
			
			$data = array(
				'username' => $_POST['username'],
				'password' => $_POST['password']
			);

			$return = $this->model->processLogin($data);
			
			if(!is_array($return)){

				$msg = array(
					'error_msg' => $return,
					'error_type' => 'danger',
					'error_code' => '300'
				);
				
				$header = $this->loadView('auth-header');
				$footer = $this->loadView('auth-footer');
		        $template = $this->loadView('error/view');
				$template->set('data', $msg);

				$header->render();
				$template->render();
				$footer->render();

			}else{

				# get user data
				$user = $this->model->getUserProfileByEmail($_POST['username']);

				$session->set('loggedin', '1');
				$session->set('user_id', $user[0]['user_id']);
				$session->set('email', $user[0]['email']);
				$session->set('full_name', htmlspecialchars_decode($user[0]['nama_penuh']));
				$session->set('permission', $user[0]['permission']);
				$session->set('timestamp', date('Y-m-d H:i:s'));
				$session->set('last_ip', $_SERVER['REMOTE_ADDR']);

				if($user[0]['permission'] == 'user'){
					$this->redirect('dashboard');
				}else{
					$this->redirect('dashboard/admin');
				}
				
				exit;
			}

		}else{
			die('Error! Invalid or missing CSRF token');
		}
	}

	# Process register for user
	public function process_register()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();
		$easyCSRF = new EasyCSRF\EasyCSRF($session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			$msg = array(
				'error_msg' => $e->getMessage(),
				'error_type' => 'danger',
				'error_code' => '400'
			);
		}

		if(isset($_POST['submit'])){
			
			$dataUser = array(
				'username' => $_POST['username'],
				'password' => $_POST['password']
			);

			# check if user already exist
			$exist = $this->model->getUserByEmail($_POST['username']);
			
			if(!$exist){

				# add new user credential
				$this->model->addUser($dataUser);

				# get user ID
				$id = $this->model->getUserByEmail($_POST['username']);

				$dataProfile = array(
					'user_id' => $id[0]['id'],
					'nama_penuh' => $_POST['fullname']
				);

				# add new user profile
				$this->model->addProfile($dataProfile);

				# send welcoming email
				$email = $this->loadHelper('Email_helper');
				
				# choose email template
				$e_model = $this->loadModel('Mailer_model');
				$template = $e_model->getByID(1);
				$body = $template[0]['body'];
				$subject = "Pendaftaran dalam e-Pandangan";

				$full_name = htmlspecialchars($_POST['fullname'], ENT_QUOTES);

				$vars = array(
					"{{EMAIL}}" => $_POST['username'],
					"{{FULLNAME}}" => $full_name,
					"{{PASSWORD}}" => $_POST['password'],
					"{{BUTTON}}" => '<tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
				<td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="'.BASE_URL.'auth/login" class="login">Log masuk</a></td></tr>'
				);

				$content = strtr($body, $vars);

				$email_data = array(
					'email' => $_POST['username'], 
					'subject' => $subject, 
					'content' => $content 
				);

				# send the email
				$send = $email->send($email_data);

				if($send){
					$msg = array(
						'error_msg' => 'Satu e-mail telah dihantar kepada alamat e-mail anda mengandungi maklumat log masuk dan kata laluan. Sila semak e-mail anda nanti.',
						'error_type' => 'success',
						'error_title' => 'Pendaftaran berjaya'
					);
				}else{
					$msg = array(
						'error_msg' => 'Kami tidak berjaya menghantar e-mail kepada alamat yang anda masukkan. Sila semak semula samada ada kesalahan ejaan dan cuba semula.',
						'error_type' => 'danger',
						'error_title' => 'Gagal menghantar e-mail'
					);
				}
			}else{
				$msg = array(
					'error_msg' =>'Maklumat pendaftaran menggunakan alamat e-mail '.$_POST['username'].' telah wujud dalam sistem kami. Jika anda pasti ia adalah e-mail anda yang betul, sila klik pada pautan Log Masuk atau Lupa Kata Laluan bagi mendapatkan semula maklumat log masuk anda.',
					'error_type' => 'warning',
					'error_title' => 'Pendaftaran telah wujud'
				);
			}
		}else{
			$msg = array(
				'error_msg' => 'Tiada maklumat pendaftaran diterima. Sila cuba semula.',
				'error_type' => 'danger',
				'error_title' => 'Tiada maklumat'
			);
		}

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('error/info');
		$template->set('data', $msg);

		$header->render();
		$template->render();
		$footer->render();
	}

	# Process recover password
	public function process_recover()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();
		$easyCSRF = new EasyCSRF\EasyCSRF($session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			$msg = array(
				'error_msg' => $e->getMessage(),
				'error_type' => 'danger',
				'error_code' => '400'
			);
		}

		if(isset($_POST['submit'])){
			
			$dataUser = array(
				'username' => $_POST['username']
			);

			# check if email already exist
			$exist = $this->model->getUserByEmail($_POST['username']);
			
			if($exist){

				$dataToken = array(
					'user_id' => $exist[0]['id'],
					'token' => $_POST['token'],
					'expiry' => $_POST['expiry']
				);

				# store recovery token
				$this->model->addRecoveryToken($dataToken);

				# get user by ID
				$profile = $this->model->getUserProfile($exist[0]['id']);

				# send reset password instruction email
				$email = $this->loadHelper('Email_helper');
				
				# choose email template
				$e_model = $this->loadModel('Mailer_model');
				$template = $e_model->getByID(2);
				$body = $template[0]['body'];
				$subject = "Set semula kata laluan";

				$full_name = htmlspecialchars($profile[0]['nama_penuh'], ENT_QUOTES);

				$vars = array(
					"{{EMAIL}}" => $_POST['username'],
					"{{FULLNAME}}" => $full_name,
					"{{BUTTON}}" => '<tr style=\"font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
				<td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="'.BASE_URL.'auth/token/'.$_POST['token'].'" class="login">Set semula kata laluan</a></td></tr>'
				);

				$content = strtr($body, $vars);

				$email_data = array(
					'email' => $_POST['username'], 
					'subject' => $subject, 
					'content' => $content 
				);

				# send the email
				$send = $email->send($email_data);

				if($send){
					$msg = array(
						'error_msg' => 'Satu e-mail telah dihantar kepada alamat e-mail anda mengandungi pautan untuk set semula kata laluan anda. Sila semak e-mail anda nanti. Kod pengaktifan ini hanya sah bermula 15 minit dari sekarang.',
						'error_type' => 'success',
						'error_title' => 'Arahan set semula kata laluan berjaya'
					);
				}else{
					$msg = array(
						'error_msg' => 'Kami tidak berjaya menghantar e-mail kepada alamat yang anda masukkan. Sila semak semula samada ada kesalahan ejaan dan cuba semula.',
						'error_type' => 'danger',
						'error_title' => 'Gagal menghantar e-mail'
					);
				}
			}else{
				$msg = array(
					'error_msg' =>'Tiada maklumat pendaftaran menggunakan alamat e-mail '.$_POST['username'].' wujud dalam sistem kami. Jika anda pasti ia adalah e-mail anda yang betul, sila klik pada pautan Log Masuk atau Lupa Kata Laluan bagi mendapatkan semula maklumat log masuk anda.',
					'error_type' => 'warning',
					'error_title' => 'E-mail tidak wujud'
				);
			}
		}else{
			$msg = array(
				'error_msg' => 'Tiada maklumat e-mail diterima. Sila cuba semula.',
				'error_type' => 'danger',
				'error_title' => 'Tiada maklumat'
			);
		}

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('error/info');
		$template->set('data', $msg);

		$header->render();
		$template->render();
		$footer->render();
	}

	# Process reset password
	public function process_reset_password()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();
		$easyCSRF = new EasyCSRF\EasyCSRF($session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			$msg = array(
				'error_msg' => $e->getMessage(),
				'error_type' => 'danger',
				'error_code' => '400'
			);
		}

		if(isset($_POST['submit']) && isset($_POST['expiry_token'])){

			# check if token exist
			$valid = $this->model->checkToken($_POST['expiry_token']);
			
			if(is_array($valid)){

				# get user by ID
				$profile = $this->model->getUserProfile($valid[0]['user_id']);

				$passwordData = array(
					'id' => $valid[0]['user_id'],
					'password' => $_POST['password']
				);

				# update new password
				$this->model->updatePassword($passwordData);

				# delete recovery token
				$this->model->deleteRecoveryToken($_POST['expiry_token']);

				# send new password detail email
				$email = $this->loadHelper('Email_helper');
				
				# choose email template
				$e_model = $this->loadModel('Mailer_model');
				$template = $e_model->getByID(3);
				$body = $template[0]['body'];
				$subject = "Kata laluan baru";

				$full_name = htmlspecialchars($profile[0]['nama_penuh'], ENT_QUOTES);

				$vars = array(
					"{{EMAIL}}" => $profile[0]['email'],
					"{{FULLNAME}}" => $full_name,
					"{{PASSWORD}}" => $_POST['password'],
					"{{BUTTON}}" => '<tr style=\"font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
				<td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="'.BASE_URL.'auth" class="login">Log masuk</a></td></tr>'
				);

				$content = strtr($body, $vars);

				$email_data = array(
					'email' => $profile[0]['email'], 
					'subject' => $subject, 
					'content' => $content 
				);

				# send the email
				$send = $email->send($email_data);

				if($send){
					$msg = array(
						'error_msg' => 'Satu e-mail telah dihantar kepada alamat e-mail anda mengandungi maklumat kata laluan baru anda. Sila semak e-mail anda nanti. Anda boleh masuk ke e-Pandangan dengan menggunakan kata laluan yang baru ini.',
						'error_type' => 'success',
						'error_title' => 'Set semula kata laluan berjaya'
					);
				}else{
					$msg = array(
						'error_msg' => 'Kami tidak berjaya menghantar e-mail kepada alamat yang anda masukkan. Sila semak semula samada ada kesalahan ejaan dan cuba semula.',
						'error_type' => 'danger',
						'error_title' => 'Gagal menghantar e-mail'
					);
				}
			}else{
				$msg = array(
					'error_msg' =>'Tiada maklumat pendaftaran menggunakan alamat e-mail '.$profile[0]['email'].' wujud dalam sistem kami. Jika anda pasti ia adalah e-mail anda yang betul, sila klik pada pautan Log Masuk atau Lupa Kata Laluan bagi mendapatkan semula maklumat log masuk anda.',
					'error_type' => 'warning',
					'error_title' => 'E-mail tidak wujud'
				);
			}
		}else{
			$msg = array(
				'error_msg' => 'Tiada maklumat e-mail diterima. Sila cuba semula.',
				'error_type' => 'danger',
				'error_title' => 'Tiada maklumat'
			);
		}

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('error/info');
		$template->set('data', $msg);

		$header->render();
		$template->render();
		$footer->render();
	}

	# Process token from email link
	public function token($token)
	{
		if(isset($token)){

			$check = $this->model->checkToken($token);

			# token match
			if(isset($check[0]['token']) && $check[0]['token'] == $token){

				# token is not expired
				if($check[0]['expiry'] > Carbon:: now()){

					# redirect to reset password page
					$this->redirect('reset_password/'.$check[0]['user_id']);

				}else{
					$msg = array(
						'error_msg' =>'Pautan set semula kata laluan anda telah tamat tempoh. Sila dapatkan pautan baru.',
						'error_type' => 'danger',
						'error_title' => 'Pautan tamat tempoh'
					);
				}
			}else{
				$msg = array(
					'error_msg' =>'Pautan set semula kata laluan anda tidak sah. Sila dapatkan pautan baru.',
					'error_type' => 'danger',
					'error_title' => 'Pautan tidak sah'
				);
			}
		}else{
			$msg = array(
				'error_msg' =>'Pautan set semula kata laluan tidak mempunyai maklumat token yang diperlukan. Sila dapatkan pautan baru.',
				'error_type' => 'danger',
				'error_title' => 'Tiada token'
			);
		}

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('error/info');
		$template->set('data', $msg);

		$header->render();
		$template->render();
		$footer->render();
	}

	public function reset_password($expiry_token)
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();

		if($session->get('loggedin')){
			$this->redirect('dashboard');
		}else{
			$easyCSRF = new EasyCSRF\EasyCSRF($session);

			# generate token
			$token = $easyCSRF->generate('token');

			$header = $this->loadView('auth-header');
			$footer = $this->loadView('auth-footer');
	        $template = $this->loadView('reset');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('custom_js', $custom_js);
			$template->set('token', $token);
			$template->set('expiry_token', $expiry_token);

			$header->render();
			$template->render();
			$footer->render();
		}
	}

	private function formSubmit($msg)
	{
		$form = "<form id=\"myForm\" action=\"error\" method=\"post\">";
		foreach ($msg as $a => $b) {
			$form .="<input type=\"hidden\" name=\"".htmlentities($a)."\" value=\"".htmlentities($b)."\">";
		}
		$form .= "</form><script type=\"text/javascript\">document.getElementById('myForm').submit();</script>";
		return $form;
	}

	public function error()
	{
		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('error/view');
		$template->set('data', $_POST);

		$header->render();
		$template->render();
		$footer->render();
	}

	public function logout($role = NULL)
	{
		$session = $this->loadHelper('Session_helper');
		$session->destroy();

		$log = $this->loadHelper('log_helper');
		$data = array(
			'user_id' => $session->get('user_id'),
			'controller' => 'Auth',
			'function' => 'logout',
			'action' => 'Logout from system'
		);
		$log->add($data);

		if($role) $this->redirect('auth/'.$role);
		else $this->redirect('auth');
		exit;
	}

}