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
<body style="background-position: center;background-color: #282F3A;">

	<div class="bottom fixed-bottom" style="z-index: 2;margin-bottom: 7%;">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
	  <path fill="#fff" fill-opacity="1" d="M0,256L34.3,256C68.6,256,137,256,206,240C274.3,224,343,192,411,192C480,192,549,224,617,224C685.7,224,754,192,823,186.7C891.4,181,960,203,1029,218.7C1097.1,235,1166,245,1234,213.3C1302.9,181,1371,107,1406,69.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
	</svg>
	</div>


	<div class="bottom fixed-bottom" style="z-index: 3;filter: drop-shadow(0px 4px 3rem rgba(0,0,0,0.3))">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		  <path fill="#0099ff" fill-opacity="1" d="M0,0L30,37.3C60,75,120,149,180,154.7C240,160,300,96,360,96C420,96,480,160,540,170.7C600,181,660,139,720,128C780,117,840,139,900,128C960,117,1020,75,1080,80C1140,85,1200,139,1260,144C1320,149,1380,107,1410,85.3L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
		</svg>
	</div>

	<div class="container-fluid">

		<div class="row h-100">

			<div class="bg-light text-center my-auto mx-auto pt-3 pb-4" style="border-radius: 2px;box-shadow: 0px 0px 10px rgba(0,0,0,0.8);z-index: 6;padding-right: 40px;padding-left: 40px;">
				<h1 class="text-dark pt-5 pb-4 pl-5 pr-5" style="letter-spacing: 10px;">LOGIN</h1>
				<div id="loginform" class="form-group">
					<input type="text" name="username" id="user" required="" placeholder="Username, Email Address" class="form-control mb-3" style="border-radius: 0px !important;">
					<input type="password" id="pass" name="password" required="" placeholder="Password" class="form-control mb-3" style="border-radius: 0px !important;">
					<p id="logerr" style="font-size: 13px;" class="p-0 m-0 text-danger text-center mx-auto"></p>
					<p id="logged" style="font-size: 15px;" class="p-0 text-success text-center mx-auto"></p>
					<input type="submit" class="btn btn-sm pl-5 pr-5 mb-3 btn-primary"style="border-radius: 0px !important;" id="submit" onclick="login();">
				</div>
			<hr class="m-0 p-0">
			<p class="m-0 p-0 mt-4 pb-4" style="letter-spacing: 2px;font-size: 12px;">&copy; <?php echo Page::TITLE." &ndash; ".Page::VERSION;?></p>
			</div>

		</div>

	</div>


</body>
</html>
