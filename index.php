<!-- index.php -->
<?php
session_start();
require("./controller/controller.php");
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";

try {
    switch ($action) {
        case "landing":
            landing();
            break;
        case "petprofile":
            // print_r($_POST['petId']);
            // isThatReallyMyDog($_SESSION['id', $_REQUEST['petid'])
            showPetProfile($_REQUEST['petid']);
            break;
        case "petPreview":
            if(isset($_SESSION['id'])){
                showPetPreview($_SESSION['id']);
            }else{
                login();
            }
            
            //We have to check if it also works with our cookies 
            
            break;
        case "login":
            login();
            break;
        case "checkLogin" :
            if(!empty($_REQUEST['emailLogin']) && !empty($_REQUEST['passwordLogin'])){
                checkLogin($_REQUEST);
            } else {
               header("Location: index.php?action=login&error=login");   
            }
            break;
        case "registration":
            registration();
            break;
        case "registrationInput":
            if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']) &&!empty($_REQUEST['email'])){
                addNewMember($_REQUEST);
            }else{
                header("Location: index.php?action=registration&error=registration"); 
            }
            break;
        case "logout":
            logout();
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("./view/error.php");
}


