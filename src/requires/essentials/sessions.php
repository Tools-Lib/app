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
	function CheckUser(){

		if (isset($_COOKIE['TL-TOKEN']) and $_COOKIE['TL-TOKEN'] != null) {
			try {

				$headers = array(
                    'X-AccessToken: '.htmlspecialchars($_COOKIE["TL-TOKEN"]),
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

		else {
			self::Destroy();
			return false;
		}		

	}

	function Establish($data){

		// Start temporary information session
		session_name("TL-SESSION");
		session_start();

		// Register temporary csrf-token
		$_SESSION['token'] = bin2hex(random_bytes(32));

		die(header("location:/"));

	}

	function Destroy(){

		if(setcookie("TL-TOKEN", "", time() - 3600) and setcookie("TL-SESSION", "", time() - 3600)){
			return true;
		}
		else{
			return false;
		}

	}
}

?>
