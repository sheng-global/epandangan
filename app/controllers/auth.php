<?php
use \Dolondro\GoogleAuthenticator as Authenticator;
class Auth extends Controller {

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

	# Voter login page
	public function index()
	{
		$js = array(
			'assets/libs/jquery-mask-plugin/jquery.mask.min.js',
			'assets/libs/autonumeric/autoNumeric-min.js',
			'assets/js/pages/form-masks.init.js'
		);

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
	        $template = $this->loadView('login-voter');

	        $custom_js = "<script>
				var referrer = document.referrer;
				$(document).ready(function() {
					$('#redirect').val(referrer);
				});
			</script>";

			$footer->set('js', $js);
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

		$model = $this->loadModel('Auth_model');

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
			$return = $model->processLogin($data);
			
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
				$user = $model->getUser($_POST['username']);

				$session->set('loggedin', '1');
				$session->set('role', 'admin');
				$session->set('user_id', $user[0]['user_id']);
				$session->set('email', $user[0]['email']);
				$session->set('full_name', htmlspecialchars_decode($user[0]['full_name']));
				$session->set('permission', $user[0]['permission']);
				$session->set('timestamp', date('Y-m-d H:i:s'));
				$session->set('last_ip', $_SERVER['REMOTE_ADDR']);

				# 2FA logic goes here if not required redirect to Dashboard

				if(getenv('2FA') == 'no'){

					$this->redirect('dashboard/admin');
					exit;

				}else{

					$session->set('token', false);
					$session->set('authy_id', $user[0]['authy_id']);
					$this->redirect('auth/login_token');
					exit;
				}
			}

		}else{
			die('Error! Invalid or missing CSRF token');
		}
	}

	# Process login for voter
	public function process_login_voter()
	{
		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();
		$easyCSRF = new EasyCSRF\EasyCSRF($session);

		$model = $this->loadModel('Auth_model');
		$filter = $this->loadHelper('filter_helper');

		$msg = array();

		try{
			$easyCSRF->check('token', $_POST['token']);
			$csrf = NULL;
		}catch(Exception $e){
			$csrf = $e->getMessage();
		}

		if(isset($_POST['submit'])){
			
			$data = array(
				'ic_passport' => $filter->sanitize($_POST['ic_passport']),
				'no_gaji' => $filter->sanitize($_POST['no_gaji'])
			);
			$return = $model->processLoginVoter($data);
			
			if(!is_array($return)){

				$msg = array(
					'error_msg' => $return,
					'error_type' => 'danger',
					'error_code' => '300',
					'csrf' => $csrf
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
				$user = $model->getVoter($filter->sanitize($_POST['ic_passport']));

				$session->set('loggedin', '1');
				$session->set('role', 'voter');
				$session->set('user_id', $user[0]['id']);
				$session->set('jawatan', $user[0]['jawatan']);
				$session->set('full_name', htmlspecialchars_decode($user[0]['full_name']));
				$session->set('gred_jawatan', $user[0]['gred_jawatan']);
				$session->set('jabatan', $user[0]['jabatan']);
				$session->set('timestamp', date('Y-m-d H:i:s'));
				$session->set('last_ip', $_SERVER['REMOTE_ADDR']);

				# 2FA logic goes here if not required redirect to Dashboard

				if(getenv('2FA') == 'no'){

					$this->redirect('vote');
					exit;

				}else{

					$session->set('token', false);
					$session->set('authy_id', $user[0]['authy_id']);
					$this->redirect('auth/login_token');
					exit;
				}
			}

		}else{
			die('Error! Invalid or missing CSRF token');
		}
	}

	public function login_token()
	{
		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
		$template = $this->loadView('2fa');
		
		$header->render();
		$template->render();
		$footer->render();
	}

	public function otp(){

		$googleAuthenticator = new Authenticator\GoogleAuthenticator();

		# load EasyCSRF and session provider
		$session = new EasyCSRF\NativeSessionProvider();
		$easyCSRF = new EasyCSRF\EasyCSRF($session);

		try{
			$easyCSRF->check('token', $_POST['token']);
		}catch(Exception $e){
			echo $e->getMessage();
		}

		$secretKey = $session->get('authy_id');
		$code = $_POST['otp'];
		$verify = $googleAuthenticator->authenticate($secretKey, $code);

	    if ($verify != false) {
			
			# add authenticated session
			$session->set('token', true);

			# TODO: set 2fa logic
			$this->redirect('dashboard/index');

	    } else {
	        $this->redirect('site/page/invalid-token');
	    }
	}

	public function sms(){

		$sms = $this->loadHelper('sms_helper');
		$session = new EasyCSRF\NativeSessionProvider();

		// get phone number from session
		$phone_number = $session->get('phone_no');
		$session->set('otp', 0);


		// check if this user already request for OTP
		$row = $model->checkSMS($phone_number);
		
		if($row){

			// alert user that an sms has been sent earlier and not yet verified
			$msg = $lang['otp_msg_unverified_1'].$phone_number.$lang['otp_msg_unverified_2'];
			$session->set('msgid', $row['messageid']);

		}else{

			// send new OTP
			(string) $newSessionID = $sms->login();

			// generate OTP number
			$otp_code = strtoupper(bin2hex(openssl_random_pseudo_bytes(3)));
			$otp_timestamp = date('Y-m-d h:i:s');

			// Prepare OTP message
			$message = $lang['otp_sms_1'].$otp_code.$lang['otp_sms_2'].$otp_timestamp;

			// send OTP to user mobile phone
			$sendData = array(
			    'sessionid' => $newSessionID,
			    'message' => $message,
			    'to' => $phone_number
			);
			(string) $newMsgid = $sms->send($sendData);

			// Insert into DB
			$data = array(
				'phone_number' => $phone_number, 
				'verification_code' => $otp_code, 
				'sessionid' => (string) $newSessionID, 
				'messageid' => (string) $newMsgid, 
				'last_update' => date('Y-m-d H:i:s')
			);

			$model->insertSMS($data);

			// inform user that SMS has been successfully sent
			$msg = $lang['otp_msg_verified_1'].$phone_number.$lang['otp_msg_verified_2'];

			$session->set('msgid', (string) $newMsgid);
		}

		$session->set('msg', $msg);
		$this->redirect('pop');
		exit;
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