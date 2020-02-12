<?php
class Payment extends Controller {

	public function __construct()
	{
		$this->model = $this->loadModel('Payment_model');
	}

	# Online banking payment method
	function online_banking()
	{
		$custom_js = "<script type=\"text/javascript\">

			$(document).ready(function() {

				$.ajax({
		            type: \"GET\",
		            url: 'https://epayment.dbkl.gov.my/fpx/request_bank/fpx_mode:01/env:production/exchange:EX00002640',
		            success: function(msg) {
		                $('#select_bank').html(msg);
		            }
		        });

		        $('.form-horizontal').removeClass('col-md-4');
			});

			$('#select_bank').show();

			$('#fpx').click(function(){
				$('#select_bank').show();
			});

			$('#migs').click(function(){
				$('#select_bank').hide();
			});

		</script>";

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('payment/online-banking');

        $footer->set('custom_js', $custom_js);
		
		$header->render();
		$template->render();
		$footer->render();
	}

	# process online payment
	function online_process()
	{
		if(isset($_POST)){

	    	if($_POST['payment_type'] == 'web') $payment_type = 'WEB';
	    	else $payment_type = 'APP';
			$transaction_id = $payment_type.date('Ymdhis');

			$payment_data = array(
				'transaction_id' => $transaction_id,
				'amount' => $_POST['amount'],
				'payment_date' => date('Y-m-d'),
				'payment_time' => date('H:i:s'),
				'payment_type' => $payment_type,
				'payment_mode' => $_POST['payment_mode'],
				'remarks' => '',
				'status' => 'processing'
			);

			$this->model->addPayment($payment_data);

	    	$fpx_data = array(
				'transaction_id' => $transaction_id,
				'amount' => $_POST['amount'],
				'payee_name' => $_POST['fullname'],
				'payee_email' => $_POST['email'],
				'payee_phone_number' => $_POST['mobile'],
				'payment_type' => $payment_type,
				'payment_mode' => $_POST['payment_mode'],
				'bank_code' => $_POST['BANK_CODE'],
				'be_message' => $_POST['BE_MESSAGE']
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

        	// error
	    }
	}

	# internet banking receipt
	function ib_receipt($trans_id)
	{
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

		$header = $this->loadView('auth-header');
		$footer = $this->loadView('auth-footer');
        $template = $this->loadView('payment/ib-receipt');

		$data = $this->model->listSingleTransaction($trans_id);
		$template->set('data', $data);
		$footer->set('custom_js', $custom_js);
		
		$header->render();
		$template->render();
		$footer->render();
	}
}