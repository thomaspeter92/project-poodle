<?php $title= "contactPage"?>
<?php ob_start(); ?>

<h1>Get in touch</h1>

<div>
    <p>Email : contactus@contactus.com</p>
</div>

<div>
    <p>Phone Number: +82 010 1234 5678</p>
    <p>Fax Number</p>
</div>

<div>
    <p>Headquarters</p>
    <img alt="headquarters map" src="./projectPoodle/public/images/headquartersPlaceholder.jpeg">
</div>

<?php
$content = ob_get_clean();
require("template.php");
?>