<?php
/**
 * Profile edit page
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/../essentials/map.php");
use requires\essentials\Map\Map;
use requires\essentials\Map\Instance;
use requires\essentials\handlers\Handlers as Handler;
use requires\essentials\handlers\Workers as Worker;
use requires\essentials\Sessions\Sessions as Session;

require_once(Map::HANDLERS);
require_once(Map::CONFIG);
require_once(Map::SESSIONS);

$_ENV['page'] = "Edit Profile"; // Page Name
$_ENV['maintenance'] = False; // Maintenance mode
$_ENV['UserPage'] = True;

new Handler();

?>
<html>
<head>
	<?php require_once(Map::DEFAULTMETA); ?>
	<title><?php echo Handler::Title(); ?></title>
</head>
<body style="background-color: #111;">
	<?php  Worker::ImportInstance(Instance::USER_NAV); ?>
	<div class="container text-white mt-5">
		<h1>Edit Profile</h1>
		<hr class="bg-secondary">
		<div class="row m-0 ml-xs-5 ml-sm-0 ml-lg-0 ml-md-0">
			<div class="col-12 col-md-4 col-lg-4 mr-0 mr-md-4 mr-lg-4 form-group bg-white p-5 text-dark" style="border-radius: 2px;">
				<h4>Account</h4>
				<p id="error" class="text-danger"></p>
				<p id="success" class="text-success"></p>
				<input type="text" id="name" placeholder="Name" value="<?php echo Worker::User("name"); ?>" class="form-control regular-input mb-3">
				<input type="text" id="username" placeholder="Username" value="<?php echo Worker::User("username"); ?>" class="form-control regular-input mb-3">
				<textarea id="bio" rows="1" cols="1" value="<?php echo Worker::User("bio"); ?>" class="form-control regular-input mb-3" placeholder="Biography"></textarea>
				<hr class="bg-white">
				<p class="text-success">Personal information</p>
				<label for="email">E-Mail</label>
				<input type="email" id="email" placeholder="E-mail" value="<?php echo Worker::User("email"); ?>" class="form-control regular-input mb-3">
				<input type="submit" onclick="edit();" class="regular-submit btn btn-success btn-md">
			</div>
			<div class="col-12 col-md-4 col-lg-4 mr-0 mr-md-4 mr-lg-4 form-group h-50 bg-white p-5 text-dark" style="border-radius: 2px;">
				<h4>Change Password</h4>
				<p id="errorpassw" class="text-danger"></p>
				<p id="successpassw" class="text-success"></p>
				<input type="password" id="old_password" placeholder="Old Password" class="form-control regular-input mb-3">
				<input type="password" id="password" placeholder="New Password" class="form-control regular-input mb-3">
				<input type="password" id="verify_password" placeholder="Confirm New Password" class="form-control regular-input mb-3">
				<input type="submit" id="submit" onclick="changepassword();" class="regular-submit btn btn-success btn-md">
			</div>
		</div>
	</div>


<script type="text/javascript">

</script>
</body>
</html>
