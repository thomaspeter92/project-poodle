<?php
ob_start();
?>

<div id="carousel">Here is the Carousel.</div>


<?php
$content = ob_get_clean();
require("template.php");
