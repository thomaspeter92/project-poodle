<!-- index.php -->
<?php
require("./controller/controller.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "login"; //CHANGE FROM LOGIN TO landing

try {
    switch ($action) {
        case "landing":
            landing();
            break;
        
        case "login":
            login();
            break;
            
        case "logout":
                logout();
                break;
        case "googleSignIn":
                googleSignIn();
            break;
        case "googleSignUp":
                googleSignUp();
            break;
        default:
            landing();
            break;

    }
} catch (Exception $e) {
    require("error.php");
}