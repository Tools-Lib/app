<?php
/**
 * Profile page
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/requires/essentials/map.php");
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
<!-- 	Username: <?php echo $_ENV['data']['body']['user']['username']; ?><br>
	Email: <?php echo $_ENV['data']['body']['user']['email']; ?><br>
	Last logged: <?php echo $_ENV['data']['body']['user']['last_login']; ?><br>
	Created: <?php echo $_ENV['data']['body']['user']['created_at']; ?> -->
<!-- 	<?php foreach ($_ENV['data']['body']['user'] as $key => $value) {
		echo "$key"." ".$value."<br>";
	} ?> -->

	<a href="/@me/edit" class="btn btn-primary btn-sm">Edit Profile</a>
	<a href="/@me/password" class="btn btn-primary btn-sm">Change Password</a>

</body>
</html>
