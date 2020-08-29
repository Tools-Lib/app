<?php
/**
 * Logout
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/requires/essentials/map.php");
use requires\essentials\Map\Map as Map;
use requires\essentials\Sessions\Sessions as Session;

require_once(Map::SESSIONS);

die(Session::Destroy(true));
?>