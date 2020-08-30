<?php
/**
 * Handlers & functions
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

namespace requires\essentials\handlers;
use requires\essentials\Config\Page as Page;
use requires\essentials\Sessions\Sessions as Session;

class Handlers
{

	function __construct() {
		if(isset($_ENV['maintenance']) && $_ENV['maintenance']) {
			$this->Maintenance();
		}
		if(isset($_ENV['UserPage']) && $_ENV['UserPage']) {
			if(!Session::CheckToken()){
				Session::Destroy(true, "/login");
			}
			// die(header("Location: /login"));
		}
	}

	public static function Title(){
		return htmlspecialchars($_ENV['page'])." &mdash; ".Page::TITLE;
	}

	private static function Maintenance(){
		if(!in_array($_SERVER['HTTP_USER_AGENT'], Page::MAINTENANCE_UA)) {
			http_response_code(503);
			die("This page is not available due to maintenance improvments.");
		}
	}

}
class Workers
{
	public static function GET($path, $headers = array(), $redirect = true) {
		if($path) {
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $path);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, $redirect);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, $redirect);
			curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
			$response = curl_exec($request);
			curl_close($request);
			return $response;
		}
		else {
			echo "Missing path value";
			return false;
		}
	}

	public static function CheckTokenCookie() {
		if (isset($_COOKIE['TL-TOKEN']) and $_COOKIE['TL-TOKEN'] != null) {
			return true;
		}
		else{
			return false;
		}
	}

	public static function CheckSessionCookie() {
		if (isset($_COOKIE['TL-SESSION']) and $_COOKIE['TL-SESSION'] != null) {
			return true;
		}
		else{
			return false;
		}
	}

	public static function CheckUserData() {
		if(isset($_ENV['data']) && $_ENV['data'] != "" && $_ENV['data'] != null) {
			return true;
		}
		else{
			return false;
		}
	}

	public static function User($scope = null) {
		if (self::CheckUserData() && $scope == null) {
			return $_ENV['data'];
		}
		elseif(self::CheckUserData() && $scope == "username") {
			return $_ENV['data']['body']['user']['username'];
		}
		elseif(self::CheckUserData() && $scope == "email") {
			return $_ENV['data']['body']['user']['email'];
		}
		elseif(self::CheckUserData() && $scope == "last_login") {
			return $_ENV['data']['body']['user']['last_login'];
		}
		elseif(self::CheckUserData() && $scope == "created") {
			return $_ENV['data']['body']['user']['created_at'];
		}		
	}

}
?>

