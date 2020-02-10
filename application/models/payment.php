<?php
use Carbon\Carbon as Carbon;
class Payment extends Controller {
	
	# Online banking payment method
	function online_banking($type)
	{
		// Load env
		$dotenv = new Dotenv\Dotenv(ROOT_DIR);
		$dotenv->load();

		$session = $this->loadHelper('session_helper');
		if(empty($session->get('loggedin'))){
			$this->redirect('auth/login');
		}

		/* Staging */
		//$result = file_get_contents('https://epayment.lavapay.my/fpx/request_bank/exchange:EX00008383/fpx_mode:01/env:Production');
		
		/* Production */
		$result = file_get_contents('https://epayment.lavapay.my/fpx/request_bank/exchange:EX00008383/fpx_mode:01/env:Production');

		$token = strtok($result, "&");
		while ($token !== false)
		{
			list($key1, $value1) = explode("=", $token);
			$value1 = urldecode($value1);
			$response_value[$key1] = $value1;
			$token = strtok("&");
		}

		$fpx_msgToken = reset($response_value);
		$data = $response_value['fpx_bankList']."|".$fpx_msgToken."|".$response_value['fpx_msgType']."|".$response_value['fpx_sellerExId'];
		$token = strtok($response_value['fpx_bankList'], ",");
		while ($token !== false)
		{
			list($key1,$value1) = explode("~", $token);
			$value1 = urldecode($value1);
			$bank_list[$key1] = $value1;
			$token = strtok(",");
		}
		
		$fpx_bank = array(
				'ABB0232'  => 'Affin Bank',
				'ABB0233'  => 'Affin Bank',
				'ABMB0212' => 'Alliance Bank',
				'ABMB0213' => 'Alliance Bank',
				'AMBB0208' => 'AmBank',
				'AMBB0209' => 'AmBank',
				'BIMB0340' => 'Bank Islam',
				'BKRM0602' => 'Bank Rakyat',
				'BMMB0341' => 'Bank Muamalat',
				'BMMB0342' => 'Bank Muamalat',
				'BSN0601'  => 'BSN',
				'BCBB0235' => 'CIMB Clicks',
				'DBB0199'  => 'Deutsche Bank',
				'HLB0224'  => 'Hong Leong Bank',
				'HSBC0223' => 'HSBC Bank',
				'KFH0346'  => 'KFH',
				'MB2U0227' => 'Maybank2U',
				'MBB0227'  => 'Maybank2e.net',
				'MBB0228'  => 'Maybank2E',
				'OCBC0229' => 'OCBC Bank',
				'PBB0233'  => 'Public Bank',
				'RHB0218'  => 'RHB Bank',
				'SCB0215'  => 'Standard Chartered',
				'SCB0216'  => 'Standard Chartered',
				'UOB0226'  => 'UOB Bank',
				'UOB0227'  => 'UOB Bank',
				'UOB0228'  => 'UOB Bank',
				'UOB0229'  => 'UOB Bank',
			);
			
		foreach ($bank_list as $key => $result){
			$status = ($result == "A")? "":"(Offline)";
			$list_bank[$key] = $fpx_bank[$key].' '.$status;
		}

		$css = array(
			'assets/plugins/select2/select2.min.css',
			'assets/plugins/select2/select2-bootstrap.css',
		);

		$js = array(
			'assets/plugins/select2/select2.min.js'
		);

		$custom_js = "<script type=\"text/javascript\">

			$(document).ready(function() {

				//$('#bank_code').select2({
				//	theme: 'bootstrap',
				//	placeholder: 'Select bank'
				//});
			});

		</script>";

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('payment/online-banking');

        $header->set('css', $css);
		$footer->set('js', $js);
        $footer->set('custom_js', $custom_js);
        $template->set('payment_type', $type);
        $template->set('list_bank', $list_bank);
        $template->set('be_message', $data);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}

	# process online payment
	function online_process()
	{
		$session = $this->loadHelper('session_helper');
		$filter = $this->loadHelper('filter_helper');

		if(empty($session->get('loggedin'))){
			$this->redirect('auth/login');
		}

		if(isset($_POST)){

			# aunthenticate the token
			$googleAuthenticator = new Authenticator\GoogleAuthenticator();
			
		    if($googleAuthenticator->authenticate($_SESSION['authy_id'], $_POST['token'])) {

		    	if($_POST['payment_type'] == 'registration') $payment_type = 'REG';
		    	else $payment_type = 'WAL';
				$transaction_id = $payment_type.date('Ymdhis');

				# prepare user data
				$user_data = $this->w_model->listSingle($session->get('user_id'));

				$payment_data = array(
					'user_id' => $user_data[0]['user_id'],
					'transaction_id' => $transaction_id,
					'amount' => $_POST['amount'],
					'payment_date' => date('Y-m-d'),
					'payment_time' => date('H:i:s'),
					'attachment_id' => 0,
					'payment_type' => $_POST['payment_type'],
					'payment_mode' => $_POST['payment_mode'],
					'remarks' => '',
					'status' => 'processing'
				);
		    	
		    	# provision the transaction
		    	$this->p_model->addRecord($payment_data);

		    	$fpx_data = array(
					'user_id' => $user_data[0]['user_id'],
					'transaction_id' => $transaction_id,
					'amount' => $_POST['amount'],
					'payee_name' => $user_data[0]['full_name'],
					'payee_email' => $user_data[0]['email'],
					'payee_phone_number' => $user_data[0]['phone_number'],
					'payment_type' => $_POST['payment_type'],
					'payment_mode' => $_POST['payment_mode'],
					'bank_code' => $_POST['bank_code'],
					'be_message' => $_POST['be_message']
				);

		    	# pass to FPX controller
		    	echo "<form id=\"myForm\" action=\"".BASE_URL."fpx/request\" method=\"post\">";
				foreach ($fpx_data as $a => $b) {
					echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
				}
				echo "</form>";
				echo "<script type=\"text/javascript\">
				    document.getElementById('myForm').submit();
				</script>";

		    } else {

	        	$this->redirect('site/page/invalid-token');
		    }
			
		}else{
			die('Error: Unable to add the record.');
		}
	}

	# internet banking receipt
	function ib_receipt($trans_id)
	{
		$session = $this->loadHelper('session_helper');
		if(empty($session->get('loggedin'))){
			$this->redirect('auth/login');
		}

		$custom_js = "<script>
			$('ul#details li').each(function() {
			    var text = $(this).text();
			    text = text.replace('PAYMENT_DATETIME', 'Payment Date/Time');
			    text = text.replace('AMOUNT', 'Transaction Amount');
			    text = text.replace('PAYMENT_TRANS_ID', 'FPX Trn ID');
			    text = text.replace('MERCHANT_ORDER_NO', 'Seller Order Number');
			    text = text.replace('BUYER_BANK', 'Buyer Bank Name');
			    $(this).text(text);
			});
		</script>";

		$header = $this->loadView('header');
		$navigation = $this->loadView('navigation');
		$footer = $this->loadView('footer');
        $template = $this->loadView('payment/ib-receipt');

		$data = $this->p_model->listSingleByTransID($trans_id);
		$template->set('data', $data);
		$footer->set('custom_js', $custom_js);
		
		$header->render();
		$navigation->render();
		$template->render();
		$footer->render();
	}
}