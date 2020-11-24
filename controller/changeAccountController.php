<?php
session_start();
require_once("../model/MemberManager.php");
require_once("accountController.php");


if(!isset($_SESSION['id'])){
    header("Location: index.php?action=petPreview&error=notSignedIn");
}
else if (empty($_REQUEST['nameInput']) || empty($_REQUEST['emailInput'])) {
    $result = "emptyField";
} else {
    $result = checkChangeAccount($_REQUEST, $_FILES, $_SESSION['id']);
}

echo $result;
?>