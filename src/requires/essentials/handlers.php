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

	public static function CheckUserPage() {
		if(isset($_ENV['UserPage']) && $_ENV['UserPage']) {
			return true;
		}
		else{
			return false;
		}		
	}

	public static function CheckUserInstance() {
		if(isset($_ENV['UserInstance']) && $_ENV['UserInstance']) {
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
		switch ($scope) {
			case $scope:
				if(isset($_ENV['data']['body']['user'][$scope])) {
					return htmlspecialchars($_ENV['data']['body']['user'][$scope]);
				}
			default:
				return $_ENV['data'];
				break;
		}
	}

	public static function ImportInstance($instance) {
		if(self::CheckUserPage()) {
			return require_once($instance);
		}
		else {
			return;
		}
	}

}
?>

