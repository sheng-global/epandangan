<?php
/*
*  Title: FPX Controller
*  Version: 1.1 from 6 February 2020
*  Author: Fadli Saad
*  Website: https://apadmedia.website
*/

class Fpx extends Controller {

	public function __construct()
	{
		$this->model = $this->loadModel('Payment_model');
	}

	public function request()
	{
		if(isset($_POST)){

			$this->loadPlugin('stringencrypter');
			// Load env
			$dotenv = new Dotenv\Dotenv(ROOT_DIR);
			$dotenv->load();

			$secretKey = getenv('EPS_KEY');
			$passPhrase = getenv('EPS_API');

			$data['TRANS_ID'] = $_POST['transaction_id'];
			$data['PAYMENT_MODE'] = $_POST['payment_mode'];
			$data['AMOUNT'] = sprintf("%01.2f", $_POST['amount']);
			$data['MERCHANT_CODE'] = getenv('MERCHANT_CODE');
			$data['PAYEE_NAME'] = $_POST['payee_name'];
			$data['PAYEE_EMAIL'] = $_POST['payee_email'];
			$data['EMAIL'] = $_POST['payee_email'];
			$data['PAYEE_PHONE_NUMBER'] = $_POST['payee_phone_number'];
			$data['BANK_CODE'] = $_POST['bank_code'];
			$data['payment_type'] = $_POST['payment_type'];
			$data['BE_MESSAGE'] = $_POST['be_message'];
			$data['CURRENCY'] = 'MYR';
			$data['VERSION'] = $_POST['version'];

			$encrypt = new StringEncrypter($secretKey, $passPhrase);
			$data['CHECKSUM'] = $encrypt->encrypt($data['TRANS_ID'].$data['PAYMENT_MODE'].$data['AMOUNT'].$data['MERCHANT_CODE']);
			$data['API_KEY'] = $secretKey;

			echo "<form id=\"myForm\" action=\"https://epayment.dbkl.gov.my/eps/request\" method=\"post\">";
			foreach ($data as $a => $b) {
				echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
			}
			echo "</form>";
			echo "<script type=\"text/javascript\">
			    document.getElementById('myForm').submit();
			</script>";
		}else{
			echo "error: no post data received.";
		}
	}

