<?php
/**
 * User navigation bar instance
 * @author Ahmed
 * @copyright 2020 Tools Library
 */

require_once(__DIR__."/../essentials/map.php");
use requires\essentials\Map\Map;
use requires\essentials\handlers\Workers as Worker;
require_once(Map::HANDLERS);
?>
<div class="container-fluid bg-white p-3 text-center text-body" style="box-shadow: 0px 3px 4px rgba(0,0,0,0.45);">
<a href="/user/@me"><img src="https://www.xovi.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" style="border-radius: 50%;" width="50" height="50" draggable="false" class="justifiy-content-center d-flex mx-auto img-fluid"></a>
<p class="mt-2 mb-0"><?php echo Worker::User("name"); ?></p>

</div>