<?php
/**
 * Login page
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/requires/essentials/map.php");
use requires\essentials\Map\Map as Map;
use requires\essentials\handlers\Handlers as Handler;
use requires\essentials\Config\Page as Page;

require_once(Map::HANDLERS);
require_once(Map::CONFIG);

$_ENV['page'] = "Login"; // Page Name

?>
<html>
<head>
	<?php require_once(Map::DEFAULTMETA); ?>
	<title><?php echo Handler::Title(); ?></title>

</head>
<body style="background-color:#2f3542;">

	<div class="container-fluid">
		<div class="row h-100">
			<div class="my-auto mx-auto col-3 bg-light text-center" style="border-radius: 1px;box-shadow: 0px 0px 10px rgba(0,0,0,0.8);padding-right: 50px;padding-left: 50px;">
				<h1 class="text-dark pt-5 pb-4" style="letter-spacing: 10px;">LOGIN</h1>
				<!-- <form method="post"> -->
					<div class="form-group">
						<input type="text" name="username" id="username" required="" placeholder="Username, Email Address" class="user form-control mb-3" style="border-radius: 0px !important;">
						<input type="password" name="password" required="" placeholder="Password" class="pass form-control mb-3" style="border-radius: 0px !important;">
						<p id="logerr" class="p-0 m-0 text-danger text-center mx-auto"></p>
						<p id="logged" class="p-0 m-0 text-success text-center mx-auto"></p>
						<input type="submit" class="btn btn-sm pl-5 pr-5 mt-3 mb-3 btn-primary"style="border-radius: 0px !important;" onclick="login()">
					</div>
				<!-- </form> -->
				<hr class="m-0 p-0">
				<p class="m-0 p-0 mt-4 pb-5" style="letter-spacing: 2px;font-size: 12px;">&copy; <?php echo Page::TITLE." &ndash; ".floatval(Page::VERSION);?></p>
			</div>

		</div>
	</div>

</body>
</html>
