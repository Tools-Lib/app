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
	function CheckToken(){

		if (Worker::CheckTokenCookie()) {
			try {

				$headers = array(
                    'X-AccessToken: '.htmlspecialchars($_COOKIE["TL-TOKEN"]),
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Connection: close'
                );

				$data = json_decode(Worker::GET(API::ENDPOINTS['USER'], $headers), true);

				if($data["status"] == "ok") {
					if(isset($_ENV['UserPage']) && $_ENV['UserPage']) {
						if(!Worker::CheckSessionCookie()){
							self::GenerateSessionToken();
						}
						return true;
					}
					else {
						self::Establish($data);
					}
				}
				else {
					if($data['status'] == "fail") {
						die(json_encode($data['body'], true));
						return true;
					}
					else {
						self::Destroy();
						return false;
					}
					
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

	function GenerateSessionToken() {
			// Start temporary information session
			session_name("TL-SESSION");
			session_start();

			// Register temporary csrf-token
			$_SESSION['token'] = bin2hex(random_bytes(32));
	}

	function Establish($data){
		if (Worker::CheckTokenCookie()) {

			self::GenerateSessionToken();
			die(header("location:/@me"));

		}
		else {
			self::Destroy();
			header("Location:/login");
		}

	}

	function Destroy($redirect = false){

		if(setcookie("TL-TOKEN", "", time() - 3600) and setcookie("TL-SESSION", "", time() - 3600)){
			if($redirect) {
				header("Location:/");
			}
			return true;
		}
		else{
			return false;
		}

	}
}

?>
