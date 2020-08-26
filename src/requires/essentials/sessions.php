<?php
/**
 * Sessions handler
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

namespace requires\essentials\Sessions;
use requires\essentials\Config\API as API;
use requires\essentials\handlers\Workers as Worker;

class Sessions
{
	function GetUser(){

		if (isset($_COOKIE['TL-TOKEN'])) {
			try {

				$headers = array(
                    'x-accesstoken: '.htmlspecialchars($_COOKIE["TL-TOKEN"]),
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Connection: close'
                );

				$data = json_decode(Worker::GET(API::ENDPOINTS['USER'], $headers), true);

				if($data["status"] == "ok") {
					self::Establish($data);
					return true;
				}
				else {
					self::Destroy();
					return false;
				}	

				// Validate token and establish login session
			} catch (Exception $e) {
				self::Destroy();
				return false;
			}
		}

	}

	function Establish($data){
		session_name("TL-SESSION");
		session_start();
		$_SESSION['username'] = htmlspecialchars($data['body']['user']['username']); // Just an example this will be removed in the future
		header("Location: /"); // Just an example
		return true;
	}

	function Destroy(){

		if(setcookie("token", "", time() - 3600) xor setcookie("TL-SESSION", "", time() - 3600)){
			echo "done";
			return true;
		}
		else {
			return false;
		}

	}
}

?>
