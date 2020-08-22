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
	function Title(){return htmlspecialchars($_ENV['page'])." &mdash; ".Page::TITLE;}
}
class Functions
{
	//
}
?>
