<?php
Class Sms_helper{

	private $username = getenv('SMS_USERNAME');
	private $password = getenv('SMS_PASSWORD');

	public function postData($url, $data){

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	public function login(){

		/*
		<?xml version="1.0" encoding="utf-8" ?>
		<rsp status="ok">
		    <sessionid>897f8klhcr1vcgq1em54piql74</sessionid>
		</rsp>
		*/

		$url = getenv('SMS_URL').'login.php';
		$data = array(
			'username' => $this->username,
			'password' => sha1($this->password)
		);
		$load = $this->postData($url, $data);
		$xml = simplexml_load_string($load) or die("Error: Cannot create object");
		return $xml->sessionid;
	}

	public function send($data){

		/*
		<?xml version="1.0" encoding="utf-8" ?>
		<rsp status="OK">
		    <messageid>051551162806001</messageid>
		</rsp>
		*/

		$url = getenv('SMS_URL').'sendmsg.php';
		$go = array(
			'sessionid' => $data['sessionid'],
			'msgtype' => 'text',
			'message' => $data['message'],
			'to' => $data['to']
		);
		$load = $this->postData($url, $go);
		$xml = simplexml_load_string($load) or die("Error: Cannot create object");
		return $xml->messageid;
	}
	
	public function details($data){

		/*
		<?xml version="1.0" encoding="utf-8" ?>
		<rsp status="OK">
		    <stats>
		        <record>
		            <msgid>051550473838001</msgid>
		            <aparty>063338383</aparty>
		            <bparty>0126471057</bparty>
		            <msgtype>netsms</msgtype>
		            <startdate>1550473845</startdate>
		            <enddate>1550473845</enddate>
		            <status>Pending</status>
		            <statusdesc>Pending</statusdesc>
		        </record>
		    </stats>
		</rsp>
		*/

		$url = getenv('SMS_URL').'getsendstatus.php';
		$go = array(
			'sessionid' => $data['sessionid'],
			'msgid' => $data['messageid']
		);
		$load = $this->postData($url, $go);
		$xml = simplexml_load_string($load) or die("Error: Cannot create object");
		return $xml;
	}

	public function logout($session){

		/*
		<?xml version="1.0" encoding="utf-8" ?>
		<rsp status="OK"></rsp>
		*/

		$url = getenv('SMS_URL').'logout.php';
		$data = array(
			'sessionid' => $session
		);
		$load = $this->postData($url, $data);
		$xml = simplexml_load_string($load) or die("Error: Cannot create object");
		return $xml;
	}
}