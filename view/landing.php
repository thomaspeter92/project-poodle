<?php
ob_start();
?>

<div id="carousel">Here is the Carousel.</div>

<a href="index.php?action=petPreview&ownerId=1">Testing preview</a>
<?php
$content = ob_get_clean();
require("template.php");

//
