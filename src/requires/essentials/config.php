<?php
/**
 * Page configuration
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

namespace requires\essentials\Config;

class Page
{
	CONST TITLE           = "Tools Library";
	CONST VERSION         = 1.1; // DEV
	CONST MAINTENANCE_UA  = array("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36 Edg/84.0.522.63");
}

class API
{

	CONST ENDPOINTS = array(

		'ENDPOINT' => 'https://api.toolslib.co',
		'ACCOUNTS' => 'https://api.toolslib.co/accounts',
		'LOGIN'    => 'https://api.toolslib.co/accounts/login',
		'REGISTER' => 'https://api.toolslib.co/accounts/register',
		'USER'     => 'https://api.toolslib.co/accounts/@me'

	);
}

?>
