<?php
class Payment extends Controller {

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

	    	if($_POST['payment_type'] == 'registration') $payment_type = 'REG';
	    	else $payment_type = 'WAL';
			$transaction_id = $payment_type.date('Ymdhis');

			$payment_data = array(
				'user_id' => 1,
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

	    	$fpx_data = array(
				'user_id' => 1,
				'transaction_id' => $transaction_id,
				'amount' => $_POST['amount'],
				'payee_name' => 'Fadli Saad',
				'payee_email' => 'fadlisaad@gmail.com',
				'payee_phone_number' => '0126471057',
				'payment_type' => $_POST['payment_type'],
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

        	$this->redirect('site/page/invalid-token');
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

		$template->set('data', $data);
		$footer->set('custom_js', $custom_js);
		
		$header->render();
		$template->render();
		$footer->render();
	}
}