<?php
/**
 * Home page
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/requires/essentials/map.php");
use requires\essentials\Map\Map as Map;
use requires\essentials\handlers\Handlers as Handler;

require_once(Map::HANDLERS);
require_once(Map::CONFIG);

$_ENV['page'] = "Home"; // Page Name
$_ENV['maintenance'] = False; // Maintenance mode

new Handler();
clearstatcache();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once(Map::DEFAULTMETA); ?>
		<link rel="stylesheet" href="/public/css/home.css?s=<?php echo date('r', time());?>">
		<title><?php echo Handler::Title(); ?></title>

	</head>
	<body>

		<?php require_once(Map::NAVBAR); ?>

		<div class="header">
			<div class="row heade">
				<div class="col-md-6 text">
					<h1 class="texthead">Tools Library</h1>
					<h3 class="textdesc">Where you can find all the tools you want.</h3>
					<a href="#" class="btn text-white" style="
				background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);
				box-shadow: 0px 0px 7px 1px rgba(0, 0, 0, 0.25);
				border-radius: 74px;
					">Explore Now</a>
				</div>
				<div class="col">

					<div class="join-card"style="display:flex;justify-content:center;align-items:center;">

						<div class="joincontent" style="text-align:center;">
							<h3 class="joinmsg">JOIN US <br> NOW</h3>

							<input class="reginp" placeholder="Email Address" type="email" id="email" value=""><br>
							<input class="reginp" placeholder="Username" type="email" id="username" value=""><br>
							<input class="reginp" placeholder="Password" type="email" id="password" value=""><br>

							<input type="submit" class="joinbutt" onclick="register()" name="email" value="JOIN">
							<div class="jointologin">
								<p class="mt-1">Already a member ? <a href="/login">Login</a></p>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>


		<img id="wave1" src="/public/img/Frame 3.png" draggable="false">
		<img id="wave2" src="/public/img/Frame 4.png" draggable="false">

	</body>
</html>
