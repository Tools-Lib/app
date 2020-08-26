<?php
/**
 * Handlers & functions
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

namespace requires\essentials\handlers;
use requires\essentials\Config\Page as Page;

class Handlers
{

	function __construct() {
		if(isset($_ENV['maintenance']) && $_ENV['maintenance']) {
			$this->Maintenance();
		}
	}

	function Title(){
		return htmlspecialchars($_ENV['page'])." &mdash; ".Page::TITLE;
	}

	function Maintenance(){
		if(!in_array($_SERVER['HTTP_USER_AGENT'], Page::MAINTENANCE_UA)) {
			http_response_code(503);
			die("This page is not available due to maintenance improvments.");
		}
	}

}
class Workers
{
	function GET($path, $headers = array(), $redirect = true) {
		if($path) {
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $path);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, $redirect);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, $redirect);
			curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
			$response = curl_exec($request);
			return $response;
			curl_close($response);
		}
		else {
			echo "Missing path value";
			return false;
		}
	}
}
?>

