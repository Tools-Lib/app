<?php
/**
 * Account password change page
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/../essentials/map.php");
use requires\essentials\Map\Map as Map;
use requires\essentials\handlers\Handlers as Handler;
use requires\essentials\handlers\Workers as Worker;
use requires\essentials\Sessions\Sessions as Session;

require_once(Map::HANDLERS);
require_once(Map::CONFIG);
require_once(Map::SESSIONS);

$_ENV['page'] = "Profile"; // Page Name
$_ENV['maintenance'] = False; // Maintenance mode
$_ENV['UserPage'] = True;

new Handler();

?>
<html>
<head>
	<?php require_once(Map::DEFAULTMETA); ?>
	<title><?php echo Handler::Title(); ?></title>

</head>
<body>

	this is the password page of <?php echo Worker::User('username'); ?>

</body>
</html>