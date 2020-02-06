<?php
/*
*  Title: Webhook Controller
*  Version: 1.0 from 18 January 2016
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

class Webhook extends Controller {

	/**
	* Run pull command
	*/
	public function pull()
	{
		$this->github();

		// The commands
		$commands = array(
			'cd /var/www/html/eshop',
			'git fetch',
			'git reset --hard origin/master',
			'git pull -rebase',
			'git status && git log -1 --pretty=%B%h',
		);
		foreach($commands AS $command){
			// Run it
			$tmp = shell_exec($command);
		}
		echo $tmp;
	}

	/**
	 * GitHub webhook handler template.
	 * 
	 * @see  https://developer.github.com/webhooks/
	 * @author  Miloslav Hůla (https://github.com/milo)
	 */

	private function github(){

		$hookSecret = 'rJFaLnArRh4v;BYrNh&awsWHIs4q.(5w4';  # set NULL to disable check

		set_error_handler(function($severity, $message, $file, $line) {
			throw new \ErrorException($message, 0, $severity, $file, $line);
		});

		set_exception_handler(function($e) {
			header('HTTP/1.1 500 Internal Server Error');
			echo "Error on line {$e->getLine()}: " . htmlSpecialChars($e->getMessage());
			die();
		});

		$rawPost = NULL;
		if ($hookSecret !== NULL) {
			if (!isset($_SERVER['HTTP_X_HUB_SIGNATURE'])) {
				throw new \Exception("HTTP header 'X-Hub-Signature' is missing.");
			} elseif (!extension_loaded('hash')) {
				throw new \Exception("Missing 'hash' extension to check the secret code validity.");
			}

			list($algo, $hash) = explode('=', $_SERVER['HTTP_X_HUB_SIGNATURE'], 2) + array('', '');
			if (!in_array($algo, hash_algos(), TRUE)) {
				throw new \Exception("Hash algorithm '$algo' is not supported.");
			}

			$rawPost = file_get_contents('php://input');
			if ($hash !== hash_hmac($algo, $rawPost, $hookSecret)) {
				throw new \Exception('Hook secret does not match.');
			}
		};

		if (!isset($_SERVER['CONTENT_TYPE'])) {
			throw new \Exception("Missing HTTP 'Content-Type' header.");
		} elseif (!isset($_SERVER['HTTP_X_GITHUB_EVENT'])) {
			throw new \Exception("Missing HTTP 'X-Github-Event' header.");
		}

		switch ($_SERVER['CONTENT_TYPE']) {
			case 'application/json':
				$json = $rawPost ?: file_get_contents('php://input');
				break;

			case 'application/x-www-form-urlencoded':
				$json = $_POST['payload'];
				break;

			default:
				throw new \Exception("Unsupported content type: $_SERVER[CONTENT_TYPE]");
		}

		$payload = json_decode($json);

		switch (strtolower($_SERVER['HTTP_X_GITHUB_EVENT'])) {
			case 'ping':
				echo 'pong';
				break;

		//	case 'push':
		//		break;

		//	case 'create':
		//		break;

			default:
				header('HTTP/1.0 404 Not Found');
				echo "Event:$_SERVER[HTTP_X_GITHUB_EVENT] Payload:\n";
				print_r($payload); # For debug only. Can be found in GitHub hook log.
		}
	}
}
