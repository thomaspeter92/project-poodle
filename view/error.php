<?php ob_start(); ?>
<div>ERROR DETECTED</div>
<div><?= "Error Message: " . $e->getMessage(); ?></div>
<div><?= "Error Code: " . $e->getCode(); ?></div>
<div><?= "Error File: " . $e->getFile(); ?></div>
<div><?= "Error Line: " . $e->getLine(); ?></div>
<?php $content = ob_get_clean();
require("template.php");
?>