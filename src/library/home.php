<?php
/**
 * Library home page
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/../requires/essentials/map.php");
use requires\essentials\Map\Map as Map;
use requires\essentials\handlers\Handlers as Handler;

require_once(Map::HANDLERS);
require_once(Map::CONFIG);

$_ENV['page'] = "Index"; // Page Name
$_ENV['maintenance'] = True; // Maintenance mode

new Handler();
?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once(Map::DEFAULTMETA); ?>
	<title><?php echo Handler::Title(); ?></title>

</head>
<body>
</body>
</html>
