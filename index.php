<!-- index.php -->
<?php
require("./controller/controller.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";
try {
    switch ($action) {
        case "landing":
            landing();
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("error.php");
}
