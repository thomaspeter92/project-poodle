<!-- index.php -->
<?php
require("./controller/controller.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";

try {
    switch ($action) {
        case "landing":
            landing();
            break;
        case "login";
            login($_REQUEST);
            break;
        case "registration";
            registration($_REQUEST);
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("./view/error.php");
}


