<!-- index.php -->
<?php session_start()?>
<?php
require("./controller/controller.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";
try {
    switch ($action) {
        case "landing":
            landing();
            break;
        case "petprofile":
            // print_r($_REQUEST);
            showPetProfile($_REQUEST['petid']);
            break;
        case "petPreview":
            showPetPreview($_REQUEST['ownerId']);
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("error.php");
}
