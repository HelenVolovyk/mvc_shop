<?php
include('layouts/header.php');
$template = file_get_contents("views/tempate.php");
?>


<div class="template">
	<?php echo $template;?>
</div>


<?php
include('layouts/footer.php');