	public function response()
	{
		if(isset($_POST)){

			$data = array();
			$data['PAYMENT_DATETIME'] = $_POST['PAYMENT_DATETIME'];
			$data['AMOUNT'] = $_POST['AMOUNT'];
			$data['PAYMENT_MODE'] = $_POST['PAYMENT_MODE'];
			$data['STATUS'] = $_POST['STATUS'];
			$data['STATUS_CODE'] = $_POST['STATUS_CODE'];
			$data['STATUS_MESSAGE'] = $_POST['STATUS_MESSAGE'];
			$data['PAYMENT_TRANS_ID'] = $_POST['PAYMENT_TRANS_ID'];
			$data['APPROVAL_CODE'] = $_POST['APPROVAL_CODE'];
			$data['RECEIPT_NO'] = $_POST['RECEIPT_NO'];
			$data['MERCHANT_CODE'] = $_POST['MERCHANT_CODE'];
			$data['SELLER_ORDER_NO'] = $_POST['SELLER_ORDER_NO'];
			$data['BUYER_BANK'] = $_POST['BUYER_BANK'];
			$data['BUYER_NAME'] = htmlspecialchars($_POST['BUYER_NAME'], ENT_QUOTES);
			$data['CHECKSUM'] = $_POST['CHECKSUM'];
			$data['TRANS_ID'] = $_POST['TRANS_ID'];
			$data['currency'] = $_POST['currency'];
			$data['be_message'] = $_POST['be_message'];
			$data['email'] = $_POST['payee_email'];
			$data['payee_name'] = $_POST['payee_name'];
			$data['payee_email'] = $_POST['payee_email'];
			$data['payee_phone_number'] = $_POST['payee_phone_number'];
			$data['payment_type'] = $_POST['payment_type'];
			$data['api_key'] = $_POST['api_key'];
			$data['VERSION'] = $_POST['VERSION'];

			switch ($data['STATUS']) {
				case '1':
					$status = 'success';
					
					# generate download link
					$url = BASE_URL.'space/download/'.$data['TRANS_ID'];

					if($data['VERSION'] == 'en') $link = getenv('DOWNLOAD_LINK_EN');
					else $link = getenv('DOWNLOAD_LINK_MY');

					# store download link
					$downloadData = array(
						'transaction_id' => $data['TRANS_ID'],
						'link' => $link,
						'count' => 0
					);
					$this->model->addDownload($downloadData);

					break;
				
				default:
					$status = 'failed';
					$link = NULL;
					break;
			}

			# update payment status
			$updateData = array(
				'transaction_id' => $data['TRANS_ID'],
				'status' => $status,
				'remarks' => serialize($data),
				'count' => 0
			);
			$this->model->updatePayment($updateData);

			$json_data = array(
				'response' => array(
					'payment_datetime' => $data['PAYMENT_DATETIME'],
					'amount' => $data['AMOUNT'],
					'status' => $status,
					'fpx_transaction_id' => $data['PAYMENT_TRANS_ID'],
					'seller_order_id' => $data['SELLER_ORDER_NO'],
					'receipt_no' => $_POST['RECEIPT_NO'],
					'link' => $url
				),
				'message' => array(
					'title' => "status",
					'code' => "1",
					'content' => "Payment"
				)
			);

			if($_POST['PAYMENT_MODE'] == 'fpx'){
				$payment_mode = 'Perbankan Internet (Individu)';
				$buyer_name = $data['BUYER_NAME'];
				$buyer_bank = $data['BUYER_BANK'];
			}

			if($_POST['PAYMENT_MODE'] == 'migs'){
				$payment_mode = 'Kad Kredit/Debit';
				$buyer_name = $data['payee_name'];
				$buyer_bank = 'N/A';
			}

	    	/** Email start *****************************/

			# send receipt email
			$email = $this->loadHelper('Email_helper');
				
			# choose email template
			$e_model = $this->loadModel('Mailer_model');
			$template = $e_model->getByID(4);
			$body = $template[0]['body'];
			$subject = $template[0]['subject'];

			$transaction_details = "<ul>
				<li>Payment Date/Time: ".$data['PAYMENT_DATETIME']."</li>
				<li>Amount: RM ".$data['AMOUNT']."</li>
				<li>Status: ".ucfirst($status)."</li>
				<li>FPX Transaction ID: ".$data['PAYMENT_TRANS_ID']."</li>
				<li>Seller Order ID: ".$data['SELLER_ORDER_NO']."</li>
				<li>Buyer Bank: ".$buyer_bank."</li>
				<li>Buyer Name: ".$buyer_name."</li>
			</ul>";

			# prepare the variable for email
			$vars = array(
				"{{EMAIL}}" => $data['email'],
				"{{FULLNAME}}" => $data['payee_name'],
				"{{DETAILS}}" => "Maklumat pembayaran adalah seperti berikut:<br>Jumlah : RM ".$_POST['AMOUNT']."<br>Daripada : ".$buyer_name." - ".$data['email']."<br>Jenis Pembayaran : ".strtoupper($_POST['payment_type'])."<br>Cara Pembayaran : ".$payment_mode."<br>Transaction ID: ".$_POST['TRANS_ID']."<br>Status : ".ucfirst($status)."<br>Keterangan Transaksi : <br>".$transaction_details,
				"{{BUTTON}}" => '<tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
				<td class="content-block aligncenter" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="'.$url.'" class="login">Muat Turun</a></td></tr>'
			);

			$content = strtr($body, $vars);

			$email_data = array(
				'email' => $data['email'], 
				'subject' => $subject, 
				'content' => $content 
			);

			# send the email
			$send = $email->send($email_data);

			/** email end ******************************/

			if($_POST['payment_type'] != 'WEB')
			{
				# mobile payment
				$payment_data = json_encode($json_data)."\n";
				echo $payment_data;
			}else{
				# Web payment
				$payment_id = $_POST['TRANS_ID'];
				$this->redirect('payment/ib_receipt/'.$payment_id);
			}

		}else{
			$msg['title'] = "status";
			$msg['code'] = "0";
			$msg['content'] = "Error receiving POST data from E-payment";

			$msg_data = json_encode($msg)."\n";
			echo htmlentities($msg_data);
		}
	}
}