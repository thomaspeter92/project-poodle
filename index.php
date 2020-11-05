<!-- index.php -->
<?php
require("./controller/controller.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";

try {
    switch ($action) {
        case "landing":
            landing();
            break;
        case "login":
            login();
            break;
        case "checkLogin" :
            if(!empty($_REQUEST['usernameLogin']) && !empty($_REQUEST['passwordLogin'])){
                checkLogin($_REQUEST);
            } else {
               header("Location: index.php?action=login&error=login"); 
            }
            break;
        case "registration":
            registration();
            break;
        case "registrationInput":
        //!empty($_REQUEST['username']) && !empty($_REQUEST['password']) &&
            if(!empty($_REQUEST['email'])){
                addNewMember($_REQUEST);
            }else{
                header("Location: index.php?action=registration&error=registration"); 
            }
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("./view/error.php");
}


