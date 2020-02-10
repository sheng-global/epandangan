<?php
/*
*  Title: FPX Controller
*  Version: 1.1 from 6 February 2020
*  Author: Fadli Saad
*  Website: https://apadmedia.website
*/

class Fpx extends Controller {

	public function index()
	{
		echo 'Hi';
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
			
			$data['user_id'] = $_POST['user_id'];
			$data['PAYEE_NAME'] = $_POST['payee_name'];
			$data['PAYEE_EMAIL'] = $_POST['payee_email'];
			$data['EMAIL'] = $_POST['payee_email'];
			$data['PAYEE_PHONE_NUMBER'] = $_POST['payee_phone_number'];
			$data['BANK_CODE'] = $_POST['bank_code'];
			$data['payment_type'] = $_POST['payment_type'];
			$data['BE_MESSAGE'] = $_POST['be_message'];
			$data['CURRENCY'] = 'MYR';

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
		var_dump(_POST);
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
			$data['MERCHANT_ORDER_NO'] = $_POST['MERCHANT_ORDER_NO'];
			$data['BUYER_BANK'] = $_POST['BUYER_BANK'];
			$data['BUYER_NAME'] = htmlspecialchars($_POST['BUYER_NAME'], ENT_QUOTES);
			$data['CHECKSUM'] = $_POST['CHECKSUM'];
			$data['currency'] = $_POST['currency'];
			$data['be_message'] = $_POST['be_message'];
			$data['email'] = $_POST['payee_email'];

			switch ($_POST['STATUS']) {
				case '1':
					$status = 'success';
					break;
				
				default:
					$status = 'failed';
					break;
			}

			$payment_data = array(
				'status' => $status,
				'remarks' => serialize($data)
			);

	    	$payment_id = $_POST['TRANS_ID'];

	    	/** Email start *****************************/

			$details = "<ul>
				<li>Payment Date/Time: ".$_POST['PAYMENT_DATETIME']."</li>
				<li>Amount: RM ".$_POST['AMOUNT']."</li>
				<li>FPX Transaction ID: ".$_POST['PAYMENT_TRANS_ID']."</li>
				<li>Seller Order ID: ".$_POST['MERCHANT_ORDER_NO']."</li>
				<li>Buyer Bank: ".$_POST['BUYER_BANK']."</li>
				<li>Buyer Name: ".$_POST['BUYER_NAME']."</li>
			</ul>";

			/** email end ******************************/

			$this->redirect('payment/ib_receipt/'.$payment_id);
		}else{
			echo "Error receiving POST data from E-payment";
		}
	}
}