<?php
/**
 * Sessions handler
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

namespace requires\essentials\Sessions;
use requires\essentials\Config\API as API;

class Sessions
{
	function GetUser(){

		if (isset($_COOKIE['token'])) {
			try {

				//Initialize cURL.
				$r = curl_init();

				// HTTP Settings
				curl_setopt($r, CURLOPT_URL, API::ENDPOINTS['USER']);

				curl_setopt($r, CURLOPT_RETURNTRANSFER, true);

				curl_setopt($r, CURLOPT_HTTPHEADER, array(
				    'x-accesstoken: '.htmlspecialchars($_COOKIE["token"]),
				    'Content-Type: application/json',
				    'Accept: application/json',
				    'Connection: close'
				));

				// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
				curl_setopt($r, CURLOPT_FOLLOWLOCATION, true);

				// Execute the request.
				$data = curl_exec($r);
				// $data = var_dump($data);
				$data = json_decode($data, true);
				// Close the cURL handle.
				curl_close($r);

				// Validate token and establish login session
				if($data["status"] == "ok") {
					self::Establish($data);
					return true;
				}
				else {
					self::Destroy();
					return false;
				}
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

		if(setcookie("token", "", time() - 3600)){
			return true;
		}
		else {
			return false;
		}

	}
}

?>
