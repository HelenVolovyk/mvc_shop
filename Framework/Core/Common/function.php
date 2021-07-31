<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

function site_redirect($path = '')
	{
	header ("Location" . SITE_URL . "/" . $path);
	exit;
	}

	function show_alert()
	{
		if(isset($_SESSION['notification'])){
			?>
<div class="alert alert-<?php echo $_SESSION['notification']['type']; ?>" role="alert" style="z-index: 9999;">
	<?php echo $_SESSION['notification']['message']; ?>
</div>
<?php
			unset($_SESSION['notification']);
		}
	}