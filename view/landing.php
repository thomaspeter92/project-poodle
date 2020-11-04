<?php
ob_start();
?>

<div id="carousel">Here is the Carousel.</div>
<a href="index.php?action=petprofile&petid=1">Testing Profile View</a>
<?php
$content = ob_get_clean();
require("template.php");

//
