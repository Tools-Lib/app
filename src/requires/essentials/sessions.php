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

	public static function CheckToken(){

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
						$_ENV['data'] = $data;
						return $_ENV['data'];
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

	private static function GenerateSessionToken() {
		// Start temporary information session
		session_name("TL-SESSION");
		session_start();

		// Register temporary csrf-token
		$_SESSION['token'] = bin2hex(random_bytes(32));
	}

	private static function Establish($data){
		if (Worker::CheckTokenCookie()) {

			self::GenerateSessionToken();
			die(header("location:/user/@me?redirect=".urlencode(Worker::ReturnGETParamters('redirect'))));

		}
		else {
			self::Destroy();
			header("Location:/login?redirect=".urlencode(Worker::ReturnGETParamters('redirect')));
		}

	}

	public static function Destroy($redirect = false, $path = Null){

		if(setcookie("TL-TOKEN", "", time() - 3600) and setcookie("TL-SESSION", "", time() - 3600)){
			if($redirect) {
				if($path != Null) {
					header("Location: http://".$_SERVER['HTTP_HOST'].$path);
				}
				else {
					header("Location:/");
				}

			}

			return true;
		}
		else{
			return false;
		}

	}
}

?>
