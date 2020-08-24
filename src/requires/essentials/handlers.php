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
class Functions
{
	//
}
?>

